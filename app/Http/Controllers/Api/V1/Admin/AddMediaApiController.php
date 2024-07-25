<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddMediumRequest;
use App\Http\Requests\UpdateAddMediumRequest;
use App\Http\Resources\Admin\AddMediumResource;
use App\Models\AddMedium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddMediaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_medium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddMediumResource(AddMedium::all());
    }

    public function store(StoreAddMediumRequest $request)
    {
        $addMedium = AddMedium::create($request->all());

        if ($request->input('image', false)) {
            $addMedium->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddMediumResource($addMedium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddMedium $addMedium)
    {
        abort_if(Gate::denies('add_medium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddMediumResource($addMedium);
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

        return (new AddMediumResource($addMedium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddMedium $addMedium)
    {
        abort_if(Gate::denies('add_medium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addMedium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
