<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddAchievementRequest;
use App\Http\Requests\UpdateAddAchievementRequest;
use App\Http\Resources\Admin\AddAchievementResource;
use App\Models\AddAchievement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddAchievementApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_achievement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddAchievementResource(AddAchievement::with(['sport_name'])->get());
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

        return (new AddAchievementResource($addAchievement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddAchievement $addAchievement)
    {
        abort_if(Gate::denies('add_achievement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddAchievementResource($addAchievement->load(['sport_name']));
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

        return (new AddAchievementResource($addAchievement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddAchievement $addAchievement)
    {
        abort_if(Gate::denies('add_achievement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addAchievement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
