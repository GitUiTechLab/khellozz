<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddFaqRequest;
use App\Http\Requests\StoreAddFaqRequest;
use App\Http\Requests\UpdateAddFaqRequest;
use App\Models\AddFaq;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddFaqController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('add_faq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddFaq::query()->select(sprintf('%s.*', (new AddFaq)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'add_faq_show';
                $editGate      = 'add_faq_edit';
                $deleteGate    = 'add_faq_delete';
                $crudRoutePart = 'add-faqs';

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
            $table->editColumn('question', function ($row) {
                return $row->question ? $row->question : '';
            });
            $table->editColumn('answer', function ($row) {
                return $row->answer ? $row->answer : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.addFaqs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('add_faq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addFaqs.create');
    }

    public function store(StoreAddFaqRequest $request)
    {
        $addFaq = AddFaq::create($request->all());

        return redirect()->route('admin.add-faqs.index');
    }

    public function edit(AddFaq $addFaq)
    {
        abort_if(Gate::denies('add_faq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addFaqs.edit', compact('addFaq'));
    }

    public function update(UpdateAddFaqRequest $request, AddFaq $addFaq)
    {
        $addFaq->update($request->all());

        return redirect()->route('admin.add-faqs.index');
    }

    public function show(AddFaq $addFaq)
    {
        abort_if(Gate::denies('add_faq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addFaqs.show', compact('addFaq'));
    }

    public function destroy(AddFaq $addFaq)
    {
        abort_if(Gate::denies('add_faq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addFaq->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddFaqRequest $request)
    {
        $addFaqs = AddFaq::find(request('ids'));

        foreach ($addFaqs as $addFaq) {
            $addFaq->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
