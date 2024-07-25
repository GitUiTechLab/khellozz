<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddEventRequest;
use App\Http\Requests\UpdateAddEventRequest;
use App\Http\Resources\Admin\AddEventResource;
use App\Models\AddEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddEventApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddEventResource(AddEvent::with(['sport_name', 'schools'])->get());
    }

    public function store(StoreAddEventRequest $request)
    {
        $addEvent = AddEvent::create($request->all());
        $addEvent->schools()->sync($request->input('schools', []));
        if ($request->input('image', false)) {
            $addEvent->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddEventResource($addEvent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddEvent $addEvent)
    {
        abort_if(Gate::denies('add_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddEventResource($addEvent->load(['sport_name', 'schools']));
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

        return (new AddEventResource($addEvent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddEvent $addEvent)
    {
        abort_if(Gate::denies('add_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addEvent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
