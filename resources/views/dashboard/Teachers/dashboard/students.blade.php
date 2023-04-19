@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Interenal Accordion Css -->
    <link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('students.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('students.students_list') }}</span>
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
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{ __('students.students_name') }}</th>
                                    <th class="border-bottom-0">{{ __('students.email') }}</th>
                                    <th class="border-bottom-0">{{ __('students.gender') }}</th>
                                    <th class="border-bottom-0">{{ __('students.grade') }}</th>
                                    <th class="border-bottom-0">{{ __('students.classroom') }}</th>
                                    <th class="border-bottom-0">{{ __('students.section') }}</th>
                                    <th class="border-bottom-0">{{ __('tables.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->name }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->classroom->class_name }}</td>
                                        <td>{{ $student->section->section_name }}</td>
                                        <td>
                                            <div>
                                                <div class="">
                                                    <a href="" class="p-2 text-muted" data-toggle="dropdown"><i
                                                            class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu tx-13 dropleft"
                                                        style="{{ app()->getLocale() == 'en' ? 'direction: ltr' : 'rtl' }}">
                                                        <a href="students/{{ $student->id }}/edit"
                                                            class="btn d-flex justify-content-start align-items-center">
                                                            <i class="las la-pen text-primary mx-2"></i> @lang('tables.update')
                                                        </a>
                                                        <a class="modal-effect btn d-flex justify-content-start align-items-center"
                                                            data-effect="effect-scale" data-toggle="modal"
                                                            href="#delete{{ $student->id }}"><i
                                                                class="las la-trash mx-2 text-danger"></i>
                                                            @lang('tables.delete')
                                                        </a>
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            class="btn d-flex justify-content-start align-items-center"><i
                                                                class="far fa-eye mx-2 text-warning"></i>
                                                            @lang('students.more')</a>
                                                        <a href="{{ route('fee_invoices.show', $student->id) }}"
                                                            class="btn d-flex justify-content-start align-items-center"><i
                                                                class="typcn typcn-edit text-success mx-2"></i>
                                                            @lang('fees.add_invoices')</a>
                                                        <a href="{{ route('receipts.show', $student->id) }}"
                                                            class="btn d-flex justify-content-start align-items-center"><i
                                                                class="typcn typcn-document-add text-primary mx-2"></i>
                                                            @lang('receipts.add_receipt')</a>
                                                        <a href="{{ route('processings.show', $student->id) }}"
                                                            class="btn d-flex justify-content-start align-items-center"><i
                                                                class="typcn typcn-document-add text-danger mx-2"></i>
                                                            @lang('receipts.excluded')</a>
                                                        <a href="{{ route('payments.show', $student->id) }}"
                                                            class="btn d-flex justify-content-start align-items-center"><i
                                                                class="typcn typcn-document-add text-warning mx-2"></i>
                                                            @lang('payments.payment_voucher')</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <!-- Delete Modal effects -->
                                    <div class="modal" id="delete{{ $student->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{ __('sections.delete') }}
                                                    </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="students/{{ $student->id }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>{{ __('tables.delete_q') . ' ' . $student->name . '؟' }}
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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/accordion.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
