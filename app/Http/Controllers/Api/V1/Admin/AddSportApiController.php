<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddSportRequest;
use App\Http\Requests\UpdateAddSportRequest;
use App\Http\Resources\Admin\AddSportResource;
use App\Models\AddSport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSportApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_sport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddSportResource(AddSport::with(['sport_name'])->get());
    }

    public function store(StoreAddSportRequest $request)
    {
        $addSport = AddSport::create($request->all());

        if ($request->input('image', false)) {
            $addSport->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddSportResource($addSport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddSport $addSport)
    {
        abort_if(Gate::denies('add_sport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddSportResource($addSport->load(['sport_name']));
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

        return (new AddSportResource($addSport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddSport $addSport)
    {
        abort_if(Gate::denies('add_sport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addSport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
