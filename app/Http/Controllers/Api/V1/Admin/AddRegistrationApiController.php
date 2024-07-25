<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddRegistrationRequest;
use App\Http\Requests\UpdateAddRegistrationRequest;
use App\Http\Resources\Admin\AddRegistrationResource;
use App\Models\AddRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddRegistrationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddRegistrationResource(AddRegistration::with(['sport_name'])->get());
    }

    public function store(StoreAddRegistrationRequest $request)
    {
        $addRegistration = AddRegistration::create($request->all());

        return (new AddRegistrationResource($addRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddRegistration $addRegistration)
    {
        abort_if(Gate::denies('add_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddRegistrationResource($addRegistration->load(['sport_name']));
    }

    public function update(UpdateAddRegistrationRequest $request, AddRegistration $addRegistration)
    {
        $addRegistration->update($request->all());

        return (new AddRegistrationResource($addRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddRegistration $addRegistration)
    {
        abort_if(Gate::denies('add_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addRegistration->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
