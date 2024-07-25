<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFeaturedVideoRequest;
use App\Http\Requests\StoreFeaturedVideoRequest;
use App\Http\Requests\UpdateFeaturedVideoRequest;
use App\Models\FeaturedVideo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FeaturedVideosController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('featured_video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FeaturedVideo::query()->select(sprintf('%s.*', (new FeaturedVideo)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'featured_video_show';
                $editGate      = 'featured_video_edit';
                $deleteGate    = 'featured_video_delete';
                $crudRoutePart = 'featured-videos';

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
            $table->editColumn('video', function ($row) {
                return $row->video ? '<a href="' . $row->video->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'video']);

            return $table->make(true);
        }

        return view('admin.featuredVideos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('featured_video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredVideos.create');
    }

    public function store(StoreFeaturedVideoRequest $request)
    {
        $featuredVideo = FeaturedVideo::create($request->all());

        if ($request->input('video', false)) {
            $featuredVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $featuredVideo->id]);
        }

        return redirect()->route('admin.featured-videos.index');
    }

    public function edit(FeaturedVideo $featuredVideo)
    {
        abort_if(Gate::denies('featured_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredVideos.edit', compact('featuredVideo'));
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

        return redirect()->route('admin.featured-videos.index');
    }

    public function show(FeaturedVideo $featuredVideo)
    {
        abort_if(Gate::denies('featured_video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredVideos.show', compact('featuredVideo'));
    }

    public function destroy(FeaturedVideo $featuredVideo)
    {
        abort_if(Gate::denies('featured_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredVideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeaturedVideoRequest $request)
    {
        $featuredVideos = FeaturedVideo::find(request('ids'));

        foreach ($featuredVideos as $featuredVideo) {
            $featuredVideo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('featured_video_create') && Gate::denies('featured_video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FeaturedVideo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
