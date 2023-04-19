@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('students.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('students.create') }}</span>
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
        <form action="{{ route('students.store') }}" class="w-100" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">{{ __('students.name_ar') }}</label>
                    <input type="name" class="form-control" name="name_ar" id="name_ar">
                </div>
                <div class="form-group col-6">
                    <label for="name_en">{{ __('students.name_en') }}</label>
                    <input type="name" class="form-control" name="name_en" id="name_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">{{ __('students.email') }}</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group col-6">
                    <label for="password">{{ __('students.password') }}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-3">
                    <label for="date">{{ __('students.date') }}</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group col-3">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.nationalities') }}
                    </label>
                    <div class="">
                        <select name="nationalitie" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($nationalities as $nationalitie)
                                <option value="{{ $nationalitie->id }}">{{ $nationalitie->name }}</option>
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
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
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
                                <option value="{{ $blood->id }}">{{ $blood->name }}</option>
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
                        {{ __('students.guardian') }}
                    </label>
                    <div class="">
                        <select name="guardian" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($guardians as $guardian)
                                <option value="{{ $guardian->id }}">{{ $guardian->name }}</option>
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
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <input type="file" multiple accept="image/*" name="images[]" class="form-control w-25 mb-3">
            <input type="submit" value="{{ __('students.create') }}" class="btn btn-primary">
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
