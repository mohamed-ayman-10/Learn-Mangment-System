<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="#"><img src="{{ URL::asset('assets/images/logoo.png') }}"
                class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active"
            href="#><img
                src="{{ URL::asset('assets/images/Alexandria_University_logo.png') }}"
            class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="#"><img
                src="{{ URL::asset('assets/images/Alexandria_University_logo.png') }}" class="logo-icon"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="#"><img
                src="{{ URL::asset('assets/images/Alexandria_University_logo.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu pt-4">
        {{-- <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
                    <span class="mb-0 text-muted">Premium Member</span>
                </div>
            </div>
        </div> --}}


        @if (Auth('web')->check())
            @include('layouts.main-sidebar.admin')
        @endif

        @if (Auth('student')->check())
            @include('layouts.main-sidebar.student')
        @endif

        @if (Auth('teacher')->check())
            @include('layouts.main-sidebar.teacher')
        @endif

        @if (Auth('guardian')->check())
            @include('layouts.main-sidebar.guardian')
        @endif

    </div>
</aside>
<!-- main-sidebar -->
