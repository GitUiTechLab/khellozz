<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContactFormRequest;
use App\Http\Requests\UpdateContactFormRequest;
use App\Http\Resources\Admin\ContactFormResource;
use App\Models\ContactForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactFormApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contact_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactFormResource(ContactForm::with(['sport_name'])->get());
    }

    public function store(StoreContactFormRequest $request)
    {
        $contactForm = ContactForm::create($request->all());

        return (new ContactFormResource($contactForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContactForm $contactForm)
    {
        abort_if(Gate::denies('contact_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactFormResource($contactForm->load(['sport_name']));
    }

    public function update(UpdateContactFormRequest $request, ContactForm $contactForm)
    {
        $contactForm->update($request->all());

        return (new ContactFormResource($contactForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContactForm $contactForm)
    {
        abort_if(Gate::denies('contact_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
