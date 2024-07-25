<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddAchievementRequest;
use App\Http\Requests\StoreAddAchievementRequest;
use App\Http\Requests\UpdateAddAchievementRequest;
use App\Models\AddAchievement;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddAchievementController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_achievement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddAchievement::with(['sport_name'])->select(sprintf('%s.*', (new AddAchievement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_achievement_show';
                $editGate      = 'add_achievement_edit';
                $deleteGate    = 'add_achievement_delete';
                $crudRoutePart = 'add-achievements';

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
            $table->editColumn('player_image', function ($row) {
                if ($photo = $row->player_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('player_name', function ($row) {
                return $row->player_name ? $row->player_name : '';
            });
            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->editColumn('medal_type', function ($row) {
                return $row->medal_type ? $row->medal_type : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('school_name', function ($row) {
                return $row->school_name ? $row->school_name : '';
            });
            $table->editColumn('class', function ($row) {
                return $row->class ? $row->class : '';
            });

            $table->editColumn('certificate', function ($row) {
                if ($photo = $row->certificate) {
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

            $table->rawColumns(['actions', 'placeholder', 'player_image', 'sport_name', 'certificate']);

            return $table->make(true);
        }

        return view('admin.addAchievements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_achievement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addAchievements.create', compact('sport_names'));
    }

    public function store(StoreAddAchievementRequest $request)
    {
        $addAchievement = AddAchievement::create($request->all());

        if ($request->input('player_image', false)) {
            $addAchievement->addMedia(storage_path('tmp/uploads/' . basename($request->input('player_image'))))->toMediaCollection('player_image');
        }

        if ($request->input('certificate', false)) {
            $addAchievement->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addAchievement->id]);
        }

        return redirect()->route('admin.add-achievements.index');
    }

    public function edit(AddAchievement $addAchievement)
    {
        abort_if(Gate::denies('add_achievement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addAchievement->load('sport_name');

        return view('admin.addAchievements.edit', compact('addAchievement', 'sport_names'));
    }

    public function update(UpdateAddAchievementRequest $request, AddAchievement $addAchievement)
    {
        $addAchievement->update($request->all());

        if ($request->input('player_image', false)) {
            if (! $addAchievement->player_image || $request->input('player_image') !== $addAchievement->player_image->file_name) {
                if ($addAchievement->player_image) {
                    $addAchievement->player_image->delete();
                }
                $addAchievement->addMedia(storage_path('tmp/uploads/' . basename($request->input('player_image'))))->toMediaCollection('player_image');
            }
        } elseif ($addAchievement->player_image) {
            $addAchievement->player_image->delete();
        }

        if ($request->input('certificate', false)) {
            if (! $addAchievement->certificate || $request->input('certificate') !== $addAchievement->certificate->file_name) {
                if ($addAchievement->certificate) {
                    $addAchievement->certificate->delete();
                }
                $addAchievement->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
            }
        } elseif ($addAchievement->certificate) {
            $addAchievement->certificate->delete();
        }

        return redirect()->route('admin.add-achievements.index');
    }

    public function show(AddAchievement $addAchievement)
    {
        abort_if(Gate::denies('add_achievement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addAchievement->load('sport_name');

        return view('admin.addAchievements.show', compact('addAchievement'));
    }

    public function destroy(AddAchievement $addAchievement)
    {
        abort_if(Gate::denies('add_achievement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addAchievement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddAchievementRequest $request)
    {
        $addAchievements = AddAchievement::find(request('ids'));

        foreach ($addAchievements as $addAchievement) {
            $addAchievement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_achievement_create') && Gate::denies('add_achievement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddAchievement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
