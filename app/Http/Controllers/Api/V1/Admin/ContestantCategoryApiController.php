<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContestantCategoryRequest;
use App\Http\Requests\UpdateContestantCategoryRequest;
use App\Http\Resources\Admin\ContestantCategoryResource;
use App\Models\ContestantCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContestantCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contestant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContestantCategoryResource(ContestantCategory::all());
    }

    public function store(StoreContestantCategoryRequest $request)
    {
        $contestantCategory = ContestantCategory::create($request->all());

        if ($request->input('category_image', false)) {
            $contestantCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('category_image'))))->toMediaCollection('category_image');
        }

        return (new ContestantCategoryResource($contestantCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContestantCategory $contestantCategory)
    {
        abort_if(Gate::denies('contestant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContestantCategoryResource($contestantCategory);
    }

    public function update(UpdateContestantCategoryRequest $request, ContestantCategory $contestantCategory)
    {
        $contestantCategory->update($request->all());

        if ($request->input('category_image', false)) {
            if (! $contestantCategory->category_image || $request->input('category_image') !== $contestantCategory->category_image->file_name) {
                if ($contestantCategory->category_image) {
                    $contestantCategory->category_image->delete();
                }
                $contestantCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('category_image'))))->toMediaCollection('category_image');
            }
        } elseif ($contestantCategory->category_image) {
            $contestantCategory->category_image->delete();
        }

        return (new ContestantCategoryResource($contestantCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContestantCategory $contestantCategory)
    {
        abort_if(Gate::denies('contestant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contestantCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
