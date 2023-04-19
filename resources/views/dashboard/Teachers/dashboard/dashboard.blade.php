@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    @livewireStyles
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">@lang('words.welcome') {{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">@lang('students.students')</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{ $students_id }}</h4>
                                <a href="{{ route('teacher.dashboard.students') }}"
                                    class="mb-0 tx-12 text-white op-7">@lang('words.data')</a>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                {{-- <i class="fas fa-arrow-circle-up text-white"></i> --}}
                                {{-- <span class="text-white op-7"> +427</span> --}}
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">@lang('sections.sections')</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{ $sections_id }}</h4>
                                <a href="{{ route('grades.index') }}"
                                    class="mb-0 tx-12 text-white op-7">@lang('words.data')</a>
                            </div>
                            {{-- <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7"> -152.3</span>
                            </span> --}}
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <div class="row">
        {{-- @dd(App\Models\Student::all()) --}}
        <div class="col-xl-12">
            <!-- div -->
            <div class="card" id="tabs-style4">
                <div class="card-body">
                    <div class="main-content-label mb-4 mg-b-5">

                    </div>
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1 d-flex align-items-center justify-content-between">
                                        <h2 class="fw-bold">@lang('words.last')</h2>
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active"
                                                    data-toggle="tab">@lang('students.students')</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">@lang('teachers.teachers')</a>
                                            </li>
                                            <li><a href="#tab3" class="nav-link" data-toggle="tab">@lang('guardians.guardians')</a>
                                            </li>
                                            <li><a href="#tab4" class="nav-link" data-toggle="tab">@lang('words.grades')</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <table class="table table-light table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('students.students_name')</th>
                                                        <th>@lang('students.email')</th>
                                                        <th>@lang('students.gender')</th>
                                                        <th>@lang('students.grade')</th>
                                                        <th>@lang('students.classroom')</th>
                                                        <th>@lang('students.section')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Student::orderBy('created_at', 'desc')->limit(5)->get() as $key => $student)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->gender->name }}</td>
                                                            <td>{{ $student->grade->name }}</td>
                                                            <td>{{ $student->classroom->class_name }}</td>
                                                            <td>{{ $student->section->section_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <table class="table table-light table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('teachers.teachers_name')</th>
                                                        <th>@lang('teachers.email')</th>
                                                        <th>@lang('teachers.gender')</th>
                                                        <th>@lang('teachers.date')</th>
                                                        <th>@lang('teachers.pre')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Teacher::orderBy('created_at', 'desc')->limit(5)->get() as $key => $teacher)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $teacher->name }}</td>
                                                            <td>{{ $teacher->email }}</td>
                                                            <td>{{ $teacher->gender->name }}</td>
                                                            <td>{{ $teacher->joining_date }}</td>
                                                            <td>{{ $teacher->specialization->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <table class="table table-light table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('guardians.guardians_name')</th>
                                                        <th>@lang('guardians.email')</th>
                                                        <th>@lang('guardians.phone')</th>
                                                        <th>@lang('guardians.job')</th>
                                                        <th>@lang('guardians.nationalitie')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Guardian::orderBy('created_at', 'desc')->limit(5)->get() as $key => $guardian)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $guardian->name }}</td>
                                                            <td>{{ $guardian->email }}</td>
                                                            <td>{{ $guardian->phone }}</td>
                                                            <td>{{ $guardian->job }}</td>
                                                            <td>{{ $guardian->nationalitie->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <table class="table table-light table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('tables.name')</th>
                                                        <th>@lang('tables.notes')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Grade::orderBy('created_at', 'desc')->limit(5)->get() as $key => $grade)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $grade->name }}</td>
                                                            <td>{{ $grade->description }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <livewire:calendar />

    <!-- row opened -->
    {{-- <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">Order status</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">Order Status and Tracking. Track your order from ship date to arrival.
                        To begin, enter your order number.</p>
                </div>
                <div class="card-body">
                    <div class="total-revenue">
                        <div>
                            <h4>120,750</h4>
                            <label><span class="bg-primary"></span>success</label>
                        </div>
                        <div>
                            <h4>56,108</h4>
                            <label><span class="bg-danger"></span>Pending</label>
                        </div>
                        <div>
                            <h4>32,895</h4>
                            <label><span class="bg-warning"></span>Failed</label>
                        </div>
                    </div>
                    <div id="bar" class="sales-bar mt-4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">Sales Revenue by Customers in USA</label>
                <span class="d-block mg-b-20 text-muted tx-12">Sales Performance of all states in the United States</span>
                <div class="">
                    <div class="vmap-wrapper ht-180" id="vmap2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Recent Customers</h3>
                    <p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods
                        service has evolved to include real-time</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ URL::asset('assets/img/faces/3.jpg') }}" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-0">
                                            <h5 class="mb-1 tx-15">Samantha Melon</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark1" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ URL::asset('assets/img/faces/11.jpg') }}" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Jimmy Changa</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span
                                                    class="text-danger ml-2">Pending</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark2" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ URL::asset('assets/img/faces/17.jpg') }}" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Gabe Lackmen</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span
                                                    class="text-danger ml-2">Pending</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark3" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ URL::asset('assets/img/faces/15.jpg') }}" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Manuel Labor</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark4" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ URL::asset('assets/img/faces/6.jpg') }}" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Sharon Needles</h5>
                                            <p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark5" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Sales Activity</h3>
                    <p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their
                        goals and objective</p>
                </div>
                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Total Products</span> <a href="#"
                                class="float-left tx-11 text-muted">3 days ago</a>
                            <p class="mb-0 text-muted tx-12">1.3k New Products</p>
                        </li>
                        <li class="mt-0"> <i
                                class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Total Sales</span> <a href="#"
                                class="float-left tx-11 text-muted">35 mins ago</a>
                            <p class="mb-0 text-muted tx-12">1k New Sales</p>
                        </li>
                        <li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="#"
                                class="float-left tx-11 text-muted">50 mins ago</a>
                            <p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
                        </li>
                        <li class="mt-0"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="#"
                                class="float-left tx-11 text-muted">1 hour ago</a>
                            <p class="mb-0 text-muted tx-12">3k New profit</p>
                        </li>
                        <li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span
                                class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#"
                                class="float-left tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">15% increased</p>
                        </li>
                        <li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i>
                            <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#"
                                class="float-left tx-11 text-muted">1 day ago</a>
                            <p class="mb-0 text-muted tx-12">1.5k reviews</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h3 class="card-title mb-2">Recent Orders</h3>
                    <p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm
                        to purchase or sell</p>
                </div>
                <div class="card-body sales-info ot-0 pt-0 pb-0">
                    <div id="chart" class="ht-150"></div>
                    <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
                            <h3 class="mb-1">5238</h3>
                            <div class="d-flex">
                                <p class="text-muted ">Last 6 months</p>
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
                            <h3 class="mb-1">3467</h3>
                            <div class="d-flex">
                                <p class="text-muted">Last 6 months</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">Total Sales</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">$7,590</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar"
                                    aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="d-flex align-items-center pb-2">
                                <p class="mb-0">Active Users</p>
                            </div>
                            <h4 class="font-weight-bold mb-2">$5,460</h4>
                            <div class="progress progress-style progress-sm">
                                <div class="progress-bar bg-danger-gradient wd-75" role="progressbar" aria-valuenow="45"
                                    aria-valuemin="0" aria-valuemax="45"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales
                    performance revenue based by country</span>
                <div class="list-group">
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>United States</p><span>$1,671.10</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                        <p>Netherlands</p><span>$1,064.75</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                        <p>United Kingdom</p><span>$1,055.98</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                        <p>Canada</p><span>$1,045.49</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                        <p>India</p><span>$1,930.12</span>
                    </div>
                    <div class="list-group-item border-bottom-0 mb-0">
                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                        <p>Australia</p><span>$1,042.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Date</th>
                                <th class="wd-lg-25p tx-right">Sales Count</th>
                                <th class="wd-lg-25p tx-right">Earnings</th>
                                <th class="wd-lg-25p tx-right">Tax Witheld</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">34</td>
                                <td class="tx-right tx-medium tx-inverse">$658.20</td>
                                <td class="tx-right tx-medium tx-danger">-$45.10</td>
                            </tr>
                            <tr>
                                <td>06 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">26</td>
                                <td class="tx-right tx-medium tx-inverse">$453.25</td>
                                <td class="tx-right tx-medium tx-danger">-$15.02</td>
                            </tr>
                            <tr>
                                <td>07 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">34</td>
                                <td class="tx-right tx-medium tx-inverse">$653.12</td>
                                <td class="tx-right tx-medium tx-danger">-$13.45</td>
                            </tr>
                            <tr>
                                <td>08 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">45</td>
                                <td class="tx-right tx-medium tx-inverse">$546.47</td>
                                <td class="tx-right tx-medium tx-danger">-$24.22</td>
                            </tr>
                            <tr>
                                <td>09 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">31</td>
                                <td class="tx-right tx-medium tx-inverse">$425.72</td>
                                <td class="tx-right tx-medium tx-danger">-$25.01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    @livewireScripts
    @stack('scripts')
@endsection
