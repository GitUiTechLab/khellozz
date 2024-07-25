<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddGalleryRequest;
use App\Http\Requests\StoreAddGalleryRequest;
use App\Http\Requests\UpdateAddGalleryRequest;
use App\Models\AddGallery;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddGalleryController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddGallery::query()->select(sprintf('%s.*', (new AddGallery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_gallery_show';
                $editGate      = 'add_gallery_edit';
                $deleteGate    = 'add_gallery_delete';
                $crudRoutePart = 'add-galleries';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.addGalleries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addGalleries.create');
    }

    public function store(StoreAddGalleryRequest $request)
    {
        $addGallery = AddGallery::create($request->all());

        if ($request->input('image', false)) {
            $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addGallery->id]);
        }

        return redirect()->route('admin.add-galleries.index');
    }

    public function edit(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addGalleries.edit', compact('addGallery'));
    }

    public function update(UpdateAddGalleryRequest $request, AddGallery $addGallery)
    {
        $addGallery->update($request->all());

        if ($request->input('image', false)) {
            if (! $addGallery->image || $request->input('image') !== $addGallery->image->file_name) {
                if ($addGallery->image) {
                    $addGallery->image->delete();
                }
                $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addGallery->image) {
            $addGallery->image->delete();
        }

        return redirect()->route('admin.add-galleries.index');
    }

    public function show(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addGalleries.show', compact('addGallery'));
    }

    public function destroy(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addGallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddGalleryRequest $request)
    {
        $addGalleries = AddGallery::find(request('ids'));

        foreach ($addGalleries as $addGallery) {
            $addGallery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_gallery_create') && Gate::denies('add_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddGallery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
