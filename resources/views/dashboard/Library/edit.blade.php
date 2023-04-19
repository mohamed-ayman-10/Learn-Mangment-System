@extends('layouts.master')
@section('css')
    <style>
        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 450px;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            transition: 0.2s;
            background-color: whitesmoke;

            &.is-active {
                background-color: rgba(255, 255, 255, 0.05);
            }
        }

        .fake-btn {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 52.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
            margin-left: 20px;
        }

        .file-msg {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;

            &:focus {
                outline: none;
            }
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('library.library')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('library.update')</span>
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
        <form action="{{ route('libraries.update', $library->id) }}" method="post" class="w-100"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('library.book_name') }}
                    </label>
                    <input type="text" name="title" value="{{ $library->title }}" class="form-control"
                        placeholder="{{ __('library.book_name') }}">
                </div>
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.grade') }}
                    </label>
                    <div class="">
                        <select name="grade" class="form-control">
                            <option selected disabled>{{ __('students.grade') }}</option>
                            @foreach ($grades as $grade)
                                <option {{ $library->grade_id == $grade->id ? 'selected' : '' }}
                                    value="{{ $grade->id }}">
                                    {{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.classroom') }}
                    </label>
                    <div class="">
                        <select name="classroom" class="form-control">
                            <option selected value="{{ $library->classroom_id }}">{{ $library->classroom->class_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="main-content-label tx-11 tx-medium tx-gray-600">
                        {{ __('students.section') }}
                    </label>
                    <div class="">
                        <select name="section" class="form-control">
                            <option selected value="{{ $library->section_id }}">{{ $library->section->section_name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="file-drop-area">
                <span class="fake-btn">Choose files</span>
                <span class="file-msg">or drag and drop files here</span>
                <input class="file-input" name="file" type="file" accept="application/pdf">
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
    <script>
        var $fileInput = $('.file-input');
        var $droparea = $('.file-drop-area');

        // highlight drag area
        $fileInput.on('dragenter focus click', function() {
            $droparea.addClass('is-active');
        });

        // back to normal state
        $fileInput.on('dragleave blur drop', function() {
            $droparea.removeClass('is-active');
        });

        // change inner text
        $fileInput.on('change', function() {
            var filesCount = $(this)[0].files.length;
            var $textContainer = $(this).prev();

            if (filesCount === 1) {
                // if single file is selected, show file name
                var fileName = $(this).val().split('\\').pop();
                $textContainer.text(fileName);
            } else {
                // otherwise show number of files
                $textContainer.text(filesCount + ' files selected');
            }
        });
    </script>
@endsection
