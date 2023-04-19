<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        @if (app()->getLocale() == 'ar')
                            <a dir="ltr" class="nav-link text-dark dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                العربيه
                            </a>
                        @endif
                        @if (app()->getLocale() == 'en')
                            <a dir="ltr" class="nav-link text-dark dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                English
                            </a>
                        @endif
                        <div class="dropdown-menu text-center dropdown-menu-left dropdown-menu-arrow"
                            x-placement="bottom-end">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item text-dark" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href="">
                        @if (Auth::guard('student')->check())
                            <img alt="" src="{{ asset('assets/images/student.png') }}">
                        @elseif (Auth::guard('teacher')->check())
                            <img alt="" src="{{ asset('assets/images/teacher.png') }}">
                        @elseif (Auth::guard('guardian')->check())
                            <img alt="" src="{{ asset('assets/images/guardian.png') }}">
                        @else
                            <img alt="" src="{{ asset('assets/images/admin.png') }}">
                        @endif
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    {{-- <img alt="" src="{{ asset('assets/images/teacher.png') }}" class=""> --}}
                                    @if (Auth::guard('student')->check())
                                        <img alt="" src="{{ asset('assets/images/student.png') }}">
                                    @elseif (Auth::guard('teacher')->check())
                                        <img alt="" src="{{ asset('assets/images/teacher.png') }}">
                                    @elseif (Auth::guard('guardian')->check())
                                        <img alt="" src="{{ asset('assets/images/guardian.png') }}">
                                    @else
                                        <img alt="" src="{{ asset('assets/images/admin.png') }}">
                                    @endif
                                </div>
                                <div class="mr-3 my-auto" style="width: 150px">
                                    <h6>{{ auth()->user()->name }}</h6><span
                                        class="text-truncate">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        @if (Auth::guard('student')->check())
                            <a class="dropdown-item" href="{{ url('student/dashboard/profile') }}"><i
                                    class="bx bx-user-circle"></i>@lang('tables.profile')</a>
                            <a class="dropdown-item" href="{{ route('logout', 'student') }}"><i
                                    class="bx bx-log-out"></i>@lang('words.signout')</a>
                        @elseif (Auth::guard('teacher')->check())
                            <a class="dropdown-item" href="{{ url('teacher/dashboard/profile') }}"><i
                                    class="bx bx-user-circle"></i>@lang('tables.profile')</a>
                            <a class="dropdown-item" href="{{ route('logout', 'teacher') }}"><i
                                    class="bx bx-log-out"></i>@lang('words.signout')</a>
                        @elseif (Auth::guard('guardian')->check())
                            <a class="dropdown-item" href="{{ url('guardian/dashboard/profile') }}"><i
                                    class="bx bx-user-circle"></i>@lang('tables.profile')</a>
                            <a class="dropdown-item" href="{{ route('logout', 'guardian') }}"><i
                                    class="bx bx-log-out"></i>@lang('words.signout')</a>
                        @else
                            <a class="dropdown-item" href="{{ url('admin/dashboard/profile') }}"><i
                                    class="bx bx-user-circle"></i>@lang('tables.profile')</a>
                            <a class="dropdown-item" href="{{ route('logout', 'web') }}"><i
                                    class="bx bx-log-out"></i>@lang('words.signout')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
