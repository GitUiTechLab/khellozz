<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddBlogRequest;
use App\Http\Requests\StoreAddBlogRequest;
use App\Http\Requests\UpdateAddBlogRequest;
use App\Models\AddBlog;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddBlogController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddBlog::with(['sport_name'])->select(sprintf('%s.*', (new AddBlog)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_blog_show';
                $editGate      = 'add_blog_edit';
                $deleteGate    = 'add_blog_delete';
                $crudRoutePart = 'add-blogs';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
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

            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'sport_name']);

            return $table->make(true);
        }

        return view('admin.addBlogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addBlogs.create', compact('sport_names'));
    }

    public function store(StoreAddBlogRequest $request)
    {
        $addBlog = AddBlog::create($request->all());

        if ($request->input('image', false)) {
            $addBlog->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addBlog->id]);
        }

        return redirect()->route('admin.add-blogs.index');
    }

    public function edit(AddBlog $addBlog)
    {
        abort_if(Gate::denies('add_blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addBlog->load('sport_name');

        return view('admin.addBlogs.edit', compact('addBlog', 'sport_names'));
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

        return redirect()->route('admin.add-blogs.index');
    }

    public function show(AddBlog $addBlog)
    {
        abort_if(Gate::denies('add_blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addBlog->load('sport_name');

        return view('admin.addBlogs.show', compact('addBlog'));
    }

    public function destroy(AddBlog $addBlog)
    {
        abort_if(Gate::denies('add_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addBlog->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddBlogRequest $request)
    {
        $addBlogs = AddBlog::find(request('ids'));

        foreach ($addBlogs as $addBlog) {
            $addBlog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_blog_create') && Gate::denies('add_blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddBlog();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
