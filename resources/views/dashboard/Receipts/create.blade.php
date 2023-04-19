@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('receipts.receipts')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('receipts.add_receipt')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <form action="{{ route('receipts.store') }}" method="post" class="w-100">
            @csrf
            <div class="form-group">
                <label class="form-label" for="amount">@lang('fees.salary')</label>
                <input type="number" class="form-control" id="amount" name="amount" required
                    placeholder="@lang('fees.salary')">
            </div>
            <div class="form-group">
                <label class="form-label" for="desc">@lang('tables.notes')</label>
                <textarea name="desc" id="desc" class="form-control"></textarea>
            </div>
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
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
