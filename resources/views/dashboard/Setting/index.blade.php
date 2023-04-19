@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('words.settings')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('words.settings')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <form class="col-md-6" action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.title') : </label>
                <input type="text" name="title" value="{{ $setting['title'] }}" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.phone') : </label>
                <input type="number" name="phone" value="{{ $setting['phone'] }}" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.email') : </label>
                <input type="email" name="email" value="{{ $setting['email'] }}" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.address') : </label>
                <input type="text" name="address" value="{{ $setting['address'] }}" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.year') : </label>
                <input type="text" name="year" value="{{ $setting['current_session'] }}" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center">
                <label class="form-label w-25" for="">@lang('words.logo') : </label>
                <input type="file" name="logo" accept="image/*" class="form-control">
            </div>
            <div class="logo mb-3">
                <img src="{{ asset('attachments/setting/' . $setting['logo']) }}" alt="logo" class="w-25">
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
