@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('students.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('students.update') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('students/' . $student->id) }}" class="w-100" method="POST">
            {{ method_field('put') }}
            @csrf
            <input type="hidden" name="id" value="{{ $student->id }}">
            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">{{ __('students.name_ar') }}</label>
                    <input type="text" value="{{ $student->getTranslation('name', 'ar') }}" class="form-control"
                        name="name_ar" id="name_ar">
                </div>
                <div class="form-group col-6">
                    <label for="name_en">{{ __('students.name_en') }}</label>
                    <input type="text" value="{{ $student->getTranslation('name', 'en') }}" class="form-control"
                        name="name_en" id="name_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">{{ __('students.email') }}</label>
                    <input type="email" value="{{ $student->email }}" class="form-control" name="email" id="email">
                </div>
                <div class="form-group col-6">
                    <label for="password">{{ __('students.password') }}</label>
                    <input type="password" autocomplete="new-password" class="form-control" name="password" id="password">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-3">
                    <label for="date">{{ __('students.date') }}</label>
                    <input type="date" value="{{ $student->birth_day }}" class="form-control" name="date"
                        id="date">
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.nationalities') }}
                    </label>
                    <div class="">
                        <select name="nationalitie" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($nationalities as $nationalitie)
                                <option {{ $student->nationalitie_id == $nationalitie->id ? 'selected' : '' }}
                                    value="{{ $nationalitie->id }}">{{ $nationalitie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.gender') }}
                    </label>
                    <div class="">
                        <select name="gender" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($genders as $gender)
                                <option {{ $student->gender_id == $gender->id ? 'selected' : '' }}
                                    value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.blood') }}
                    </label>
                    <div class="">
                        <select name="blood" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($bloods as $blood)
                                <option {{ $student->blood_id == $blood->id ? 'selected' : '' }}
                                    value="{{ $blood->id }}">{{ $blood->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-2">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.grade') }}
                    </label>
                    <div class="">
                        <select name="grade" class="form-control select2-no-search">
                            <option selected disabled>{{ __('students.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option {{ $student->grade_id == $grade->id ? 'selected' : '' }}
                                    value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-2">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.classroom') }}
                    </label>
                    <div class="">
                        <select name="classroom" class="form-control select2-no-search">
                            <option selected value="{{ $student->classroom_id }}">{{ $student->classroom->class_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-2">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="section" class="form-control select2-no-search">
                            <option selected value="{{ $student->section_id }}">{{ $student->section->section_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.guardian') }}
                    </label>
                    <div class="">
                        <select name="guardian" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($guardians as $guardian)
                                <option {{ $student->guardian_id == $guardian->id ? 'selected' : '' }}
                                    value="{{ $guardian->id }}">{{ $guardian->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.year') }}
                    </label>
                    <div class="">
                        <select name="year" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @php
                                $current_year = date('Y');
                            @endphp
                            @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                <option {{ $student->academic_year == $year ? 'selected' : '' }}
                                    value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="{{ __('students.update') }}" class="btn btn-primary">
        </form>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    // Get Classroom
    <script>
        $(document).ready(function() {
            $('select[name="grade"]').on('change', function() {
                var grade = $(this).val();
                if (grade) {
                    $.ajax({
                        url: "{{ url('students/get_classroom') }}/" + grade,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="classroom"]').empty();
                            $('select[name="classroom"]').append(
                                '<option selected disabled >{{ __('students.classroom') }}...</option>'
                            );
                            $.each(data, function(key, value) {

                                $('select[name="classroom"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>')
                            })
                        }
                    })
                } else {
                    console.log('Ajax Load did not work');
                }
            })
        })
    </script>
    // Get Section
    <script>
        $(document).ready(function() {
            $('select[name="classroom"]').on('change', function() {
                var classRoom = $(this).val();
                if (classRoom) {
                    $.ajax({
                        url: "{{ url('students/get_section') }}/" + classRoom,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="section"]').empty();
                            $('select[name="section"]').append(
                                '<option selected disabled >{{ __('students.section') }}...</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="section"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>')
                            })
                        }
                    })
                } else {
                    console.log('Ajax Load did not work');
                }
            })
        })
    </script>
@endsection
