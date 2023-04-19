@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('subject.subjects')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('subject.create')</span>
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
        <form action="{{ route('teacher.dashboard.exams.store') }}" method="post" class="w-100">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">@lang('exam.name_ar')</label>
                        <input type="text" class="form-control" name="name_ar" required placeholder="@lang('exam.name_ar')">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">@lang('exam.name_en')</label>
                        <input type="text" class="form-control" name="name_en" required placeholder="@lang('exam.name_en')">
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
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
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
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-2">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="section" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('subject.name') }}
                    </label>
                    <div class="">
                        <select name="subject" class="form-control select2-no-search">
                            <option selected disabled>{{ __('subject.name') }}</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                            <option selected disabled label="{{ __('students.year') }}"></option>
                            @php
                                $current_year = date('Y');
                            @endphp
                            @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="@lang('tables.save')">
        </form>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
