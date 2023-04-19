@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('attendances.attendance')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('attendances.report')</span>
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
                        <div class="alert alert-danger w-100">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.dashboard.postReport') }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- <p class="mg-b-10">Single Select</p>
                            <select class="form-control select2">
                                <option label="Choose one">
                                </option>
                                <option value="Firefox">
                                    Firefox
                                </option>
                                <option value="Chrome">
                                    Chrome
                                </option>
                                <option value="Safari">
                                    Safari
                                </option>
                                <option value="Opera">
                                    Opera
                                </option>
                                <option value="Internet Explorer">
                                    Internet Explorer
                                </option>
                            </select> --}}
                            <div class="col-md-4 form-group">
                                <label class="form-label">@lang('students.students_name')</label>
                                <select name="student_id" class="form-control select2">
                                    <option value="0">@lang('attendances.all')</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label">@lang('attendances.from')</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label">@lang('attendances.to')</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="@lang('tables.save')" class="btn btn-primary">
                    </form>

                    @isset($attendances)
                        <table class="table table-light table-hover text-center mt-5 bt-5">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('students.students_name')</th>
                                    <th>@lang('students.grade')</th>
                                    <th>@lang('students.classroom')</th>
                                    <th>@lang('students.section')</th>
                                    <th>@lang('students.date')</th>
                                    <th>@lang('tables.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $key => $attendance)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $attendance->student->name }}</td>
                                        <td>{{ $attendance->grade->name }}</td>
                                        <td>{{ $attendance->classroom->class_name }}</td>
                                        <td>{{ $attendance->section->section_name }}</td>
                                        <td>{{ $attendance->date }}</td>
                                        <td>
                                            @if ($attendance->status == 1)
                                                <p class="bg-success text-light py-1 roundend">@lang('attendances.presence')
                                                </p>
                                            @elseif ($attendance->status == 0)
                                                <p class="bg-danger text-light py-1 roundend">@lang('attendances.absence')
                                                </p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endisset
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
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection
