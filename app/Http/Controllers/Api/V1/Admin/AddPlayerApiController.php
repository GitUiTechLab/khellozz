<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddPlayerRequest;
use App\Http\Requests\UpdateAddPlayerRequest;
use App\Http\Resources\Admin\AddPlayerResource;
use App\Models\AddPlayer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddPlayerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddPlayerResource(AddPlayer::with(['registration', 'event_title'])->get());
    }

    public function store(StoreAddPlayerRequest $request)
    {
        $addPlayer = AddPlayer::create($request->all());

        if ($request->input('upload_photo', false)) {
            $addPlayer->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_photo'))))->toMediaCollection('upload_photo');
        }

        return (new AddPlayerResource($addPlayer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddPlayer $addPlayer)
    {
        abort_if(Gate::denies('add_player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddPlayerResource($addPlayer->load(['registration', 'event_title']));
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

        return (new AddPlayerResource($addPlayer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddPlayer $addPlayer)
    {
        abort_if(Gate::denies('add_player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addPlayer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
