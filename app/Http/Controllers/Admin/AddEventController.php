<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddEventRequest;
use App\Http\Requests\StoreAddEventRequest;
use App\Http\Requests\UpdateAddEventRequest;
use App\Models\AddEvent;
use App\Models\AddSchool;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddEventController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddEvent::with(['sport_name', 'schools'])->select(sprintf('%s.*', (new AddEvent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_event_show';
                $editGate      = 'add_event_edit';
                $deleteGate    = 'add_event_delete';
                $crudRoutePart = 'add-events';

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

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('eventstart', function ($row) {
                return $row->eventstart ? $row->eventstart : '';
            });
            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->editColumn('schools', function ($row) {
                $labels = [];
                foreach ($row->schools as $school) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $school->school_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'sport_name', 'schools']);

            return $table->make(true);
        }

        return view('admin.addEvents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schools = AddSchool::pluck('school_name', 'id');

        return view('admin.addEvents.create', compact('schools', 'sport_names'));
    }

    public function store(StoreAddEventRequest $request)
    {
        $addEvent = AddEvent::create($request->all());
        $addEvent->schools()->sync($request->input('schools', []));
        if ($request->input('image', false)) {
            $addEvent->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addEvent->id]);
        }

        return redirect()->route('admin.add-events.index');
    }

    public function edit(AddEvent $addEvent)
    {
        abort_if(Gate::denies('add_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schools = AddSchool::pluck('school_name', 'id');

        $addEvent->load('sport_name', 'schools');

        return view('admin.addEvents.edit', compact('addEvent', 'schools', 'sport_names'));
    }

    public function update(UpdateAddEventRequest $request, AddEvent $addEvent)
    {
        $addEvent->update($request->all());
        $addEvent->schools()->sync($request->input('schools', []));
        if ($request->input('image', false)) {
            if (! $addEvent->image || $request->input('image') !== $addEvent->image->file_name) {
                if ($addEvent->image) {
                    $addEvent->image->delete();
                }
                $addEvent->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addEvent->image) {
            $addEvent->image->delete();
        }

        return redirect()->route('admin.add-events.index');
    }

    public function show(AddEvent $addEvent)
    {
        abort_if(Gate::denies('add_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addEvent->load('sport_name', 'schools');

        return view('admin.addEvents.show', compact('addEvent'));
    }

    public function destroy(AddEvent $addEvent)
    {
        abort_if(Gate::denies('add_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddEventRequest $request)
    {
        $addEvents = AddEvent::find(request('ids'));

        foreach ($addEvents as $addEvent) {
            $addEvent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_event_create') && Gate::denies('add_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddEvent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
