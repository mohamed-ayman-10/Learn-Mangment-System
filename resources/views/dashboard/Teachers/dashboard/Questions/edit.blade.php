@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('exam.exams')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('exam.question_update')</span>
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
        <form action="{{ route('questions.update', $question->id) }}" method="post" class="w-100">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-label">@lang('exam.question_name')</label>
                <input type="text" class="form-control" name="name" value="{{ $question->title }}" required
                    placeholder="@lang('exam.question_name')">
            </div>
            <div class="form-group">
                <label class="form-label">@lang('exam.answers')</label>
                <textarea class="form-control" name="answer">{{ $question->answers }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label">@lang('exam.correct_answer')</label>
                    <input type="text" class="form-control" name="correct" value="{{ $question->right_answer }}" required
                        placeholder="@lang('exam.correct_answer')">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">@lang('exam.score')</label>
                    <select name="score" class="form-control">
                        <option selected disabled>
                            @lang('exam.score')
                            @endlang
                        </option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option {{ $question->score == $i ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <input type="hidden" name="exam_id" value="{{ $question->exam_id }}">
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
