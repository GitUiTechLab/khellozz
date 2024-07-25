<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContactFormRequest;
use App\Http\Requests\StoreContactFormRequest;
use App\Http\Requests\UpdateContactFormRequest;
use App\Models\ContactForm;
use App\Models\SportCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactFormController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contact_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContactForm::with(['sport_name'])->select(sprintf('%s.*', (new ContactForm)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contact_form_show';
                $editGate      = 'contact_form_edit';
                $deleteGate    = 'contact_form_delete';
                $crudRoutePart = 'contact-forms';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->addColumn('sport_name_sport_name', function ($row) {
                return $row->sport_name ? $row->sport_name->sport_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'sport_name']);

            return $table->make(true);
        }

        return view('admin.contactForms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contact_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contactForms.create', compact('sport_names'));
    }

    public function store(StoreContactFormRequest $request)
    {
        $contactForm = ContactForm::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contactForm->id]);
        }

        return redirect()->route('admin.contact-forms.index');
    }

    public function edit(ContactForm $contactForm)
    {
        abort_if(Gate::denies('contact_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sport_names = SportCategory::pluck('sport_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contactForm->load('sport_name');

        return view('admin.contactForms.edit', compact('contactForm', 'sport_names'));
    }

    public function update(UpdateContactFormRequest $request, ContactForm $contactForm)
    {
        $contactForm->update($request->all());

        return redirect()->route('admin.contact-forms.index');
    }

    public function show(ContactForm $contactForm)
    {
        abort_if(Gate::denies('contact_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactForm->load('sport_name');

        return view('admin.contactForms.show', compact('contactForm'));
    }

    public function destroy(ContactForm $contactForm)
    {
        abort_if(Gate::denies('contact_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactFormRequest $request)
    {
        $contactForms = ContactForm::find(request('ids'));

        foreach ($contactForms as $contactForm) {
            $contactForm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contact_form_create') && Gate::denies('contact_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ContactForm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
