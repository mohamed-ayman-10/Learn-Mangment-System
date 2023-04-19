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
                <h4 class="content-title mb-0 my-auto">@lang('fees.fees')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('fees.invoices')</span>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('students.students_name')</th>
                                    <th>@lang('fees.typefee')</th>
                                    <th>@lang('fees.salary')</th>
                                    <th>@lang('students.grade')</th>
                                    <th>@lang('students.classroom')</th>
                                    <th>@lang('tables.notes')</th>
                                    <th>@lang('tables.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeInvoices as $key => $fi)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $fi->student->name }}</td>
                                        <td>{{ $fi->fees->title }}</td>
                                        <td>{{ $fi->amount }}</td>
                                        <td>{{ $fi->grade->name }}</td>
                                        <td>{{ $fi->classroom->class_name }}</td>
                                        <td>{{ $fi->description }}</td>
                                        <td>
                                            <a href="{{ route('fee_invoices.edit', $fi->id) }}" class="btn btn-primary">
                                                <i class="typcn typcn-edit"></i>
                                            </a>
                                            <a href="#delete{{ $fi->id }}" data-effect="effect-scale"
                                                data-toggle="modal" class="modal-effect btn btn-danger">
                                                <i class="las la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal effects -->
                                    <div class="modal" id="delete{{ $fi->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{ __('sections.delete') }}
                                                    </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('fee_invoices.destroy', $fi->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <input type="hidden" name="student_id" value="{{ $fi->student->id }}">
                                                    <input type="hidden" name="fee_invoices_id"
                                                        value="{{ $fi->id }}">
                                                    <input type="hidden" name="amount" value="{{ $fi->amount }}">
                                                    <div class="modal-body">
                                                        <p>{{ __('tables.delete_q') . ' ' . $fi->student->name . '؟' }}
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
