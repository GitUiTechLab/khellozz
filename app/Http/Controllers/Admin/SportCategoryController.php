<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySportCategoryRequest;
use App\Http\Requests\StoreSportCategoryRequest;
use App\Http\Requests\UpdateSportCategoryRequest;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SportCategoryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sport_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SportCategory::query()->select(sprintf('%s.*', (new SportCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sport_category_show';
                $editGate      = 'sport_category_edit';
                $deleteGate    = 'sport_category_delete';
                $crudRoutePart = 'sport-categories';

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
            $table->editColumn('sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sportCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sport_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportCategories.create');
    }

    public function store(StoreSportCategoryRequest $request)
    {
        $sportCategory = SportCategory::create($request->all());

        return redirect()->route('admin.sport-categories.index');
    }

    public function edit(SportCategory $sportCategory)
    {
        abort_if(Gate::denies('sport_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportCategories.edit', compact('sportCategory'));
    }

    public function update(UpdateSportCategoryRequest $request, SportCategory $sportCategory)
    {
        $sportCategory->update($request->all());

        return redirect()->route('admin.sport-categories.index');
    }

    public function show(SportCategory $sportCategory)
    {
        abort_if(Gate::denies('sport_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sportCategories.show', compact('sportCategory'));
    }

    public function destroy(SportCategory $sportCategory)
    {
        abort_if(Gate::denies('sport_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sportCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySportCategoryRequest $request)
    {
        $sportCategories = SportCategory::find(request('ids'));

        foreach ($sportCategories as $sportCategory) {
            $sportCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
