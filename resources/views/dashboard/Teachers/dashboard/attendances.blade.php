@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('attendances.attendance')</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
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
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="main-form" action="{{ route('teacher.dashboard.attendance.store') }}" method="post">
                            @csrf
                            <table class="table text-center text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="">#</th>
                                        <th class="">@lang('students.students_name')</th>
                                        <th class="">@lang('students.email')</th>
                                        <th class="">@lang('students.gender')</th>
                                        <th class="">@lang('students.grade')</th>
                                        <th class="">@lang('students.classroom')</th>
                                        <th class="">@lang('students.section')</th>
                                        <th class="">@lang('tables.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->gender->name }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->class_name }}</td>
                                            <td>{{ $student->section->section_name }}</td>
                                            <td>
                                                <div class="btn text-success d-inline ">
                                                    <label form="main-form"
                                                        for="true{{ $student->id }}">@lang('attendances.presence')</label>
                                                    <input type="radio" name="attendance[{{ $student->id }}]"
                                                        id="true{{ $student->id }}" value="1"
                                                        @foreach ($student->attendances()->where('date', date('y-m-d'))->get() as $attendance)
                                                    {{ $attendance->status == 1 ? 'checked' : '' }} @endforeach>
                                                </div>
                                                <div class="btn text-danger d-inline ">
                                                    <label form="main-form"
                                                        for="false{{ $student->id }}">@lang('attendances.absence')</label>
                                                    <input type="radio" name="attendance[{{ $student->id }}]"
                                                        id="false{{ $student->id }}" value="0"
                                                        @foreach ($student->attendances()->where('date', date('y-m-d'))->get() as $attendance)
                                                    {{ $attendance->status == 0 ? 'checked' : '' }} @endforeach>
                                                </div>

                                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                                <input type="hidden" name="classroom_id"
                                                    value="{{ $student->classroom_id }}">
                                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button form="main-form" formaction="{{ route('teacher.dashboard.attendance.store') }}"
                                class="btn btn-primary mb-4" type="submit">@lang('tables.save')</button>
                        </form>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
