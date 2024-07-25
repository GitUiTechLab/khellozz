<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddReviewRequest;
use App\Http\Requests\StoreAddReviewRequest;
use App\Http\Requests\UpdateAddReviewRequest;
use App\Models\AddReview;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddReviewController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddReview::query()->select(sprintf('%s.*', (new AddReview)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_review_show';
                $editGate      = 'add_review_edit';
                $deleteGate    = 'add_review_delete';
                $crudRoutePart = 'add-reviews';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('review', function ($row) {
                return $row->review ? $row->review : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('reviewer_name', function ($row) {
                return $row->reviewer_name ? $row->reviewer_name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.addReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addReviews.create');
    }

    public function store(StoreAddReviewRequest $request)
    {
        $addReview = AddReview::create($request->all());

        if ($request->input('image', false)) {
            $addReview->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addReview->id]);
        }

        return redirect()->route('admin.add-reviews.index');
    }

    public function edit(AddReview $addReview)
    {
        abort_if(Gate::denies('add_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addReviews.edit', compact('addReview'));
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

        return redirect()->route('admin.add-reviews.index');
    }

    public function show(AddReview $addReview)
    {
        abort_if(Gate::denies('add_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addReviews.show', compact('addReview'));
    }

    public function destroy(AddReview $addReview)
    {
        abort_if(Gate::denies('add_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddReviewRequest $request)
    {
        $addReviews = AddReview::find(request('ids'));

        foreach ($addReviews as $addReview) {
            $addReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_review_create') && Gate::denies('add_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddReview();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
