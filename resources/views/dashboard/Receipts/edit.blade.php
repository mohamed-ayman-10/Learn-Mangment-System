@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('receipts.receipts')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('receipts.edit_receipt')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <form action="{{ route('receipts.update', $receipt->id) }}" method="post" class="w-100">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" for="name">@lang('students.students_name')</label>
                <input type="text" value="{{ $receipt->student->name }}" class="form-control" id="name" readonly
                    required placeholder="@lang('students.students_name')">
            </div>
            <div class="form-group">
                <label class="form-label" for="amount">@lang('fees.salary')</label>
                <input type="number" value="{{ $receipt->debit }}" class="form-control" id="amount" name="amount"
                    required placeholder="@lang('fees.salary')">
            </div>
            <div class="form-group">
                <label class="form-label" for="desc">@lang('tables.notes')</label>
                <textarea name="desc" id="desc" class="form-control">{{ $receipt->description }}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="@lang('tables.update')">
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
