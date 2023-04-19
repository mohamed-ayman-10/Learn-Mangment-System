@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('library.library')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('library.list_books')</span>
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
                <div class="card-header pb-0">
                    <a href="{{ route('libraries.create') }}" class="btn btn-primary">@lang('library.create')</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">@lang('library.book_name')</th>
                                    <th class="">@lang('teachers.teachers_name')</th>
                                    <th class="">@lang('students.grade')</th>
                                    <th class="">@lang('students.classroom')</th>
                                    <th class="">@lang('students.section')</th>
                                    <th class="">@lang('tables.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libraries as $key => $library)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $library->title }}</td>
                                        <td>{{ $library->teacher->name }}</td>
                                        <td>{{ $library->grade->name }}</td>
                                        <td>{{ $library->classroom->class_name }}</td>
                                        <td>{{ $library->section->section_name }}</td>
                                        <td>
                                            <a href="{{ route('libraries.edit', $library->id) }}" class="btn btn-primary">
                                                <i class="typcn typcn-edit"></i>
                                            </a>
                                            <a href="#delete{{ $library->id }}" data-effect="effect-scale"
                                                data-toggle="modal" class="modal-effect btn btn-danger">
                                                <i class="las la-trash"></i>
                                            </a>
                                            <a href="{{ route('libraries.show', $library->id) }}" class="btn btn-warning">
                                                <i class="far fa-arrow-alt-circle-down"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal effects -->
                                    <div class="modal" id="delete{{ $library->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{ __('library.delete') }}
                                                    </h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('libraries.destroy', $library->id) }}"
                                                    method="POST">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>{{ __('tables.delete_q') . ' ' . $library->title . '؟' }}
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn ripple btn-danger"
                                                            type="submit">{{ __('tables.delete') }}</button>
                                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                            type="button">{{ __('tables.close') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
