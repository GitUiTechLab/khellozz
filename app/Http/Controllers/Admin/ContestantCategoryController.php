<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContestantCategoryRequest;
use App\Http\Requests\StoreContestantCategoryRequest;
use App\Http\Requests\UpdateContestantCategoryRequest;
use App\Models\ContestantCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContestantCategoryController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contestant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContestantCategory::query()->select(sprintf('%s.*', (new ContestantCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contestant_category_show';
                $editGate      = 'contestant_category_edit';
                $deleteGate    = 'contestant_category_delete';
                $crudRoutePart = 'contestant-categories';

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
            $table->editColumn('category_name', function ($row) {
                return $row->category_name ? $row->category_name : '';
            });
            $table->editColumn('category_image', function ($row) {
                if ($photo = $row->category_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category_image']);

            return $table->make(true);
        }

        return view('admin.contestantCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contestant_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contestantCategories.create');
    }

    public function store(StoreContestantCategoryRequest $request)
    {
        $contestantCategory = ContestantCategory::create($request->all());

        if ($request->input('category_image', false)) {
            $contestantCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('category_image'))))->toMediaCollection('category_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contestantCategory->id]);
        }

        return redirect()->route('admin.contestant-categories.index');
    }

    public function edit(ContestantCategory $contestantCategory)
    {
        abort_if(Gate::denies('contestant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contestantCategories.edit', compact('contestantCategory'));
    }

    public function update(UpdateContestantCategoryRequest $request, ContestantCategory $contestantCategory)
    {
        $contestantCategory->update($request->all());

        if ($request->input('category_image', false)) {
            if (! $contestantCategory->category_image || $request->input('category_image') !== $contestantCategory->category_image->file_name) {
                if ($contestantCategory->category_image) {
                    $contestantCategory->category_image->delete();
                }
                $contestantCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('category_image'))))->toMediaCollection('category_image');
            }
        } elseif ($contestantCategory->category_image) {
            $contestantCategory->category_image->delete();
        }

        return redirect()->route('admin.contestant-categories.index');
    }

    public function show(ContestantCategory $contestantCategory)
    {
        abort_if(Gate::denies('contestant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contestantCategories.show', compact('contestantCategory'));
    }

    public function destroy(ContestantCategory $contestantCategory)
    {
        abort_if(Gate::denies('contestant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contestantCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyContestantCategoryRequest $request)
    {
        $contestantCategories = ContestantCategory::find(request('ids'));

        foreach ($contestantCategories as $contestantCategory) {
            $contestantCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contestant_category_create') && Gate::denies('contestant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ContestantCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
