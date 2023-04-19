@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('teachers.teachers') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('teachers.update') }}</span>
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
        <form action="{{ url('teachers/' . $teacher->id) }}" class="w-100" method="POST">
            {{ method_field('put') }}
            @csrf
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">{{ __('teachers.name_ar') }}</label>
                    <input type="text" value="{{ $teacher->getTranslation('name', 'ar') }}" class="form-control"
                        name="name_ar" id="name_ar">
                </div>
                <div class="form-group col-6">
                    <label for="name_en">{{ __('teachers.name_en') }}</label>
                    <input type="text" value="{{ $teacher->getTranslation('name', 'en') }}" class="form-control"
                        name="name_en" id="name_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="address_ar">{{ __('teachers.address_ar') }}</label>
                    <input type="text" value="{{ $teacher->getTranslation('address', 'ar') }}" class="form-control"
                        name="address_ar" id="address_ar">
                </div>
                <div class="form-group col-6">
                    <label for="address_en">{{ __('teachers.address_en') }}</label>
                    <input type="text" value="{{ $teacher->getTranslation('address', 'en') }}" class="form-control"
                        name="address_en" id="address_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">{{ __('teachers.email') }}</label>
                    <input type="email" value="{{ $teacher->email }}" class="form-control" name="email" id="email">
                </div>
                <div class="form-group col-6">
                    <label for="password">{{ __('teachers.password') }}</label>
                    <input type="password" autocomplete="new-password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">{{ __('teachers.email') }}</label>
                    <input type="date" value="{{ $teacher->joining_date }}" class="form-control" name="date"
                        id="date">
                </div>
                <div class="form-group col-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('teachers.specialization') }}
                    </label>
                    <div class="">
                        <select name="special_id" class="form-control select2-no-search">
                            @foreach ($specializations as $specialization)
                                <option {{ $teacher->specialization_id == $specialization->id ? 'selected' : '' }}
                                    value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('teachers.gender') }}
                    </label>
                    <div class="">
                        <select name="gender_id" class="form-control select2-no-search">
                            {{-- <option selected value="{{ $teacher->gender->id }}">{{ $teacher->gender->name }}
                            </option> --}}
                            @foreach ($genders as $gender)
                                <option {{ $teacher->gender_id == $gender->id ? 'selected' : '' }}
                                    value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="{{ __('teachers.update') }}" class="btn btn-primary">
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
