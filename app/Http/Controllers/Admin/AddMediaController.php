<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddMediumRequest;
use App\Http\Requests\StoreAddMediumRequest;
use App\Http\Requests\UpdateAddMediumRequest;
use App\Models\AddMedium;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddMediaController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_medium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddMedium::query()->select(sprintf('%s.*', (new AddMedium)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_medium_show';
                $editGate      = 'add_medium_edit';
                $deleteGate    = 'add_medium_delete';
                $crudRoutePart = 'add-media';

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

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.addMedia.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_medium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addMedia.create');
    }

    public function store(StoreAddMediumRequest $request)
    {
        $addMedium = AddMedium::create($request->all());

        if ($request->input('image', false)) {
            $addMedium->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addMedium->id]);
        }

        return redirect()->route('admin.add-media.index');
    }

    public function edit(AddMedium $addMedium)
    {
        abort_if(Gate::denies('add_medium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addMedia.edit', compact('addMedium'));
    }

    public function update(UpdateAddMediumRequest $request, AddMedium $addMedium)
    {
        $addMedium->update($request->all());

        if ($request->input('image', false)) {
            if (! $addMedium->image || $request->input('image') !== $addMedium->image->file_name) {
                if ($addMedium->image) {
                    $addMedium->image->delete();
                }
                $addMedium->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addMedium->image) {
            $addMedium->image->delete();
        }

        return redirect()->route('admin.add-media.index');
    }

    public function show(AddMedium $addMedium)
    {
        abort_if(Gate::denies('add_medium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addMedia.show', compact('addMedium'));
    }

    public function destroy(AddMedium $addMedium)
    {
        abort_if(Gate::denies('add_medium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addMedium->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddMediumRequest $request)
    {
        $addMedia = AddMedium::find(request('ids'));

        foreach ($addMedia as $addMedium) {
            $addMedium->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_medium_create') && Gate::denies('add_medium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddMedium();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
