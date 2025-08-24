@extends('template.masterTemplate')

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="Lucif" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Customers View || Meijibio S</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/select2-theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/datepicker.min.css')}}">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme.min.css')}}">
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
            <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
@endsection

@section('template.sidebarTemplate')
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('dashboard.crm') }}" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="{{asset('assets/images/logo-full.png')}}" alt="" class="logo logo-lg" />
                    <img src="{{asset('assets/images/logo-abbr.png')}}" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('dashboard.crm') }}">CRM</a></li>
                            {{-- <li class="nxl-item"><a class="nxl-link" href="analytics.html">Analytics</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-cast"></i></span>
                            <span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="reports-sales.html">Sales Report</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="reports-leads.html">Leads Report</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="reports-project.html">Project Report</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="reports-timesheets.html">Timesheets Report</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-send"></i></span>
                            <span class="nxl-mtext">Applications</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="apps-chat.html">Chat</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-email.html">Email</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-tasks.html">Tasks</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-notes.html">Notes</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-storage.html">Storage</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="apps-calendar.html">Calendar</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-at-sign"></i></span>
                            <span class="nxl-mtext">Proposal</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="proposal.html">Proposal</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-view.html">Proposal View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-edit.html">Proposal Edit</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="proposal-create.html">Proposal Create</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">Payment</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="payment.html">Payment</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="invoice-view.html">Invoice View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="invoice-create.html">Invoice Create</a></li>
                        </ul>
                    </li> --}}
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Customers</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('customer.index') }}">Customers</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('customer.view') }}">Customers View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('customer.create') }}">Customers Create</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu" {{ auth()->check() && auth()->user()->hasRole('admin') ? '' : 'hidden' }}>
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Đồng bộ dữ liệu từ getfly</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <form action="{{ route('customer.sync') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="nxl-link" style="all: unset; cursor: pointer;">
                                        Đồng bộ khách hàng
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                            <span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.index') }}">Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.view') }}">Leads View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.create') }}">Leads Create</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-briefcase"></i></span>
                            <span class="nxl-mtext">Projects</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="projects.html">Projects</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="projects-view.html">Projects View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="projects-create.html">Projects Create</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-layout"></i></span>
                            <span class="nxl-mtext">Widgets</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="widgets-lists.html">Lists</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-tables.html">Tables</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-charts.html">Charts</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-statistics.html">Statistics</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="widgets-miscellaneous.html">Miscellaneous</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="settings-general.html">General</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-seo.html">SEO</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-tags.html">Tags</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-email.html">Email</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-tasks.html">Tasks</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-leads.html">Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-support.html">Support</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-finance.html">Finance</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-gateways.html">Gateways</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-customers.html">Customers</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-localization.html">Localization</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-recaptcha.html">reCAPTCHA</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="settings-miscellaneous.html">Miscellaneous</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">Authentication</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Login</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-login-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-login-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-login-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Register</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-register-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-register-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-register-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Error-404</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-404-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-404-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-404-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Reset Pass</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-reset-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-reset-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-reset-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Verify OTP</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-verify-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-verify-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-verify-creative.html">Creative</a></li>
                                </ul>
                            </li>
                            <li class="nxl-item nxl-hasmenu">
                                <a href="javascript:void(0);" class="nxl-link">
                                    <span class="nxl-mtext">Maintenance</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                                </a>
                                <ul class="nxl-submenu">
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-cover.html">Cover</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-minimal.html">Minimal</a></li>
                                    <li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-creative.html">Creative</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-life-buoy"></i></span>
                            <span class="nxl-mtext">Help Center</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="https://wrapcoders.tawk.help">Support</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="help-knowledgebase.html">KnowledgeBase</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="./../../../docs/documentations.html">Documentations</a></li>
                        </ul>
                    </li> --}}
                </ul>
                <div class="card text-center" {{ auth()->check() && auth()->user()->hasRole('admin') ? '' : 'hidden' }}>
                    <div class="card-body">
                        <i class="feather-sunrise fs-4 text-dark"></i>
                        <h6 class="mt-4 text-dark fw-bolder">Downloading Center</h6>
                        <p class="fs-11 my-3 text-dark">Meijibio S is a production ready CRM to get started up and running easily.</p>
                        <a href="javascript:void(0);" class="btn btn-primary text-dark w-100">Download Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <form action="{{ route('customer.update', $customer->id) }}" method="post" id="customer-form">
                @csrf
                @method('PUT')
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Customers</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            {{-- <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                                <i class="feather-layers me-2"></i>
                                <span>Save as Draft</span>
                            </a> --}}
                            <a onclick="document.getElementById('customer-form').submit();" class="btn btn-primary successAlertMessage">
                                <i class="feather-user-plus me-2"></i>
                                <span>Save Customer</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">Thông tin chung</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#passwordTab" role="tab">Password</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingTab" role="tab">Billing & Shipping</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#subscriptionTab" role="tab">Subscription</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab">Notifications</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#connectionTab" role="tab">Connection</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Personal Information:</span>
                                                {{-- <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following information is publicly displayed, be careful! </span> --}}
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add New</a>
                                        </div>
                                        {{-- <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Avatar: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                    <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                        <img src="{{asset('assets/images/avatar/1.png')}}" class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                        <div class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                                        </div>
                                                        <input class="file-upload" type="file" accept="image/*">
                                                    </div>
                                                    <div class="d-flex flex-column gap-1">
                                                        <div class="fs-11 text-gray-500 mt-2"># Upload your prifile</div>
                                                        <div class="fs-11 text-gray-500"># Avatar size 150x150</div>
                                                        <div class="fs-11 text-gray-500"># Max upload size 2mb</div>
                                                        <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- WORKING HERE --}}
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Trạng thái: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="account_relation_detail" data-select2-selector="account_relation_detail" @if(!in_array('account_relation_detail', $editableFields)) disabled @endif>
                                                    <option value="6" {{ $customer->relation_id == '6' ? 'selected' : '' }}>Chưa phân loại</option>
                                                    <option value="1" {{ $customer->relation_id == '1' ? 'selected' : '' }}>Gọi được</option>
                                                    <option value="3" {{ $customer->relation_id == '3' ? 'selected' : '' }}>Số không tồn tại</option>
                                                    <option value="5" {{ $customer->relation_id == '5' ? 'selected' : '' }}>Không liên lạc được (Trên 3 ngày)</option>
                                                    <option value="4" {{ $customer->relation_id == '4' ? 'selected' : '' }}>Không liên lạc được (Dưới 3 ngày)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Danh mục data đầu vào (#152): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="data-in" id="danh_muc_data_dau_vao" name="danh_muc_data_dau_vao" @if(!in_array('danh_muc_data_dau_vao', $editableFields)) disabled @endif>
                                                    <option data-in="bg-primary" value="128" {{ $customer->danh_muc_data_dau_vao == '128' ? 'selected' : '' }}>Mua (BI)</option>
                                                    <option data-in="bg-secondary" value="129" {{ $customer->danh_muc_data_dau_vao == '129' ? 'selected' : '' }}>Quảng cáo (AD)</option>
                                                    <option data-in="bg-success" value="130" {{ $customer->danh_muc_data_dau_vao == '130' ? 'selected' : '' }}>Online (OR)</option>
                                                    <option data-in="bg-warning" value="131" {{ $customer->danh_muc_data_dau_vao == '131' ? 'selected' : '' }}>Offline (OF)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Nguồn (#151): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="source" id="nguon" name="nguon" @if(!in_array('nguon', $editableFields)) disabled @endif>
                                                    <option value="108" {{ $customer->nguon == '108' ? 'selected' : '' }}>FB</option>
                                                    <option value="109" {{ $customer->nguon == '109' ? 'selected' : '' }}>Youtube</option>
                                                    <option value="110" {{ $customer->nguon == '110' ? 'selected' : '' }}>Zalo</option>
                                                    <option value="111" {{ $customer->nguon == '111' ? 'selected' : '' }}>Tiktok</option>
                                                    <option value="112" {{ $customer->nguon == '112' ? 'selected' : '' }}>Web</option>
                                                    <option value="113" {{ $customer->nguon == '113' ? 'selected' : '' }}>Cali</option>
                                                    <option value="114" {{ $customer->nguon == '114' ? 'selected' : '' }}>Elite</option>
                                                    <option value="115" {{ $customer->nguon == '115' ? 'selected' : '' }}>SR</option>
                                                    <option value="116" {{ $customer->nguon == '116' ? 'selected' : '' }}>Collab</option>
                                                    <option value="117" {{ $customer->nguon == '117' ? 'selected' : '' }}>Internal</option>
                                                    <option value="118" {{ $customer->nguon == '118' ? 'selected' : '' }}>Mar</option>
                                                    <option value="119" {{ $customer->nguon == '119' ? 'selected' : '' }}>PNS</option>
                                                    <option value="120" {{ $customer->nguon == '120' ? 'selected' : '' }}>SR</option>
                                                    <option value="121" {{ $customer->nguon == '121' ? 'selected' : '' }}>Collab</option>
                                                    <option value="122" {{ $customer->nguon == '122' ? 'selected' : '' }}>Internal</option>
                                                    <option value="123" {{ $customer->nguon == '123' ? 'selected' : '' }}>BOD</option>
                                                    <option value="124" {{ $customer->nguon == '124' ? 'selected' : '' }}>FOC</option>
                                                    <option value="125" {{ $customer->nguon == '125' ? 'selected' : '' }}>BOD</option>
                                                    <option value="126" {{ $customer->nguon == '126' ? 'selected' : '' }}>FOC</option>
                                                    <option value="127" {{ $customer->nguon == '127' ? 'selected' : '' }}>Walk-in</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Mảng kinh doanh (#153): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="business" id="mang_kinh_doanh" name="mang_kinh_doanh" @if(!in_array('mang_kinh_doanh', $editableFields)) disabled @endif>
                                                    <option value="132" {{ $customer->mang_kinh_doanh == '132' ? 'selected' : '' }}>MJB</option>
                                                    <option value="133" {{ $customer->mang_kinh_doanh == '133' ? 'selected' : '' }}>LMC</option>
                                                    <option value="134" {{ $customer->mang_kinh_doanh == '134' ? 'selected' : '' }}>LGP</option>
                                                    <option value="135" {{ $customer->mang_kinh_doanh == '135' ? 'selected' : '' }}>LGG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Nhóm nguồn (#154): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="group" id="nhom_nguon" name="nhom_nguon" @if(!in_array('nhom_nguon', $editableFields)) disabled @endif>
                                                    <option value="136" {{ $customer->nhom_nguon == '136' ? 'selected' : '' }}>MKT</option>
                                                    <option value="137" {{ $customer->nhom_nguon == '137' ? 'selected' : '' }}>PNS</option>
                                                    <option value="138" {{ $customer->nhom_nguon == '138' ? 'selected' : '' }}>SR</option>
                                                    <option value="139" {{ $customer->nhom_nguon == '139' ? 'selected' : '' }}>Collab</option>
                                                    <option value="140" {{ $customer->nhom_nguon == '140' ? 'selected' : '' }}>Internal</option>
                                                    <option value="141" {{ $customer->nhom_nguon == '141' ? 'selected' : '' }}>BR</option>
                                                    <option value="142" {{ $customer->nhom_nguon == '142' ? 'selected' : '' }}>BOD</option>
                                                    <option value="143" {{ $customer->nhom_nguon == '143' ? 'selected' : '' }}>FOC</option>
                                                    <option value="144" {{ $customer->nhom_nguon == '144' ? 'selected' : '' }}>Walk-in</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Camp: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Camp" name="camp" value="{{ $customer->camp ?? '' }}" @if(!in_array('camp', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="aboutInput" class="fw-semibold">Thông tin chung: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                                    <textarea class="form-control" id="aboutInput" cols="30" rows="5" placeholder="Thông tin chung" name="thong_tin_chung" @if(!in_array('thong_tin_chung', $editableFields)) disabled @endif>{{ $customer->thong_tin_chung ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Giới tính (#24): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="gender" name="gioi_tinh" @if(!in_array('gioi_tinh', $editableFields)) disabled @endif>
                                                    <option value="2" {{ $customer->gender == '2' ? 'selected' : '' }}>Nam</option>
                                                    <option value="1" {{ $customer->gender == '1' ? 'selected' : '' }}>Nữ</option>
                                                    <option value="3" {{ $customer->gender == '3' ? 'selected' : '' }}>Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Họ tên khách hàng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Name" name="account_name" value="{{ $customer->account_name ?? '' }}" @if(!in_array('account_name', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Mã khách hàng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Code" name="account_code" value="{{ $customer->account_code ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phoneInput" class="fw-semibold">Phone: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text" class="form-control" id="phoneInput" placeholder="Phone" name="phone_office" value="{{ $customer->phone_office ?? '' }}" @if(!in_array('phone_office', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Email: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Email" name="email" value="{{ $customer->email ?? '' }}" @if(!in_array('email', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Phân loại bổ sung: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mailInput" placeholder="phan_loai_bo_sung" name="phan_loai_bo_sung" value="{{ $customer->phan_loai_bo_sung ?? '' }}" @if(!in_array('phan_loai_bo_sung', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="dateofBirth" class="fw-semibold">Date of Birth: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input class="form-control" id="dateofBirth" placeholder="Birthday" name="birthday" value="{{ $customer->birthday ?? '' }}" @if(!in_array('birthday', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Tuổi: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Tuổi" name="tuoi" value="{{ $customer->tuoi ?? '' }}" @if(!in_array('tuoi', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Địa chỉ: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Địa chỉ" name="address" value="{{ $customer->billing_address_street ?? '' }}" @if(!in_array('address', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Quốc gia: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="currency" @if(!in_array('currency', $editableFields)) disabled @endif>
                                                    <option data-currency="vn" selected>Vietnam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Tỉnh/Thành phố: (#21) </label>
                                            </div>
                                            <div class="col-lg-8">
                                                
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                              <label class="fw-semibold">Quận/Huyện: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                              <label class="fw-semibold">Phường/Xã: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Liệu pháp: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="gender" name="lieu_phap" @if(!in_array('lieu_phap', $editableFields)) disabled @endif>
                                                    <option value="50" {{ $customer->lieu_phap == '50' ? 'selected' : '' }}>TBG Nhật</option>
                                                    <option value="51" {{ $customer->lieu_phap == '51' ? 'selected' : '' }}>NMN MJ</option>
                                                    <option value="49" {{ $customer->lieu_phap == '49' ? 'selected' : '' }}>TBG Nhật</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[ID] Insight </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="insight" placeholder="Insight" name="insight" value="{{ $customer->insight ?? '' }}" @if(!in_array('insight', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Link MXH </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="link_mxh" placeholder="Link MXH" name="link_mxh" value="{{ $customer->link_mxh ?? '' }}" @if(!in_array('link_mxh', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Bệnh lý: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="benh_ly" name="benh_ly" data-select2-selector="benh_ly" @if(!in_array('benh_ly', $editableFields)) disabled @endif>
                                                    <option value="58" {{ $customer->benh_ly == '58' ? 'selected' : '' }}>Tim mạch – Huyết áp</option>
                                                    <option value="59" {{ $customer->benh_ly == '59' ? 'selected' : '' }}>Tiểu đường – Chuyển hoá</option>
                                                    <option value="60" {{ $customer->benh_ly == '60' ? 'selected' : '' }}>Gan – Thận – Tiêu hoá</option>
                                                    <option value="61" {{ $customer->benh_ly == '61' ? 'selected' : '' }}>Cơ xương khớp – Vận động</option>
                                                    <option value="62" {{ $customer->benh_ly == '62' ? 'selected' : '' }}>Nội tiết – Nam - Nữ</option>
                                                    <option value="63" {{ $customer->benh_ly == '63' ? 'selected' : '' }}>Thần kinh – Giấc ngủ – Căng thẳng</option>
                                                    <option value="64" {{ $customer->benh_ly == '64' ? 'selected' : '' }}>Miễn dịch – Tự Miễn – Ung thư</option>
                                                    <option value="65" {{ $customer->benh_ly == '65' ? 'selected' : '' }}>Lão hoá – Trì trệ</option>
                                                    <option value="66" {{ $customer->benh_ly == '66' ? 'selected' : '' }}>Tổng hợp nhiều bệnh lý</option>
                                                    <option value="67" {{ $customer->benh_ly == '67' ? 'selected' : '' }}>Bệnh lý đặc biệt khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Tele] Dịch vụ quan tâm</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_quan_tam" placeholder="[Tele] Dịch vụ quan tâm" name="dich_vu_quan_tam" value="{{ $customer->dich_vu_quan_tam ?? '' }}" @if(!in_array('dich_vu_quan_tam', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Tài chính: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="tai_chinh" data-select2-selector="tai_chinh" @if(!in_array('tai_chinh', $editableFields)) disabled @endif>
                                                    <option value="Tốt" {{ $customer->tai_chinh == 'Tốt' ? 'selected' : '' }}>Tốt</option>
                                                    <option value="Bình thường" {{ $customer->tai_chinh == 'Bình thường' ? 'selected' : '' }}>Bình thường</option>
                                                    <option value="Yếu" {{ $customer->tai_chinh == 'Yếu' ? 'selected' : '' }}>Yếu</option>
                                                    <option value="Không xác định" {{ $customer->tai_chinh == 'Không xác định' ? 'selected' : '' }}>Không xác định</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="ngay_booking_du_kien" class="fw-semibold">[Tele] Ngày booking dự kiến: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input class="form-control" id="ngay_booking_du_kien" placeholder="[Tele] Ngày booking dự kiến:" name="ngay_booking_du_kien" value="{{ $customer->ngay_booking_du_kien ?? '' }}" @if(!in_array('ngay_booking_du_kien', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Booking </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="booking" data-select2-selector="booking" @if(!in_array('booking', $editableFields)) disabled @endif>
                                                    <option value="72" {{ $customer->booking == '72' ? 'selected' : '' }}>Lên đúng lịch</option>
                                                    <option value="73" {{ $customer->booking == '73' ? 'selected' : '' }}>Dời lịch</option>
                                                    <option value="74" {{ $customer->booking == '74' ? 'selected' : '' }}>Hủy lịch</option>
                                                    <option value="75" {{ $customer->booking == '75' ? 'selected' : '' }}>Chốt nóng</option>
                                                    <option value="76" {{ $customer->booking == '76' ? 'selected' : '' }}>Không đặt được lịch</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Chấm điểm </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cham_diem" placeholder="Chấm điểm" name="cham_diem" value="{{ $customer->cham_diem ?? '' }}" @if(!in_array('cham_diem', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show]Dịch vụ thực hiện: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu_thuc_hien" data-select2-selector="dich_vu_thuc_hien" @if(!in_array('dich_vu_thuc_hien', $editableFields)) disabled @endif>
                                                    <option value="STC Japan" {{ $customer->dich_vu_thuc_hien == 'STC Japan' ? 'selected' : '' }}>STC Japan</option>
                                                    <option value="NK" {{ $customer->dich_vu_thuc_hien == 'NK' ? 'selected' : '' }}>NK</option>
                                                    <option value="Lọc máu" {{ $customer->dich_vu_thuc_hien == 'Lọc máu' ? 'selected' : '' }}>Lọc máu</option>
                                                    <option value="Ningen Dock Premium" {{ $customer->dich_vu_thuc_hien == 'Ningen Dock Premium' ? 'selected' : '' }}>Ningen Dock Premium</option>
                                                    <option value="Recells" {{ $customer->dich_vu_thuc_hien == 'Recells' ? 'selected' : '' }}>Recells</option>
                                                    <option value="Xsome" {{ $customer->dich_vu_thuc_hien == 'Xsome' ? 'selected' : '' }}>Xsome</option>
                                                    <option value="BJR" {{ $customer->dich_vu_thuc_hien == 'BJR' ? 'selected' : '' }}>BJR</option>
                                                    <option value="MesoF" {{ $customer->dich_vu_thuc_hien == 'MesoF' ? 'selected' : '' }}>MesoF</option>
                                                    <option value="NMN IV" {{ $customer->dich_vu_thuc_hien == 'NMN IV' ? 'selected' : '' }}>NMN IV</option>
                                                    <option value="NMN Cap" {{ $customer->dich_vu_thuc_hien == 'NMN Cap' ? 'selected' : '' }}>NMN Cap</option>
                                                    <option value="Thải độc" {{ $customer->dich_vu_thuc_hien == 'Thải độc' ? 'selected' : '' }}>Thải độc</option>
                                                    <option value="Miễn dịch" {{ $customer->dich_vu_thuc_hien == 'Miễn dịch' ? 'selected' : '' }}>Miễn dịch</option>
                                                    <option value="Gói khám VVIP nam" {{ $customer->dich_vu_thuc_hien == 'Gói khám VVIP nam' ? 'selected' : '' }}>Gói khám VVIP nam</option>
                                                    <option value="Gói khám VVIP nữ" {{ $customer->dich_vu_thuc_hien == 'Gói khám VVIP nữ' ? 'selected' : '' }}>Gói khám VVIP nữ</option>
                                                    <option value="Gói khám cơ bản" {{ $customer->dich_vu_thuc_hien == 'Gói khám cơ bản' ? 'selected' : '' }}>Gói khám cơ bản</option>
                                                    <option value="Gói khám tổng quát" {{ $customer->dich_vu_thuc_hien == 'Gói khám tổng quát' ? 'selected' : '' }}>Gói khám tổng quát</option>
                                                    <option value="Chăm sóc da" {{ $customer->dich_vu_thuc_hien == 'Chăm sóc da' ? 'selected' : '' }}>Chăm sóc da</option>
                                                    <option value="Y học phương đông (AP)" {{ $customer->dich_vu_thuc_hien == 'Y học phương đông (AP)' ? 'selected' : '' }}>Y học phương đông (AP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show] Bác sĩ tư vấn: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="bac_si_tu_van" data-select2-selector="bac_si_tu_van" @if(!in_array('bac_si_tu_van', $editableFields)) disabled @endif>
                                                    <option value="Lê Tuyên Hồng Dương" {{ $customer->bac_si_tu_van == 'Lê Tuyên Hồng Dương' ? 'selected' : '' }}>Lê Tuyên Hồng Dương</option>
                                                    <option value="Nguyễn Tiến Dũng" {{ $customer->bac_si_tu_van == 'Nguyễn Tiến Dũng' ? 'selected' : '' }}>Nguyễn Tiến Dũng</option>
                                                    <option value="Ngọc Bình" {{ $customer->bac_si_tu_van == 'Ngọc Bình' ? 'selected' : '' }}>Ngọc Bình</option>
                                                    <option value="Phan Thị Thanh Vân" {{ $customer->bac_si_tu_van == 'Phan Thị Thanh Vân' ? 'selected' : '' }}>Phan Thị Thanh Vân</option>
                                                    <option value="Hoàng Văn Đông" {{ $customer->bac_si_tu_van == 'Hoàng Văn Đông' ? 'selected' : '' }}>Hoàng Văn Đông</option>
                                                    <option value="Dương Đức Việt" {{ $customer->bac_si_tu_van == 'Dương Đức Việt' ? 'selected' : '' }}>Dương Đức Việt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show] Chuyên viên tư vấn:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="chuyen_vien_tu_van" @if(!in_array('chuyen_vien_tu_van', $editableFields)) disabled @endif>
                                                    <option value="" disabled selected>Chọn người giới thiệu</option>
                                                    {{-- @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ in_array($user->getfly_id, explode(',', $customer->accessible_user_ids ?? '')) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show] Phân loại show: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="phan_loai_show" data-select2-selector="phan_loai_show" @if(!in_array('phan_loai_show', $editableFields)) disabled @endif>
                                                    <option value="82" {{ $customer->phan_loai_show == '82' ? 'selected' : '' }}>Member log</option>
                                                    <option value="83" {{ $customer->phan_loai_show == '83' ? 'selected' : '' }}>Follow</option>
                                                    <option value="84" {{ $customer->phan_loai_show == '84' ? 'selected' : '' }}>Miss sale log</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Show] Lịch sử tư vấn</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="lich_su_tu_van" placeholder="[Show] Lịch sử tư vấn" name="lich_su_tu_van" value="{{ $customer->lich_su_tu_van ?? '' }}" @if(!in_array('lich_su_tu_van', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Show] Hợp đồng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="hop_dong" placeholder="Hợp đồng" name="hop_dong" value="{{ $customer->hop_dong ?? '' }}" @if(!in_array('hop_dong', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[DD] Dịch vụ: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu" data-select2-selector="dich_vu" @if(!in_array('dich_vu', $editableFields)) disabled @endif>
                                                    <option value="STC Japan" {{ $customer->dich_vu == 'STC Japan' ? 'selected' : '' }}>STC Japan</option>
                                                    <option value="NK" {{ $customer->dich_vu == 'NK' ? 'selected' : '' }}>NK</option>
                                                    <option value="Lọc máu" {{ $customer->dich_vu == 'Lọc máu' ? 'selected' : '' }}>Lọc máu</option>
                                                    <option value="Ningen Dock Premium" {{ $customer->dich_vu == 'Ningen Dock Premium' ? 'selected' : '' }}>Ningen Dock Premium</option>
                                                    <option value="Recells" {{ $customer->dich_vu == 'Recells' ? 'selected' : '' }}>Recells</option>
                                                    <option value="Xsome" {{ $customer->dich_vu == 'Xsome' ? 'selected' : '' }}>Xsome</option>
                                                    <option value="BJR" {{ $customer->dich_vu == 'BJR' ? 'selected' : '' }}>BJR</option>
                                                    <option value="MesoF" {{ $customer->dich_vu == 'MesoF' ? 'selected' : '' }}>MesoF</option>
                                                    <option value="NMN IV" {{ $customer->dich_vu == 'NMN IV' ? 'selected' : '' }}>NMN IV</option>
                                                    <option value="NMN Cap" {{ $customer->dich_vu == 'NMN Cap' ? 'selected' : '' }}>NMN Cap</option>
                                                    <option value="Thải độc" {{ $customer->dich_vu == 'Thải độc' ? 'selected' : '' }}>Thải độc</option>
                                                    <option value="Miễn dịch" {{ $customer->dich_vu == 'Miễn dịch' ? 'selected' : '' }}>Miễn dịch</option>
                                                    <option value="Gói khám VVIP nam" {{ $customer->dich_vu == 'Gói khám VVIP nam' ? 'selected' : '' }}>Gói khám VVIP nam</option>
                                                    <option value="Gói khám VVIP nữ" {{ $customer->dich_vu == 'Gói khám VVIP nữ' ? 'selected' : '' }}>Gói khám VVIP nữ</option>
                                                    <option value="Gói khám cơ bản" {{ $customer->dich_vu == 'Gói khám cơ bản' ? 'selected' : '' }}>Gói khám cơ bản</option>
                                                    <option value="Gói khám tổng quát" {{ $customer->dich_vu == 'Gói khám tổng quát' ? 'selected' : '' }}>Gói khám tổng quát</option>
                                                    <option value="Chăm sóc da" {{ $customer->dich_vu == 'Chăm sóc da' ? 'selected' : '' }}>Chăm sóc da</option>
                                                    <option value="Y học phương đông (AP)" {{ $customer->dich_vu == 'Y học phương đông (AP)' ? 'selected' : '' }}>Y học phương đông (AP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tổng giá trị</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tong_gia_tri" placeholder="Tổng giá trị" name="tong_gia_tri" value="{{ $customer->tong_gia_tri ?? '' }}" @if(!in_array('tong_gia_tri', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Công nợ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cong_no" placeholder="Công nợ" name="cong_no" value="{{ $customer->cong_no ?? '' }}" @if(!in_array('cong_no', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Ngày thu dự kiến</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thu_du_kien" placeholder="Ngày thu dự kiến" name="ngay_thu_du_kien" value="{{ $customer->ngay_thu_du_kien ?? '' }}" @if(!in_array('ngay_thu_du_kien', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tiền thu dự kiến</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tien_thu_du_kien" placeholder="Tiền thu dự kiến" name="tien_thu_du_kien" value="{{ $customer->tien_thu_du_kien ?? '' }}" @if(!in_array('tien_thu_du_kien', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Ngày dự kiến sử dụng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thu_thuc_te" placeholder="Ngày thu thực tế" name="ngay_thu_thuc_te" value="{{ $customer->ngay_thu_thuc_te ?? '' }}" @if(!in_array('ngay_thu_thuc_te', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tiền thu thực tế</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tien_thu_thuc_te" placeholder="Tiền thu thực tế" name="tien_thu_thuc_te" value="{{ $customer->tien_thu_thuc_te ?? '' }}" @if(!in_array('tien_thu_thuc_te', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Phân loại: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="phan_loai" data-select2-selector="phan_loai" @if(!in_array('phan_loai', $editableFields)) disabled @endif>
                                                    <option value="New" {{ $customer->phan_loai == 'New' ? 'selected' : '' }}>New</option>
                                                    <option value="Ex-new" {{ $customer->phan_loai == 'Ex-new' ? 'selected' : '' }}>Ex-new</option>
                                                    <option value="Upgrade" {{ $customer->phan_loai == 'Upgrade' ? 'selected' : '' }}>Upgrade</option>
                                                    <option value="Cross - sale" {{ $customer->phan_loai == 'Cross - sale' ? 'selected' : '' }}>Cross - sale</option>
                                                    <option value="Not-yet" {{ $customer->phan_loai == 'Not-yet' ? 'selected' : '' }}>Not-yet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[AF] Dịch vụ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_af" placeholder="[AF] Dịch vụ" name="dich_vu_af" value="{{ $customer->dich_vu_af ?? '' }}" @if(!in_array('dich_vu_af', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[AF] Lịch sử tư vấn</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="lich_su_tu_van_af" placeholder="[AF] Lịch sử tư vấn" name="lich_su_tu_van_af" value="{{ $customer->lich_su_tu_van_af ?? '' }}" @if(!in_array('lich_su_tu_van_af', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Booking] Booking thăm khám </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu_booking" placeholder="[Booking] Booking thăm khám" data-select2-selector="dich_vu_booking" @if(!in_array('dich_vu_booking', $editableFields)) disabled @endif>
                                                    <option value="Tư vấn thăm khám" {{ $customer->dich_vu_booking == 'Tư vấn thăm khám' ? 'selected' : '' }}>Tư vấn thăm khám</option>
                                                    <option value="Siêu âm" {{ $customer->dich_vu_booking == 'Siêu âm' ? 'selected' : '' }}>Siêu âm</option>
                                                    <option value="Xét nghiệm máu" {{ $customer->dich_vu_booking == 'Xét nghiệm máu' ? 'selected' : '' }}>Xét nghiệm máu</option>
                                                    <option value="Siêu âm và xét nghiệm" {{ $customer->dich_vu_booking == 'Siêu âm và xét nghiệm' ? 'selected' : '' }}>Siêu âm và xét nghiệm</option>
                                                    <option value="Đọc kết quả" {{ $customer->dich_vu_booking == 'Đọc kết quả' ? 'selected' : '' }}>Đọc kết quả</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Số lượng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="so_luong_booking" placeholder="[Booking] Số lượng" name="so_luong_booking" value="{{ $customer->so_luong_booking ?? '' }}" @if(!in_array('so_luong_booking', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Ngày dự kiến sử dụng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_du_kien_su_dung" placeholder="[Booking] Ngày dự kiến sử dụng" name="ngay_du_kien_su_dung" value="{{ $customer->ngay_du_kien_su_dung ?? '' }}" @if(!in_array('ngay_du_kien_su_dung', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Ngày thực tế sử dụng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thuc_te_su_dung" placeholder="[Booking] Ngày thực tế sử dụng" name="ngay_thuc_te_su_dung" value="{{ $customer->ngay_thuc_te_su_dung ?? '' }}" @if(!in_array('ngay_thuc_te_su_dung', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Booking] Địa điểm sử dụng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dia_diem_su_dung" placeholder="[Booking] Địa điểm sử dụng" data-select2-selector="dia_diem_su_dung" @if(!in_array('dia_diem_su_dung', $editableFields)) disabled @endif>
                                                    <option value="21 Thái Phiên" {{ $customer->dia_diem_su_dung == '21 Thái Phiên' ? 'selected' : '' }}>21 Thái Phiên</option>
                                                    <option value="59 Ngô Thì Nhậm" {{ $customer->dia_diem_su_dung == '59 Ngô Thì Nhậm' ? 'selected' : '' }}>59 Ngô Thì Nhậm</option>
                                                    <option value="207 Nguyễn Văn Thủ" {{ $customer->dia_diem_su_dung == '207 Nguyễn Văn Thủ' ? 'selected' : '' }}>207 Nguyễn Văn Thủ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Người thực hiện</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nguoi_thuc_hien" placeholder="[Booking] Người thực hiện" name="nguoi_thuc_hien" value="{{ $customer->nguoi_thuc_hien ?? '' }}" @if(!in_array('nguoi_thuc_hien', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Feedback booking</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="feedback_booking" placeholder="[Booking] Feedback booking" name="feedback_booking" value="{{ $customer->feedback_booking ?? '' }}" @if(!in_array('feedback_booking', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Ref] Chính sách người giới thiệu</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="chinh_sach_ref" placeholder="[Ref] Chính sách người giới thiệu" name="chinh_sach_ref" value="{{ $customer->chinh_sach_ref ?? '' }}" @if(!in_array('chinh_sach_ref', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Ref] Dịch vụ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_ref" placeholder="[Ref] Dịch vụ" name="dich_vu_ref" value="{{ $customer->dich_vu_ref ?? '' }}" @if(!in_array('dich_vu_ref', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Ref] Giá trị</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="gia_tri_ref" placeholder="[Ref] Giá trị" name="gia_tri_ref" value="{{ $customer->gia_tri_ref ?? '' }}" @if(!in_array('gia_tri_ref', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Feedback chung</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="description" placeholder="Feedback chung" name="description" value="{{ $customer->description ?? '' }}" @if(!in_array('description', $editableFields)) disabled @endif>
                                                </div>
                                            </div>
                                        </div>









                                        {{-- WORKING HERE --}}


                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body additional-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Thông tin liên quan:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Communication details in case we want to connect with you.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add New</a>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">[Ref] Người giới thiệu:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select" data-select2-selector="tag" name="a.referrer_id" disabled @if(!in_array('referrer_id', $editableFields)) disabled @endif>
                                                    <option value="" disabled selected>Chọn người giới thiệu</option>
                                                    {{-- @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" class="{{ $customer->id }}" {{ $user->getfly_id && $customer->referrer_id == $user->getfly_id ? 'selected' : '' }} data-getfly_id="{{ $user->getfly_id }}">{{ $user->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Người phụ trách khách hàng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select" data-select2-selector="tag" name="account_manager" disable @if(!in_array('account_manager', $editableFields)) disabled @endif>
                                                    {{-- @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ $customer->account_manager == $user->getfly_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Người được phép truy cập khách này</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select" data-select2-selector="tag" name="accessible_user_ids" disabled multiple @if(!in_array('accessible_user_ids', $editableFields)) disabled @endif>
                                                    {{-- @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ in_array($user->getfly_id, explode(',', $customer->accessible_user_ids ?? '')) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Password Information:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">You can only change your password twice within 24 hours! </span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Reset</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Password: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="password" class="form-control" id="Input" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Password Confirm: </label>
                                            </div>
                                            <div class="col-lg-8 generate-pass">
                                                <div class="input-group field">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="password" class="form-control password" id="newPassword" placeholder="Password Confirm">
                                                    <div class="input-group-text c-pointer gen-pass"><i class="feather-hash"></i></div>
                                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"><i></i></div>
                                                </div>
                                                <div class="progress-bar mt-2">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pass-hint">
                                            <p class="fw-bold">Password Requirements:</p>
                                            <ul class="fs-12 ps-1 ms-2 text-muted">
                                                <li class="mb-1">At least one lowercase character</li>
                                                <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                                <li>At least one number, symbol, or whitespace character</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body pass-security">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Security preferences:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Keep your account more secure with following preferences. </span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Check Auth</a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-eye"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Enable 2-step authentication</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Protects you against password theft by requesting an authentication code via SMS on every login.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitch2FA"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitch2FA">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-shield"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Ask to change password on every 6 months</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">A simple but an effective way to be protected against data leaks and password theft.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchPassChange"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchPassChange">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="billingTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Billing Address:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">A billing address is the address associated with a payment method.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Same as Customer Info</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="addressInput_1" class="fw-semibold">Address: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control" id="addressInput_1" cols="30" rows="3" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="zipCodeInput" class="fw-semibold">Zip Code: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-tag"></i></div>
                                                    <input type="number" class="form-control" id="zipCodeInput" placeholder="Zip Code">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Shipping Address:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">A shipping address is the address to which a purchased item or service is to be delivered.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Copy Billing Address</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="addressInput_3" class="fw-semibold">Address: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control" id="addressInput_3" cols="30" rows="3" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="zipCodeInput_1" class="fw-semibold">Zip Code: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-tag"></i></div>
                                                    <input type="number" class="form-control" id="zipCodeInput_1" placeholder="Zip Code">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade" id="subscriptionTab" role="tabpanel">
                                    <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-octagon fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-1 text-truncate-1-line">We need your attention!</p>
                                            <p class="fs-12 fw-medium text-truncate-1-line">Your payment was declined. To start using tools, please <strong>Add Payment Method</strong></p>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-soft-teal text-teal d-inline-block">Add Payment Method</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="card-body choose-plan">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">Subscription & Plan:</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">4 days remaining</a>
                                        </div>
                                        <div class="p-4 mb-4 d-xxl-flex d-xl-block d-md-flex align-items-center justify-content-between gap-4 border border-dashed border-gray-5 rounded-1">
                                            <div>
                                                <div class="fs-14 fw-bold text-dark mb-1">Your current plan is <a href="javascript:void(0);" class="badge bg-primary text-white ms-2">Team Plan</a></div>
                                                <div class="fs-12 text-muted">A simple start for everyone</div>
                                            </div>
                                            <div class="my-3 my-xxl-0 my-md-3 my-md-0">
                                                <div class="fs-20 text-dark"><span class="fw-bold">$29.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                                <div class="fs-12 text-muted mt-1">Billed Monthly / Next payment on 12/10/2023 for <strong class="text-dark">$62.48</strong></div>
                                            </div>
                                            <div class="hstack gap-3">
                                                <a href="javascript:void(0);" class="text-danger">Cancel Plan</a>
                                                <a href="javascript:void(0);" class="btn btn-light-brand">Update Plan</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                                    <h6 class="fs-13 fw-bold">BASIC</h6>
                                                    <p class="fs-12 fw-normal text-muted">Starter plan for individuals.</p>
                                                    <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                                    <div class="mt-4"><span class="fs-16 fw-bold text-dark">$12.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-200 border border-dashed border-gray-5 rounded-1 position-relative">
                                                    <h6 class="fs-13 fw-bold">TEAM</h6>
                                                    <p class="fs-12 fw-normal text-muted">Collaborate up to 10 people.</p>
                                                    <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                                    <div class="mt-4"><span class="fs-16 fw-bold text-dark">$29.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                                    <div class="position-absolute top-0 start-50 translate-middle">
                                                        <i class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:void(0);" class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                                    <h6 class="fs-13 fw-bold">ENTERPRISE</h6>
                                                    <p class="fs-12 fw-normal text-muted">For bigger businesses.</p>
                                                    <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi, impedit exercitationem harum voluptates reiciendis.</p>
                                                    <div class="mt-4"><span class="fs-16 fw-bold text-dark">$49.99</span> / <em class="fs-11 fw-medium">Month</em></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body payment-methord">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0">Payment Methords:</h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add Methord</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1 position-relative">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="wd-100">
                                                            <img src="./../assets/images/payment/mastercard.svg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="ms-0 ms-sm-3">
                                                            <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                            <div class="mb-0 text-truncate-1-line">5155 **** **** ****</div>
                                                            <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 12/24</small>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-3 mt-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                    </div>
                                                    <div class="position-absolute top-50 start-0 translate-middle">
                                                        <i class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="wd-100">
                                                            <img src="./../assets/images/payment/visa.svg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="ms-0 ms-sm-3">
                                                            <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                            <div class="mb-0 text-truncate-1-line">4236 **** **** ****</div>
                                                            <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/23</small>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-3 mt-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="wd-100">
                                                            <img src="./../assets/images/payment/american-express.svg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="ms-0 ms-sm-3">
                                                            <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                            <div class="mb-0 text-truncate-1-line">3437 **** **** ****</div>
                                                            <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/24</small>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-3 mt-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="wd-100">
                                                            <img src="./../assets/images/payment/discover.svg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="ms-0 ms-sm-3">
                                                            <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                            <div class="mb-0 text-truncate-1-line">6011 **** **** ****</div>
                                                            <small class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card expires at 11/25</small>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-3 mt-3 mt-sm-0">
                                                        <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notificationsTab" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th class="wd-250 text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Successful payments</div>
                                                        <small class="fs-12 text-muted">Receive a notification for every successful payment.</small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected>Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Customer payment dispute</div>
                                                        <small class="fs-12 text-muted">Receive a notification if a payment is disputed by a customer and for dispute purposes. </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected>Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Refund alerts</div>
                                                        <small class="fs-12 text-muted">Receive a notification if a payment is stated as risk by the Finance Department. </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell" selected>Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Invoice payments</div>
                                                        <small class="fs-12 text-muted">Receive a notification if a customer sends an incorrect amount to pay their invoice. </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected>Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Rating reminders</div>
                                                        <small class="fs-12 text-muted">Send an email reminding me to rate an item a week after purchase </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected>Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Item update notifications</div>
                                                        <small class="fs-12 text-muted">Send an email when an item I've purchased is updated </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone" selected>SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Item comment notifications</div>
                                                        <small class="fs-12 text-muted">Send me an email when someone comments on one of my items </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell" selected>Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Team comment notifications</div>
                                                        <small class="fs-12 text-muted">Send me an email when someone comments on one of my team items </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat" selected>Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Item review notifications</div>
                                                        <small class="fs-12 text-muted">Send me an email when my items are approved or rejected </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected>Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Buyer review notifications</div>
                                                        <small class="fs-12 text-muted">Send me an email when someone leaves a review with their rating </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off" selected>Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Expiring support notifications</div>
                                                        <small class="fs-12 text-muted">Send me emails showing my soon to expire support entitlements </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell">Push</option>
                                                                <option value="Email" data-icon="feather-mail" selected>Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="fw-bold text-dark">Daily summary emails</div>
                                                        <small class="fs-12 text-muted">Send me a daily summary of all items approved or rejected </small>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="form-group select-wd-lg">
                                                            <select class="form-control" data-select2-selector="icon">
                                                                <option value="SMS" data-icon="feather-smartphone">SMS</option>
                                                                <option value="Push" data-icon="feather-bell" selected>Push</option>
                                                                <option value="Email" data-icon="feather-mail">Email</option>
                                                                <option value="Repeat" data-icon="feather-repeat">Repeat</option>
                                                                <option value="Deactivate" data-icon="feather-bell-off">Deactivate</option>
                                                                <option value="SMS+Push" data-icon="feather-smartphone">SMS + Push</option>
                                                                <option value="Email+Push" data-icon="feather-mail">Email + Push</option>
                                                                <option value="SMS+Email" data-icon="feather-smartphone">SMS + Email</option>
                                                                <option value="SMS+Push+Email" data-icon="feather-smartphone">SMS + Push + Email</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body notify-activity-section">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Account Activity:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Lookup you account activity checkup.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Activity</a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-message-square"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Someone comments on one of my items</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">If someone comments on one of your items, it's important to respond in a timely and appropriate manner.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchComment"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchComment">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-briefcase"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Someone replies to my job posting</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Great! It's always exciting to hear from someone who's interested in a job posting you've put out.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchReplie"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchReplie">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-briefcase"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Someone mentions or follows me</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">If you received a notification that someone mentioned or followed you, take a moment to read it and understand what it means.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchFollow"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchFollow">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="connectionTab" role="tabpanel">
                                    <div class="card-body development-connections">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Developement Connections:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Developement connections increase speed.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Connection</a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/google-drive.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Google Drive: Cloud Storage & File Sharing</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Google's powerful search capabilities are embedded in Drive and offer speed, reliability, and collaboration. And features like Drive search chips help your team ...</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGDrive"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGDrive">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/dropbox.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Dropbox: Cloud Storage & File Sharing</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Dropbox brings everything—traditional files, cloud content, and web shortcuts—together in one place. ... Save and access your files from any device, and share ...</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchDropbox"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchDropbox" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/github.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">GitHub: Where the world builds software</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">GitHub is where over 83 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, ...</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGitHub"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGitHub" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/gitlab.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">GitLab: The One DevOps Platform</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">GitLab helps you automate the builds, integration, and verification of your code. With SAST, DAST, code quality analysis, plus pipelines that enable ...</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchGitLab"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchGitLab">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/shopify.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Shopify: Ecommerce Developers Platform</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Try Shopify free and start a business or grow an existing one. Get more than ecommerce software with tools to manage every part of your business.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchShopify"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchShopify" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/whatsapp.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">WhatsApp: WhatsApp from Facebook is a FREE messaging and video calling app</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Reliable messaging. With WhatsApp, you'll get fast, simple, secure messaging and calling for free*, available on phones all ...</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchWhatsApp"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchWhatsApp">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body social-connections">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Social Connections:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Social connections increase your audience.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View Connection</a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/facebook.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Facebook: The World Most Popular Social Network</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Create an account or log into Facebook. Connect with friends, family and other people you know. Share photos and videos, send messages and get updates.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchFacebook"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchFacebook" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/instagram.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Instagram: Edit & Share photos, Videos & Dessages</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Create an account or log in to Instagram - A simple, fun & creative way to capture, edit & share photos, videos & messages with friends & family.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchInstagram"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchInstagram">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/twitter.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Twitter: It's what's happening / Twitter </a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">From breaking news and entertainment to sports and politics, get the full story with all the live commentary.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchTwitter"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchTwitter" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/spotify.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Spotify: Web Player: Music for everyone </a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Spotify is a digital music service that gives you access to millions of songs.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchSpotify"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchSpotify" checked>
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/youtube.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">YouTube: The World Largest Video Sharing Platform</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchYouTube"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchYouTube">
                                            </div>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="wd-40">
                                                    <img src="./../assets/images/brand/pinterest.png" class="img-fluid" alt="">
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Pinterest: Discover recipes, home ideas, style inspiration and other ideas to try</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Pinterest is an image sharing and social media service designed to enable saving and discovery of information on the internet using images.</div>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch form-switch-sm">
                                                <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchPinterest"></label>
                                                <input class="form-check-input c-pointer" type="checkbox" id="formSwitchPinterest" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
@endsection

@section('footer')
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/select2-active.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/lslstrength.min.js')}}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{asset('assets/js/customers-create-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{asset('assets/js/theme-customizer-init.min.js')}}"></script>
    <!--! END: Theme Customizer !-->
@endsection
