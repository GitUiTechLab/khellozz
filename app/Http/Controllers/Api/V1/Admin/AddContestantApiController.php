<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddContestantRequest;
use App\Http\Requests\UpdateAddContestantRequest;
use App\Http\Resources\Admin\AddContestantResource;
use App\Models\AddContestant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddContestantApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_contestant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddContestantResource(AddContestant::all());
    }

    public function store(StoreAddContestantRequest $request)
    {
        $addContestant = AddContestant::create($request->all());

        return (new AddContestantResource($addContestant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddContestant $addContestant)
    {
        abort_if(Gate::denies('add_contestant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddContestantResource($addContestant);
    }

    public function update(UpdateAddContestantRequest $request, AddContestant $addContestant)
    {
        $addContestant->update($request->all());

        return (new AddContestantResource($addContestant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddContestant $addContestant)
    {
        abort_if(Gate::denies('add_contestant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContestant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
