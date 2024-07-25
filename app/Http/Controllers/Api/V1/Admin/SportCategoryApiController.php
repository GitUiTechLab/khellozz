<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSportCategoryRequest;
use App\Http\Requests\UpdateSportCategoryRequest;
use App\Http\Resources\Admin\SportCategoryResource;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SportCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sport_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SportCategoryResource(SportCategory::all());
    }

    public function store(StoreSportCategoryRequest $request)
    {
        $sportCategory = SportCategory::create($request->all());

        return (new SportCategoryResource($sportCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SportCategory $sportCategory)
    {
        abort_if(Gate::denies('sport_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SportCategoryResource($sportCategory);
    }

    public function update(UpdateSportCategoryRequest $request, SportCategory $sportCategory)
    {
        $sportCategory->update($request->all());

        return (new SportCategoryResource($sportCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SportCategory $sportCategory)
    {
        abort_if(Gate::denies('sport_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sportCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
