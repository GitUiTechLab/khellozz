<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddSportRequest;
use App\Http\Requests\StoreAddSportRequest;
use App\Http\Requests\UpdateAddSportRequest;
use App\Models\AddSport;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddSportController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_sport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddSport::with(['sport_name'])->select(sprintf('%s.*', (new AddSport)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_sport_show';
                $editGate      = 'add_sport_edit';
                $deleteGate    = 'add_sport_delete';
                $crudRoutePart = 'add-sports';

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
            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'sport_name']);

            return $table->make(true);
        }

        return view('admin.addSports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_sport_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addSports.create', compact('sport_names'));
    }

    public function store(StoreAddSportRequest $request)
    {
        $addSport = AddSport::create($request->all());

        if ($request->input('image', false)) {
            $addSport->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addSport->id]);
        }

        return redirect()->route('admin.add-sports.index');
    }

    public function edit(AddSport $addSport)
    {
        abort_if(Gate::denies('add_sport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addSport->load('sport_name');

        return view('admin.addSports.edit', compact('addSport', 'sport_names'));
    }

    public function update(UpdateAddSportRequest $request, AddSport $addSport)
    {
        $addSport->update($request->all());

        if ($request->input('image', false)) {
            if (! $addSport->image || $request->input('image') !== $addSport->image->file_name) {
                if ($addSport->image) {
                    $addSport->image->delete();
                }
                $addSport->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addSport->image) {
            $addSport->image->delete();
        }

        return redirect()->route('admin.add-sports.index');
    }

    public function show(AddSport $addSport)
    {
        abort_if(Gate::denies('add_sport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addSport->load('sport_name');

        return view('admin.addSports.show', compact('addSport'));
    }

    public function destroy(AddSport $addSport)
    {
        abort_if(Gate::denies('add_sport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addSport->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddSportRequest $request)
    {
        $addSports = AddSport::find(request('ids'));

        foreach ($addSports as $addSport) {
            $addSport->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_sport_create') && Gate::denies('add_sport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddSport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
