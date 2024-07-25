<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddFaqRequest;
use App\Http\Requests\UpdateAddFaqRequest;
use App\Http\Resources\Admin\AddFaqResource;
use App\Models\AddFaq;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddFaqApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_faq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddFaqResource(AddFaq::all());
    }

    public function store(StoreAddFaqRequest $request)
    {
        $addFaq = AddFaq::create($request->all());

        return (new AddFaqResource($addFaq))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddFaq $addFaq)
    {
        abort_if(Gate::denies('add_faq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddFaqResource($addFaq);
    }

    public function update(UpdateAddFaqRequest $request, AddFaq $addFaq)
    {
        $addFaq->update($request->all());

        return (new AddFaqResource($addFaq))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddFaq $addFaq)
    {
        abort_if(Gate::denies('add_faq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addFaq->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
