<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddGalleryRequest;
use App\Http\Requests\UpdateAddGalleryRequest;
use App\Http\Resources\Admin\AddGalleryResource;
use App\Models\AddGallery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddGalleryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddGalleryResource(AddGallery::all());
    }

    public function store(StoreAddGalleryRequest $request)
    {
        $addGallery = AddGallery::create($request->all());

        if ($request->input('image', false)) {
            $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddGalleryResource($addGallery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddGalleryResource($addGallery);
    }

    public function update(UpdateAddGalleryRequest $request, AddGallery $addGallery)
    {
        $addGallery->update($request->all());

        if ($request->input('image', false)) {
            if (! $addGallery->image || $request->input('image') !== $addGallery->image->file_name) {
                if ($addGallery->image) {
                    $addGallery->image->delete();
                }
                $addGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addGallery->image) {
            $addGallery->image->delete();
        }

        return (new AddGalleryResource($addGallery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddGallery $addGallery)
    {
        abort_if(Gate::denies('add_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addGallery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
