<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFeaturedVideoRequest;
use App\Http\Requests\UpdateFeaturedVideoRequest;
use App\Http\Resources\Admin\FeaturedVideoResource;
use App\Models\FeaturedVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturedVideosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('featured_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedVideoResource(FeaturedVideo::all());
    }

    public function store(StoreFeaturedVideoRequest $request)
    {
        $featuredVideo = FeaturedVideo::create($request->all());

        if ($request->input('video', false)) {
            $featuredVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        return (new FeaturedVideoResource($featuredVideo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FeaturedVideo $featuredVideo)
    {
        abort_if(Gate::denies('featured_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedVideoResource($featuredVideo);
    }

    public function update(UpdateFeaturedVideoRequest $request, FeaturedVideo $featuredVideo)
    {
        $featuredVideo->update($request->all());

        if ($request->input('video', false)) {
            if (! $featuredVideo->video || $request->input('video') !== $featuredVideo->video->file_name) {
                if ($featuredVideo->video) {
                    $featuredVideo->video->delete();
                }
                $featuredVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($featuredVideo->video) {
            $featuredVideo->video->delete();
        }

        return (new FeaturedVideoResource($featuredVideo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FeaturedVideo $featuredVideo)
    {
        abort_if(Gate::denies('featured_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredVideo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
