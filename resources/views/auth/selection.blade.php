<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--- Style css -->
    <link href="{{ URL::asset('assets/css-rtl/style.css') }}" rel="stylesheet">

    <style>
        section {
            background: url({{ asset('assets/images/sativa.png') }})
        }

        section div a {
            width: 130px;
            height: 130px;
        }
    </style>

</head>

<body>
    <section class="w-100 vh-100 d-flex align-items-center justify-content-center">
        <div style="background-color: #fff" class="p-5 rounded w-md-50">
            <h2 class="mb-4">@lang('words.select')</h2>
            <div class="d-flex align-items-center justify-content-center flex-wrap">
                <a class="mx-3 mb-md-0 mb-3" href="{{ route('login.show', 'student') }}">
                    <img src="{{ asset('assets/images/student.png') }}" alt="">
                </a>
                <a class="mx-3 mb-md-0 mb-3" href="{{ route('login.show', 'teacher') }}">
                    <img src="{{ asset('assets/images/teacher.png') }}" alt="">
                </a>
                <a class="mx-3 mb-md-0 mb-3" href="{{ route('login.show', 'guardian') }}">
                    <img src="{{ asset('assets/images/guardian.png') }}" alt="">
                </a>
                <a class="mx-3 mb-md-0 mb-3" href="{{ route('login.show', 'admin') }}">
                    <img src="{{ asset('assets/images/admin.png') }}" alt="">
                </a>
            </div>
        </div>
    </section>

</body>

</html>
