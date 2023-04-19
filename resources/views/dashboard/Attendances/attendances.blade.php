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
                <h4 class="content-title mb-0 my-auto">{{ __('attendances.attendance') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('attendances.student_list') }}</span>
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
                                                    <th>{{ __('students.section') }}</th>
                                                    <th>{{ __('students.classroom') }}</th>
                                                    <th>{{ __('tables.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gs->sections as $key => $section)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $section->section_name }}</td>
                                                        <td>{{ $section->classroom->class_name }}</td>
                                                        <td>
                                                            <a href="{{ route('attendances.show', $section->id) }}"
                                                                class="btn btn-outline-primary">@lang('attendances.student_list')</a>
                                                        </td>
                                                    </tr>
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
