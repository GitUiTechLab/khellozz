<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddBlogRequest;
use App\Http\Requests\UpdateAddBlogRequest;
use App\Http\Resources\Admin\AddBlogResource;
use App\Models\AddBlog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddBlogApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddBlogResource(AddBlog::with(['sport_name'])->get());
    }

    public function store(StoreAddBlogRequest $request)
    {
        $addBlog = AddBlog::create($request->all());

        if ($request->input('image', false)) {
            $addBlog->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddBlogResource($addBlog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddBlog $addBlog)
    {
        abort_if(Gate::denies('add_blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddBlogResource($addBlog->load(['sport_name']));
    }

    public function update(UpdateAddBlogRequest $request, AddBlog $addBlog)
    {
        $addBlog->update($request->all());

        if ($request->input('image', false)) {
            if (! $addBlog->image || $request->input('image') !== $addBlog->image->file_name) {
                if ($addBlog->image) {
                    $addBlog->image->delete();
                }
                $addBlog->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addBlog->image) {
            $addBlog->image->delete();
        }

        return (new AddBlogResource($addBlog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddBlog $addBlog)
    {
        abort_if(Gate::denies('add_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addBlog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
