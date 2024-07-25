<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddSchoolRequest;
use App\Http\Requests\UpdateAddSchoolRequest;
use App\Http\Resources\Admin\AddSchoolResource;
use App\Models\AddSchool;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSchoolApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_school_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddSchoolResource(AddSchool::all());
    }

    public function store(StoreAddSchoolRequest $request)
    {
        $addSchool = AddSchool::create($request->all());

        return (new AddSchoolResource($addSchool))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddSchool $addSchool)
    {
        abort_if(Gate::denies('add_school_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddSchoolResource($addSchool);
    }

    public function update(UpdateAddSchoolRequest $request, AddSchool $addSchool)
    {
        $addSchool->update($request->all());

        return (new AddSchoolResource($addSchool))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddSchool $addSchool)
    {
        abort_if(Gate::denies('add_school_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addSchool->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
