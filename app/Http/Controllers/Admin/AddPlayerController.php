<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddPlayerRequest;
use App\Http\Requests\StoreAddPlayerRequest;
use App\Http\Requests\UpdateAddPlayerRequest;
use App\Models\AddEvent;
use App\Models\AddPlayer;
use App\Models\AddRegistration;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddPlayerController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddPlayer::with(['registration', 'event_title'])->select(sprintf('%s.*', (new AddPlayer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_player_show';
                $editGate      = 'add_player_edit';
                $deleteGate    = 'add_player_delete';
                $crudRoutePart = 'add-players';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('class', function ($row) {
                return $row->class ? $row->class : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->editColumn('father_mother_name', function ($row) {
                return $row->father_mother_name ? $row->father_mother_name : '';
            });
            $table->editColumn('upload_photo', function ($row) {
                if ($photo = $row->upload_photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('registration_school_name', function ($row) {
                return $row->registration ? $row->registration->school_name : '';
            });

            $table->addColumn('event_title_title', function ($row) {
                return $row->event_title ? $row->event_title->title : '';
            });

            $table->editColumn('event_title.date', function ($row) {
                return $row->event_title ? (is_string($row->event_title) ? $row->event_title : $row->event_title->date) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'upload_photo', 'registration', 'event_title']);

            return $table->make(true);
        }

        return view('admin.addPlayers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_player_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrations = AddRegistration::pluck('school_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_titles = AddEvent::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addPlayers.create', compact('event_titles', 'registrations'));
    }

    public function store(StoreAddPlayerRequest $request)
    {
        $addPlayer = AddPlayer::create($request->all());

        if ($request->input('upload_photo', false)) {
            $addPlayer->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_photo'))))->toMediaCollection('upload_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addPlayer->id]);
        }

        return redirect()->route('admin.add-players.index');
    }

    public function edit(AddPlayer $addPlayer)
    {
        abort_if(Gate::denies('add_player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrations = AddRegistration::pluck('school_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_titles = AddEvent::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addPlayer->load('registration', 'event_title');

        return view('admin.addPlayers.edit', compact('addPlayer', 'event_titles', 'registrations'));
    }

    public function update(UpdateAddPlayerRequest $request, AddPlayer $addPlayer)
    {
        $addPlayer->update($request->all());

        if ($request->input('upload_photo', false)) {
            if (! $addPlayer->upload_photo || $request->input('upload_photo') !== $addPlayer->upload_photo->file_name) {
                if ($addPlayer->upload_photo) {
                    $addPlayer->upload_photo->delete();
                }
                $addPlayer->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_photo'))))->toMediaCollection('upload_photo');
            }
        } elseif ($addPlayer->upload_photo) {
            $addPlayer->upload_photo->delete();
        }

        return redirect()->route('admin.add-players.index');
    }

    public function show(AddPlayer $addPlayer)
    {
        abort_if(Gate::denies('add_player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addPlayer->load('registration', 'event_title');

        return view('admin.addPlayers.show', compact('addPlayer'));
    }

    public function destroy(AddPlayer $addPlayer)
    {
        abort_if(Gate::denies('add_player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addPlayer->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddPlayerRequest $request)
    {
        $addPlayers = AddPlayer::find(request('ids'));

        foreach ($addPlayers as $addPlayer) {
            $addPlayer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_player_create') && Gate::denies('add_player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddPlayer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
