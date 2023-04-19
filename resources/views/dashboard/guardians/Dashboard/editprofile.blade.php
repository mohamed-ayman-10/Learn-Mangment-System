@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        #showPass {
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
        }

        input#pass {
            padding-right: 3rem;
        }
    </style>
@endsection
@section('page-header')
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm py-3">
        <!-- Col -->

        <div class="col-xl-4 text-center">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt="" src="{{ asset('assets/images/teacher.png') }}">
                            </div>
                            <div class="d-flex">
                                <div class="w-100">
                                    <h5 class="main-profile-name text-center">{{ $guardian->name }}</h5>
                                    <p class="main-profile-name-text">{{ $guardian->email }}</p>
                                    <p class="main-profile-name-text">@lang('students.student')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <form class="form-horizontal" action="{{ url('guardian/dashboard/profile/' . $guardian->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">@lang('tables.name_ar')</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name_ar" class="form-control"
                                        placeholder="@lang('tables.name_ar')"
                                        value="{{ $guardian->getTranslation('name', 'ar') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">@lang('tables.name_en')</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name_en" class="form-control" placeholder="Last Name"
                                        value="{{ $guardian->getTranslation('name', 'en') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">@lang('teachers.email')</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="@lang('teachers.email')" value="{{ $guardian->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">@lang('teachers.password')</label>
                                </div>
                                <div class="col-md-9 position-relative">
                                    <input id="pass" autocomplete="new-password" type="password" name="password"
                                        class="form-control" placeholder="@lang('teachers.password')">
                                    <button id="showPass" class="position-absolute btn btn-transparent">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('tables.update')</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>

    <script>
        var btn = document.getElementById("showPass");
        var active = false;
        btn.addEventListener("click", function(e) {
            e.preventDefault()
            if (active == true) {
                active = false
                document.getElementById("pass").setAttribute("type", "password");
            } else {
                active = true
                document.getElementById("pass").setAttribute("type", "text");
            }
        });
    </script>
@endsection
