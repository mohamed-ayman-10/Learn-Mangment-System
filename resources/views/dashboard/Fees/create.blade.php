@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('fees.fees')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('fees.create')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{ route('fees.store') }}" method="post" class="w-100">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="form-group col-4">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('tables.name_ar') }}
                </label>
                <div class="">
                    <input type="text" name="name_ar" class="form-control" required placeholder="@lang('tables.name_ar')">
                </div>
            </div>
            <div class="form-group col-4">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('tables.name_en') }}
                </label>
                <div class="">
                    <input type="text" name="name_en" class="form-control" required placeholder="@lang('tables.name_en')">
                </div>
            </div>
            <div class="form-group col-4">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('fees.salary') }}
                </label>
                <div class="">
                    <input type="number" name="amount" class="form-control" required placeholder="@lang('fees.salary')">
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-3">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('fees.typefee') }}
                </label>
                <select name="type" class="form-control select2-no-search">
                    <option selected disabled label="@lang('fees.typefee')"></option>
                    @foreach ($feeTypes as $feeType)
                        <option value="{{ $feeType->id }}">{{ $feeType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('students.year') }}
                </label>
                <select name="year" class="form-control select2-no-search">
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
        <label class="main-content-label tx-11 tx-medium tx-gray-600">
            {{ __('tables.notes') }}
        </label>
        <textarea name="desc" id="" class="form-control mb-3"></textarea>
        <input type="submit" class="btn btn-primary" value="@lang('tables.save')">
    </form>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
