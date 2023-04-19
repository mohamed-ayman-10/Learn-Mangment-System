@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('teachers.teachers') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('teachers.create') }}</span>
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
        <form action="{{ route('teachers.store') }}" class="w-100" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="name_ar">{{ __('teachers.name_ar') }}</label>
                    <input type="name" class="form-control" name="name_ar" id="name_ar">
                </div>
                <div class="form-group col-6">
                    <label for="name_en">{{ __('teachers.name_en') }}</label>
                    <input type="name" class="form-control" name="name_en" id="name_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="address_ar">{{ __('teachers.address_ar') }}</label>
                    <input type="name" class="form-control" name="address_ar" id="address_ar">
                </div>
                <div class="form-group col-6">
                    <label for="address_en">{{ __('teachers.address_en') }}</label>
                    <input type="name" class="form-control" name="address_en" id="address_en">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">{{ __('teachers.email') }}</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group col-6">
                    <label for="password">{{ __('teachers.password') }}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="date">{{ __('teachers.email') }}</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group col-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('teachers.specialization') }}
                    </label>
                    <div class="">
                        <select name="special_id" class="form-control select2-no-search">
                            <option selected disabled label=""></option>
                            @foreach ($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
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
                            <option selected disabled label=""></option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="{{ __('teachers.create') }}" class="btn btn-primary">
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
