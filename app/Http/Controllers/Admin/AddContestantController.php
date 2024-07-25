<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddContestantRequest;
use App\Http\Requests\StoreAddContestantRequest;
use App\Http\Requests\UpdateAddContestantRequest;
use App\Models\AddContestant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddContestantController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_contestant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddContestant::query()->select(sprintf('%s.*', (new AddContestant)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_contestant_show';
                $editGate      = 'add_contestant_edit';
                $deleteGate    = 'add_contestant_delete';
                $crudRoutePart = 'add-contestants';

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
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.addContestants.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_contestant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addContestants.create');
    }

    public function store(StoreAddContestantRequest $request)
    {
        $addContestant = AddContestant::create($request->all());

        return redirect()->route('admin.add-contestants.index');
    }

    public function edit(AddContestant $addContestant)
    {
        abort_if(Gate::denies('add_contestant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addContestants.edit', compact('addContestant'));
    }

    public function update(UpdateAddContestantRequest $request, AddContestant $addContestant)
    {
        $addContestant->update($request->all());

        return redirect()->route('admin.add-contestants.index');
    }

    public function show(AddContestant $addContestant)
    {
        abort_if(Gate::denies('add_contestant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addContestants.show', compact('addContestant'));
    }

    public function destroy(AddContestant $addContestant)
    {
        abort_if(Gate::denies('add_contestant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addContestant->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddContestantRequest $request)
    {
        $addContestants = AddContestant::find(request('ids'));

        foreach ($addContestants as $addContestant) {
            $addContestant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
