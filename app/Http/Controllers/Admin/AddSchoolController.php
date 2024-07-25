<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddSchoolRequest;
use App\Http\Requests\StoreAddSchoolRequest;
use App\Http\Requests\UpdateAddSchoolRequest;
use App\Models\AddSchool;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddSchoolController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_school_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddSchool::query()->select(sprintf('%s.*', (new AddSchool)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_school_show';
                $editGate      = 'add_school_edit';
                $deleteGate    = 'add_school_delete';
                $crudRoutePart = 'add-schools';

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
            $table->editColumn('school_name', function ($row) {
                return $row->school_name ? $row->school_name : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.addSchools.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_school_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addSchools.create');
    }

    public function store(StoreAddSchoolRequest $request)
    {
        $addSchool = AddSchool::create($request->all());

        return redirect()->route('admin.add-schools.index');
    }

    public function edit(AddSchool $addSchool)
    {
        abort_if(Gate::denies('add_school_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addSchools.edit', compact('addSchool'));
    }

    public function update(UpdateAddSchoolRequest $request, AddSchool $addSchool)
    {
        $addSchool->update($request->all());

        return redirect()->route('admin.add-schools.index');
    }

    public function show(AddSchool $addSchool)
    {
        abort_if(Gate::denies('add_school_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addSchools.show', compact('addSchool'));
    }

    public function destroy(AddSchool $addSchool)
    {
        abort_if(Gate::denies('add_school_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addSchool->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddSchoolRequest $request)
    {
        $addSchools = AddSchool::find(request('ids'));

        foreach ($addSchools as $addSchool) {
            $addSchool->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
