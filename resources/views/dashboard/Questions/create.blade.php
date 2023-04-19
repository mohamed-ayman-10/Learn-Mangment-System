@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('subject.subjects')</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('subject.create')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('questions.store') }}" method="post" class="w-100">
            @csrf
            <div class="form-group">
                <label class="form-label">@lang('exam.question_name')</label>
                <input type="text" class="form-control" name="name" required placeholder="@lang('exam.question_name')">
            </div>
            <div class="form-group">
                <label class="form-label">@lang('exam.answers')</label>
                <textarea class="form-control" name="answer"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">@lang('exam.correct_answer')</label>
                <input type="text" class="form-control" name="correct" required
                       placeholder="@lang('exam.correct_answer')">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label">@lang('exam.name')</label>
                    <select name="exam" class="form-control">
                        <option selected disabled>@lang('exam.name') @endlang</option>
                        @foreach($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">@lang('exam.score')</label>
                    <select name="score" class="form-control">
                        <option selected disabled>@lang('exam.score') @endlang</option>
                        @for($i=1; $i<=10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
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
