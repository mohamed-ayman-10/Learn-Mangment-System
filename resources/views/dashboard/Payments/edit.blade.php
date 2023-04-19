@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('receipts.receipts')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('receipts.edit_excluded')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('payments.update', $payment->id) }}" method="post" class="w-100">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label" for="name">@lang('students.students_name')</label>
                <input type="text" value="{{ $payment->student->name }}" class="form-control" id="name" readonly
                    required placeholder="@lang('students.students_name')">
            </div>
            <div class="form-group">
                <label class="form-label" for="amount">@lang('fees.salary')</label>
                <input type="number" value="{{ $payment->amount }}" class="form-control" id="amount" name="amount"
                    required placeholder="@lang('fees.salary')">
            </div>
            <div class="form-group">
                <label class="form-label" for="desc">@lang('tables.notes')</label>
                <textarea name="desc" id="desc" class="form-control">{{ $payment->description }}</textarea>
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
