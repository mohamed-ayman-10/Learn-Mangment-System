@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('students.students')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('students.create_graduated')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{ route('graduates.softdelete') }}" method="post" class="w-100">
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
            <div class="form-group col-4">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('students.classroom') }}
                </label>
                <div class="">
                    <select name="classroom" class="form-control select2-no-search">
                        <option selected disabled label=""></option>
                    </select>
                </div>
            </div>
            <div class="form-group col-4">
                <label class="main-content-label tx-11 tx-medium tx-gray-600">
                    {{ __('students.section') }}
                </label>
                <div class="">
                    <select name="section" class="form-control select2-no-search">
                        <option selected disabled label=""></option>
                    </select>
                </div>
            </div>
        </div>
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
