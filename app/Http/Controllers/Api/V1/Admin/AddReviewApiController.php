<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddReviewRequest;
use App\Http\Requests\UpdateAddReviewRequest;
use App\Http\Resources\Admin\AddReviewResource;
use App\Models\AddReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddReviewApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddReviewResource(AddReview::all());
    }

    public function store(StoreAddReviewRequest $request)
    {
        $addReview = AddReview::create($request->all());

        if ($request->input('image', false)) {
            $addReview->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AddReviewResource($addReview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddReview $addReview)
    {
        abort_if(Gate::denies('add_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddReviewResource($addReview);
    }

    public function update(UpdateAddReviewRequest $request, AddReview $addReview)
    {
        $addReview->update($request->all());

        if ($request->input('image', false)) {
            if (! $addReview->image || $request->input('image') !== $addReview->image->file_name) {
                if ($addReview->image) {
                    $addReview->image->delete();
                }
                $addReview->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($addReview->image) {
            $addReview->image->delete();
        }

        return (new AddReviewResource($addReview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddReview $addReview)
    {
        abort_if(Gate::denies('add_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addReview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
