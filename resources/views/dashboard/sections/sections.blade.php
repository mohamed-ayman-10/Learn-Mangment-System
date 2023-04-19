@extends('layouts.master')
@section('css')
    <!-- Interenal Accordion Css -->
    <link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('sections.sections') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('sections.section_list') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header pb-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <a class="modal-effect btn btn-primary" data-effect="effect-scale" data-toggle="modal"
                            href="#modaldemo8">{{ __('sections.create') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="panel-group1" id="accordion11">
                        @foreach ($grades_sections as $gs)
                            <div class="panel panel-default  mb-4">
                                <div class="panel-heading1 bg-primary ">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#accordion11" href="#collapse{{ $gs->id }}"
                                            aria-expanded="false">{{ $gs->name }}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $gs->id }}" class="panel-collapse collapse" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body border">
                                        <table class="table table-striped text-center mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('sections.section_name') }}</th>
                                                    <th>{{ __('sections.class_name') }}</th>
                                                    <th>{{ __('tables.status') }}</th>
                                                    <th>{{ __('tables.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gs->sections as $section)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <th>{{ $section->section_name }}</th>
                                                        <td>{{ $section->classroom->class_name }}</td>
                                                        <td>
                                                            @if ($section->status == 1)
                                                                <span
                                                                    class="bg-success py-1 px-2 rounded text-light">{{ __('sections.active') }}</span>
                                                            @else
                                                                <span
                                                                    class="bg-danger py-1 px-2 rounded text-light">{{ __('sections.not_active') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="modal-effect btn btn-primary"
                                                                data-effect="effect-scale" data-toggle="modal"
                                                                href="#edit{{ $section->id }}">{{ __('tables.update') }}
                                                            </a>

                                                            <a class="modal-effect btn btn-danger"
                                                                data-effect="effect-scale" data-toggle="modal"
                                                                href="#delete{{ $section->id }}">{{ __('tables.delete') }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Update Modal effects -->
                                                    <div class="modal" id="edit{{ $section->id }}">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">
                                                                        {{ __('sections.update') }}
                                                                    </h6><button aria-label="Close" class="close"
                                                                        data-dismiss="modal" type="button"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <form action="sections/{{ $section->id }}" method="POST">
                                                                    {{ method_field('put') }}
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $section->id }}">
                                                                    <div class="modal-body" data-class-room="list_class"
                                                                        id="dynamicadd">
                                                                        <div class="row row-sm">
                                                                            <div class="col-6">
                                                                                <div class="form-group mg-b-0">
                                                                                    <label
                                                                                        class="form-label">{{ __('sections.name_ar') }}:
                                                                                    </label>
                                                                                    <input class="form-control"
                                                                                        name="section_name_ar"
                                                                                        type="text"
                                                                                        value="{{ $section->getTranslation('section_name', 'ar') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="form-label">{{ __('sections.name_en') }}:
                                                                                    </label>
                                                                                    <input class="form-control"
                                                                                        name="section_name_en"
                                                                                        type="text"
                                                                                        value="{{ $section->getTranslation('section_name', 'en') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                                    {{ __('sections.Grade_name') }}
                                                                                </label>
                                                                                <div class="">
                                                                                    <select name="grade_id"
                                                                                        class="form-control select2-no-search">
                                                                                        <option
                                                                                            value="{{ $section->grade_id }}">
                                                                                            {{ $section->grade->name }}
                                                                                        </option>
                                                                                        @foreach ($grades as $grade)
                                                                                            <option
                                                                                                value="{{ $grade->id }}">
                                                                                                {{ $grade->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                                    {{ __('sections.class_name') }}
                                                                                </label>
                                                                                <div class="">
                                                                                    <select name="class_id"
                                                                                        class="form-control select2-no-search">
                                                                                        <option
                                                                                            value="{{ $section->classroom->id }}">
                                                                                            {{ $section->classroom->class_name }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 mt-4">
                                                                                <label
                                                                                    class="main-content-label tx-11 tx-medium tx-gray-600">
                                                                                    {{ __('sections.teachers_select') }}
                                                                                </label>
                                                                                <select class="custom-select"
                                                                                    name="teacher_id[]" multiple>
                                                                                    <?php $i = []; ?>
                                                                                    @foreach ($section->teachers as $teacher)
                                                                                        <option selected
                                                                                            value="{{ $teacher['id'] }}">
                                                                                            {{ $teacher['name'] }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                    @foreach ($teachers as $teacher)
                                                                                        <option
                                                                                            value="{{ $teacher->id }}">
                                                                                            {{ $teacher->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="">
                                                                                <div class="mt-3">
                                                                                    <label class="ckbox">
                                                                                        @if ($section->status == 1)
                                                                                            <input type="checkbox" checked
                                                                                                name="status">
                                                                                        @else
                                                                                            <input type="checkbox"
                                                                                                name="status">
                                                                                        @endif
                                                                                        <span>{{ __('tables.status') }}</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn ripple btn-primary"
                                                                            type="submit">{{ __('tables.save') }}</button>
                                                                        <button class="btn ripple btn-secondary"
                                                                            data-dismiss="modal"
                                                                            type="button">{{ __('tables.close') }}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Modal effects -->
                                                    <div class="modal" id="delete{{ $section->id }}">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">{{ __('sections.delete') }}
                                                                    </h6><button aria-label="Close" class="close"
                                                                        data-dismiss="modal" type="button"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <form action="sections/{{ $section->id }}"
                                                                    method="POST">
                                                                    {{ method_field('DELETE') }}
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <p>{{ __('tables.delete_q') . ' ' . $section->section_name . '؟' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn ripple btn-danger"
                                                                            type="submit">{{ __('tables.delete') }}</button>
                                                                        <button class="btn ripple btn-secondary"
                                                                            data-dismiss="modal"
                                                                            type="button">{{ __('tables.close') }}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('sections.create') }}</h6><button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('sections.store') }}" method="post">
                        @csrf
                        <div class="modal-body" data-class-room="list_class" id="dynamicadd">
                            <div class="row row-sm">
                                <div class="col-6">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">{{ __('sections.name_ar') }}: </label>
                                        <input class="form-control" name="section_name_ar" type="text">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('sections.name_en') }}: </label>
                                        <input class="form-control" name="section_name_en" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                        {{ __('sections.Grade_name') }}
                                    </label>
                                    <div class="">
                                        <select name="grade_id" class="form-control select2-no-search">
                                            <option label="{{ __('sections.Grade_name') }}">
                                            </option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">
                                                    {{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                        {{ __('sections.class_name') }}
                                    </label>
                                    <div class="">
                                        <select name="class_id" class="form-control select2-no-search">
                                            <option selected disabled label="{{ __('sections.class_name') }}">
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                                        {{ __('sections.teachers_select') }}
                                    </label>
                                    <select class="custom-select" name="teacher_id[]" multiple>
                                        <option selected disabled label="{{ __('sections.class_name') }}"></option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">{{ __('tables.save') }}</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                type="button">{{ __('tables.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/accordion.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select[name = "grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>')
                            })
                        }
                    })
                } else {
                    console.log('AJAX load did not work')
                }
            })
        })
    </script>
@endsection
