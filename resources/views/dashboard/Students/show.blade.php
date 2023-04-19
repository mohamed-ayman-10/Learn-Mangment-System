@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('students.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('students.more') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="panel w-100 panel-primary tabs-style-2">
            <div class=" tab-menu-heading">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs main-nav-line">
                        <li><a href="#tab4" class="nav-link active" data-toggle="tab">@lang('students.info')</a></li>
                        <li><a href="#tab5" class="nav-link" data-toggle="tab">@lang('students.attach')</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body main-content-body-right border">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab4">
                        <table class="table table-bordered border-primary text-center">
                            <thead>
                                <tr>
                                    <th>@lang('students.students_name')</th>
                                    <th>@lang('students.email')</th>
                                    <th>@lang('students.gender')</th>
                                    <th>@lang('students.nationalities')</th>
                                    <th>@lang('students.grade')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender->name }}</td>
                                    <td>{{ $student->nationatitie->name }}</td>
                                    <td>{{ $student->grade->name }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <table class="table table-bordered border-primary text-center">
                            <thead>
                                <tr>
                                    <th>@lang('students.classroom')</th>
                                    <th>@lang('students.section')</th>
                                    <th>@lang('students.guardian')</th>
                                    <th>@lang('students.date')</th>
                                    <th>@lang('students.year')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $student->classroom->class_name }}</td>
                                    <td>{{ $student->section->section_name }}</td>
                                    <td>{{ $student->guardian->name }}</td>
                                    <td>{{ $student->birth_day }}</td>
                                    <td>{{ $student->academic_year }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <form action="{{ route('student.upload') }}" method="post" class="mb-3"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="student_name" value="{{ $student->name }}">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="file" multiple accept="image/*" name="images[]" class="form-control w-25 mb-3">
                            <input type="submit" value="{{ __('students.create') }}" class="btn btn-primary">
                        </form>
                        <table class="table table-bordered border-primary text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('students.filename')</th>
                                    <th>@lang('students.addeddate')</th>
                                    <th>@lang('tables.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->images as $image)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $image->file_name }}</td>
                                        <td>{{ $image->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('students/download/' . $student->name . '/' . $image->file_name) }}"
                                                class="btn btn-primary"><i class="far fa-arrow-alt-circle-down"></i></a>
                                            <a class="modal-effect btn btn-danger ml-2" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $image->id }}"><i
                                                    class="las la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal effects -->
                                    <div class="modal" id="delete{{ $image->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{ __('sections.delete') }}
                                                    </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('student.delete.file') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="file_id" value="{{ $image->id }}">
                                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                    <input type="hidden" name="student_name" value="{{ $student->name }}">
                                                    <input type="hidden" name="file_name" value="{{ $image->file_name }}">
                                                    <div class="modal-body">
                                                        <p>{{ __('tables.delete_q') . '' . $image->file_name . '؟' }}
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
                            <tfoot>
                            </tfoot>
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
@endsection
