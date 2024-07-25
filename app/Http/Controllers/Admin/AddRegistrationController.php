<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddRegistrationRequest;
use App\Http\Requests\StoreAddRegistrationRequest;
use App\Http\Requests\UpdateAddRegistrationRequest;
use App\Models\AddRegistration;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddRegistrationController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddRegistration::with(['sport_name'])->select(sprintf('%s.*', (new AddRegistration)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_registration_show';
                $editGate      = 'add_registration_edit';
                $deleteGate    = 'add_registration_delete';
                $crudRoutePart = 'add-registrations';

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
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->editColumn('gender', function ($row) {
                return $row->gender ? AddRegistration::GENDER_RADIO[$row->gender] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'sport_name']);

            return $table->make(true);
        }

        return view('admin.addRegistrations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addRegistrations.create', compact('sport_names'));
    }

    public function store(StoreAddRegistrationRequest $request)
    {
        $addRegistration = AddRegistration::create($request->all());

        return redirect()->route('admin.add-registrations.index');
    }

    public function edit(AddRegistration $addRegistration)
    {
        abort_if(Gate::denies('add_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addRegistration->load('sport_name');

        return view('admin.addRegistrations.edit', compact('addRegistration', 'sport_names'));
    }

    public function update(UpdateAddRegistrationRequest $request, AddRegistration $addRegistration)
    {
        $addRegistration->update($request->all());

        return redirect()->route('admin.add-registrations.index');
    }

    public function show(AddRegistration $addRegistration)
    {
        abort_if(Gate::denies('add_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addRegistration->load('sport_name');

        return view('admin.addRegistrations.show', compact('addRegistration'));
    }

    public function destroy(AddRegistration $addRegistration)
    {
        abort_if(Gate::denies('add_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddRegistrationRequest $request)
    {
        $addRegistrations = AddRegistration::find(request('ids'));

        foreach ($addRegistrations as $addRegistration) {
            $addRegistration->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
