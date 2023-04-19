@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lectures.lectures')</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lectures.lectures_list')</span>
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
        <form action="{{ route('lectuer.store') }}" method="post" class="w-100">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.grade') }}
                    </label>
                    <div class="">
                        <select name="grade" class="form-control">
                            <option selected disabled>{{ __('students.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.classroom') }}
                    </label>
                    <div class="">
                        <select name="classroom" class="form-control">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="section" class="form-control">
                            <option selected disabled label=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label class="form-label">
                        @lang('lectures.title')
                        @endlang
                    </label>
                    <input type="text" name="name" class="form-control" placeholder="@lang('lectures.title')">
                </div>
                <div class="col-md-3 form-group">
                    <label class="form-label"> @lang('lectures.duration') </label>
                    <input type="number" name="num" class="form-control" placeholder="@lang('lectures.duration')">
                </div>
                <div class="col-md-3 form-group">
                    <label class="form-label"> @lang('lectures.start') </label>
                    <input type="datetime-local" name="start" class="form-control" placeholder="@lang('lectures.start')">
                </div>
                <div class="col-md-3 form-group">
                    <label class="form-label">
                        @lang('lectures.password')
                    </label>
                    <input type="text" name="password" class="form-control" placeholder="@lang('lectures.password')">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="form-label"> @lang('lectures.meeting_id') </label>
                    <input type="number" name="meeting_id" class="form-control" placeholder="@lang('lectures.meeting_id')">
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label"> @lang('lectures.start_url') </label>
                    <input type="url" name="start_url" class="form-control" placeholder="@lang('lectures.start_url')">
                </div>
                <div class="col-md-4 form-group">
                    <label class="form-label"> @lang('lectures.join_url') </label>
                    <input type="url" name="join_url" class="form-control" placeholder="@lang('lectures.join_url')">
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
