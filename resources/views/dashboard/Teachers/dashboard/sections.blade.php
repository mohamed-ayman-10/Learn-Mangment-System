@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('sections.sections')</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger w-100">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: clip !important">
                        <table class="table table-light table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('students.section')</th>
                                    <th>@lang('students.classroom')</th>
                                    <th>@lang('students.grade')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $key => $section)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $section->section_name }}</td>
                                        <td>{{ $section->classroom->class_name }}</td>
                                        <td>{{ $section->grade->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
