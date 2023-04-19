@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('fees.fees')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('fees.anfs') {{ $student->name }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <form action="{{ route('fee_invoices.store') }}" method="post">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="form-group col-3">
                <label class="form-label">@lang('students.students_name')</label>
                <input type="text" required readonly name="name" class="form-control" value="{{ $student->name }}">
            </div>
            <div class="form-group col-3">
                <label class="form-label"> {{ __('fees.typefee') }} </label>
                <select name="type" required class="form-control">
                    <option selected disabled label="@lang('fees.typefee')"></option>
                    @foreach ($fees as $fee)
                        <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-3">
                <label class="form-label">@lang('fees.salary')</label>
                <input type="number" required readonly name="amount" class="form-control">
            </div>
            <div class="form-group col-3">
                <label class="form-label">@lang('tables.notes')</label>
                <input type="text" name="desc" class="form-control">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="@lang('tables.save')">
    </form>


    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="type"]').on('change', function() {
                var type = $(this).val();
                var classroom_id = "{{ $student->classroom_id }}"
                if (type) {
                    $.ajax({
                        url: "{{ url('fee_invoices/get_amount') }}/" + type + "/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('input[name="amount"]').empty();

                            $('input[name="amount"]').val(data)

                        }
                    })
                }
            });
        });
    </script>
@endsection
