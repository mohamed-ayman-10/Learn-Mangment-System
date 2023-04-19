@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('students.students')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('students.promotion')</span>
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
        <form action="{{ route('promotions.store') }}" method="post" class="w-100">
            @csrf
            <p class="text-danger" style="font-size: 20px">@lang('students.old_classroom')</p>
            <div class="row w-100">
                <div class="form-group col-3">
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
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.classroom') }}
                    </label>
                    <div class="">
                        <select name="classroom" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="section" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.year') }}
                    </label>
                    <select name="old_year" class="form-control select2-no-search">
                        <option selected disabled label="@lang('students.year')"></option>
                        @php
                            $current_year = date('Y');
                        @endphp
                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <p class="text-danger" style="font-size: 20px">@lang('students.new_classroom')</p>
            <div class="row w-100">
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.grade') }}
                    </label>
                    <div class="">
                        <select name="new_grade" class="form-control select2-no-search">
                            <option selected disabled>{{ __('students.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.classroom') }}
                    </label>
                    <div class="">
                        <select name="new_classroom" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="new_section" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.year') }}
                    </label>
                    <select name="new_year" class="form-control select2-no-search">
                        <option selected disabled label="@lang('students.year')"></option>
                        @php
                            $current_year = date('Y');
                        @endphp
                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <input type="submit" value="@lang('tables.save')" class="btn btn-primary">
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
