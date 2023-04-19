@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('subject.subjects')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('subject.update')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    {{-- @dd($subject->grade_id) --}}
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
        <form action="{{ route('subjects.update', $subject->id) }}" method="post" class="w-100">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">@lang('subject.name_ar')</label>
                        <input type="text" class="form-control" name="name_ar"
                            value="{{ $subject->getTranslation('name', 'ar') }}" required placeholder="@lang('subject.name_ar')">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">@lang('subject.name_en')</label>
                        <input type="text" class="form-control" name="name_en"
                            value="{{ $subject->getTranslation('name', 'en') }}" required placeholder="@lang('subject.name_en')">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.grade') }}
                    </label>
                    <div class="">
                        <select name="grade" class="form-control select2-no-search">
                            <option selected disabled>{{ __('students.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option {{ $subject->grade_id == $grade->id ? 'selected' : '' }}
                                    value="{{ $grade->id }}">
                                    {{ $grade->name }}</option>
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
                            <option selected value="{{ $subject->classroom_id }}">{{ $subject->classroom->class_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('teachers.teachers_name') }}
                    </label>
                    <div class="">
                        <select name="teacher" class="form-control select2-no-search">
                            <option selected disabled label="@lang('teachers.teachers_name')"></option>
                            @foreach ($teachers as $teacher)
                                <option {{ $subject->grade_id == $teacher->id ? 'selected' : '' }}
                                    value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
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
