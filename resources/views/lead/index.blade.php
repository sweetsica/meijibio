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
    <title>Leads Dashboard || Meijibio S</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/dataTables.bs5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/select2-theme.min.css')}}">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme.min.css')}}">
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
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
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-alert-circle"></i></span>
                            <span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.index') }}">Leads</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.view') }}">Leads View</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="{{ route('lead.create') }}">Leads Create</a></li>
                        </ul>
                    </li>
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
                <div class="card text-center">
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
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Leads</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item">Leads</li>
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
                            <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                <i class="feather-bar-chart"></i>
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-eye me-3"></i>
                                        <span>All</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-users me-3"></i>
                                        <span>Group</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-flag me-3"></i>
                                        <span>Country</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-dollar-sign me-3"></i>
                                        <span>Invoice</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-briefcase me-3"></i>
                                        <span>Project</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-user-check me-3"></i>
                                        <span>Active</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-user-minus me-3"></i>
                                        <span>Inactive</span>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-paperclip"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-pdf me-3"></i>
                                        <span>PDF</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-csv me-3"></i>
                                        <span>CSV</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-xml me-3"></i>
                                        <span>XML</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-txt me-3"></i>
                                        <span>Text</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-exe me-3"></i>
                                        <span>Excel</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-printer me-3"></i>
                                        <span>Print</span>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('lead.create') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Create Lead</span>
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
            <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
                <div class="accordion-body pb-2">
                    <div class="row">
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-users"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Total Customers</span>
                                                <span class="fs-24 fw-bolder d-block">26,595</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>36.85%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-check"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Active Customers</span>
                                                <span class="fs-24 fw-bolder d-block">2,245</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-danger text-danger">
                                            <i class="feather-arrow-down fs-10 me-1"></i>
                                            <span>24.56%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-plus"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">New Customers</span>
                                                <span class="fs-24 fw-bolder d-block">1,254</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-success text-success">
                                            <i class="feather-arrow-up fs-10 me-1"></i>
                                            <span>33.29%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-minus"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Inactive Customers</span>
                                                <span class="fs-24 fw-bolder d-block">4,586</span>
                                            </a>
                                        </div>
                                        <div class="badge bg-soft-danger text-danger">
                                            <i class="feather-arrow-down fs-10 me-1"></i>
                                            <span>42.47%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="leadList">
                                        <thead>
                                            <tr>
                                                <th class="wd-30">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input" id="checkAllLead">
                                                            <label class="custom-control-label" for="checkAllLead"></label>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>Lead</th>
                                                <th>Email</th>
                                                <th>Group</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                                                            <label class="custom-control-label" for="checkBox_1"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="./../assets/images/avatar/1.png" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Alexandra Della</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">alex.della@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal" selected>High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:">+1 (375) 9632 548</a></td>
                                                <td>2023-04-05, 00:05PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_2">
                                                            <label class="custom-control-label" for="checkBox_2"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-warning text-white">N</div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Nancy Elliot</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">nancy.elliot@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary" selected>Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (375) 8523 456</a></td>
                                                <td>2023-04-06, 02:52PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_3">
                                                            <label class="custom-control-label" for="checkBox_3"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="./../assets/images/avatar/2.png" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Green Cute</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">green.cute@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning" selected>Personal</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (845) 9632 874</a></td>
                                                <td>2023-04-08, 08:34PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_4">
                                                            <label class="custom-control-label" for="checkBox_4"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-teal text-white">H</div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Henry Leach</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">henry.leach@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal" selected>Primary</option>
                                                        <option value="success" data-bg="bg-success" selected>Updates</option>
                                                        <option value="warning" data-bg="bg-warning" selected>Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (258) 9514 657</a></td>
                                                <td>2023-04-10, 05:25PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success">Active</option>
                                                        <option value="warning" data-bg="bg-warning" selected>Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_5">
                                                            <label class="custom-control-label" for="checkBox_5"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="./../assets/images/avatar/3.png" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Marianne Audrey</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">marine.adrey@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary" selected>Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success" selected>Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (456) 6547 524</a></td>
                                                <td>2023-04-12, 12:02PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_6">
                                                            <label class="custom-control-label" for="checkBox_6"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-warning text-white">N</div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Nancy Elliot</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">nancy.elliot@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info" selected>Bugs</option>
                                                        <option value="primary" data-bg="bg-primary" selected>Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success" selected>Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (375) 8523 456</a></td>
                                                <td>2023-04-15, 02:40PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_7">
                                                            <label class="custom-control-label" for="checkBox_7"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="./../assets/images/avatar/4.png" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Cute Green</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">cute.green@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success" selected>VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary" selected>Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (632) 5486 662</a></td>
                                                <td>2023-04-25, 03:42PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_8">
                                                            <label class="custom-control-label" for="checkBox_8"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-success text-white">H</div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Leach Henry</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">leach.henry@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success" selected>VIP</option>
                                                        <option value="info" data-bg="bg-info" selected>Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger">Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (951) 5478 884</a></td>
                                                <td>2023-04-14, 03:32PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_9">
                                                            <label class="custom-control-label" for="checkBox_9"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md">
                                                            <img src="./../assets/images/avatar/5.png" alt="" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Audrey Marianne</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">adrey.marine@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info" selected>Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success" selected>Updates</option>
                                                        <option value="warning" data-bg="bg-warning">Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (556) 2457 586</a></td>
                                                <td>2023-04-20, 01:47PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success">Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_10">
                                                            <label class="custom-control-label" for="checkBox_10"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('lead.view') }}" class="hstack gap-3">
                                                        <div class="avatar-image avatar-md bg-primary text-white">E</div>
                                                        <div>
                                                            <span class="text-truncate-1-line">Elliot Nancy</span>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td><a href="apps-email.html">elliot.nancy@outlook.com</a></td>
                                                <td>
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" data-max-select2="tag" multiple>
                                                        <option value="success" data-bg="bg-success">VIP</option>
                                                        <option value="info" data-bg="bg-info">Bugs</option>
                                                        <option value="primary" data-bg="bg-primary">Team</option>
                                                        <option value="teal" data-bg="bg-teal">Primary</option>
                                                        <option value="success" data-bg="bg-success">Updates</option>
                                                        <option value="warning" data-bg="bg-warning" selected>Personal</option>
                                                        <option value="danger" data-bg="bg-danger">Promotions</option>
                                                        <option value="indigo" data-bg="bg-indigo">Customs</option>
                                                        <option value="primary" data-bg="bg-primary">Wholesale</option>
                                                        <option value="danger" data-bg="bg-danger" selected>Low Budget</option>
                                                        <option value="teal" data-bg="bg-teal">High Budget</option>
                                                    </select>
                                                </td>
                                                <td><a href="tel:"> (554) 2478 663</a></td>
                                                <td>2023-04-22, 02:12PM</td>
                                                <td>
                                                    <select class="form-control" data-select2-selector="status">
                                                        <option value="success" data-bg="bg-success" selected>Active</option>
                                                        <option value="warning" data-bg="bg-warning">Inactive</option>
                                                        <option value="danger" data-bg="bg-danger">Declined</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('lead.view') }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                        <i class="feather feather-printer me-3"></i>
                                                                        <span>Print</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-clock me-3"></i>
                                                                        <span>Remind</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-archive me-3"></i>
                                                                        <span>Archive</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-alert-octagon me-3"></i>
                                                                        <span>Report Spam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-divider"></li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <!--! [Start] Search Modal !-->
    <!--! ================================================================ !-->
    <div class="modal fade-scale" id="searchModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-top modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header search-form py-0">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="feather-search fs-4 text-muted"></i>
                        </span>
                        <input type="text" class="form-control search-input-field" placeholder="Search...">
                        <span class="input-group-text">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="searching-for mb-5">
                        <h4 class="fs-13 fw-normal text-gray-600 mb-3">I'm searching for...</h4>
                        <div class="row g-1">
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <i class="feather-compass"></i>
                                    <span>Recent</span>
                                </a>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <i class="feather-command"></i>
                                    <span>Command</span>
                                </a>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <i class="feather-users"></i>
                                    <span>Peoples</span>
                                </a>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <i class="feather-file"></i>
                                    <span>Files</span>
                                </a>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <i class="feather-video"></i>
                                    <span>Medias</span>
                                </a>
                            </div>
                            <div class="col-md-4 col-xl-2">
                                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 px-3 lh-lg border rounded-pill">
                                    <span>More</span>
                                    <i class="feather-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-result mb-5">
                        <h4 class="fs-13 fw-normal text-gray-600 mb-3">Recnet <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-airplay fs-5"></i>
                                <div class="fs-13 fw-semibold">CRM dashboard redesign</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">/<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-file-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">Create new eocument</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">N /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-user-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">Invite project colleagues</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                    </div>
                    <div class="command-result mb-5">
                        <h4 class="fs-13 fw-normal text-gray-600 mb-3">Command <span class="badge small bg-gray-200 rounded ms-1 text-dark">5</span></h4>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-user fs-5"></i>
                                <div class="fs-13 fw-semibold">My profile</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">P /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-users fs-5"></i>
                                <div class="fs-13 fw-semibold">Team profile</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">T /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-user-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">Invite colleagues</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">I /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-briefcase fs-5"></i>
                                <div class="fs-13 fw-semibold">Create new project</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">CP /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-life-buoy fs-5"></i>
                                <div class="fs-13 fw-semibold">Support center</div>
                            </a>
                            <a href="javascript:void(0);" class="badge border rounded text-dark">SC /<i class="feather-command ms-1 fs-12"></i></a>
                        </div>
                    </div>
                    <div class="file-result mb-4">
                        <h4 class="fs-13 fw-normal text-gray-600 mb-3">Files <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-folder-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">CRM Desing Project <span class="fs-12 fw-normal text-muted">(56.74 MB)</span></div>
                            </a>
                            <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-folder-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">Admin Dashboard Project <span class="fs-12 fw-normal text-muted">(46.83 MB)</span></div>
                            </a>
                            <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="d-flex align-items-start gap-3">
                                <i class="feather-folder-plus fs-5"></i>
                                <div class="fs-13 fw-semibold">CRM Dashboard Project <span class="fs-12 fw-normal text-muted">(68.59 MB)</span></div>
                            </a>
                            <a href="javascript:void(0);" class="file-download"><i class="feather-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--! ================================================================ !-->
    <!--! [End] Search Modal !-->
@endsection

@section('footer')
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{asset('assets/vendors/js/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/dataTables.bs5.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/select2-active.min.js')}}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{asset('assets/js/leads-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{asset('assets/js/theme-customizer-init.min.js')}}"></script>
    <!--! END: Theme Customizer !-->
@endsection
