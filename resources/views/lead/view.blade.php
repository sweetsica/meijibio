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
    <title>Leads View || Meijibio</title>
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
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">View</li>
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
                            <a href="javascript:void(0);" class="btn btn-icon btn-light-brand">
                                <i class="feather-printer"></i>
                            </a>
                            <a href="leads-create.html" class="btn btn-icon btn-light-brand">
                                <i class="feather-edit"></i>
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-user-x me-3"></i>
                                        <span>Make as Lost</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-delete me-3"></i>
                                        <span>Make as Junk</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-trash-2 me-3"></i>
                                        <span>Delete as Lead</span>
                                    </a>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-plus me-2"></i>
                                <span>Make as Customer</span>
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
            <div class="bg-white py-3 border-bottom rounded-0 p-md-0 mb-0">
                <div class="d-md-none d-flex">
                    <a href="javascript:void(0)" class="page-content-left-open-toggle">
                        <i class="feather-align-left fs-20"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="nav-tabs-wrapper page-content-left-sidebar-wrapper">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-content-left-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-custom-style" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#proposalTab">Proposal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tasksTab">Tasks</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#notesTab">Notes</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#commentTab">Comments</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                        <div class="card card-body lead-info">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">Lead Information :</span>
                                    <span class="fs-12 fw-normal text-muted d-block">Following information for your lead</span>
                                </h5>
                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Create Invoice</a>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Name</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">Alexandra Dell</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Position</div>
                                <div class="col-lg-10">CEO, Founder at <a href="javascript:void(0);">WRAPCODERS</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Company</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">WRAPCODERS</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Email</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">alex.della@outlook.com</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Phone</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">+01 (375) 5896 654</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Website</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">https://www.wrapcodes.com</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Lead value</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">$255.50 USD</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Address</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">47813 Johnathon Parks Suite 559</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">City</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">Cartermouth</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">State</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">Connecticut</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Country</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">United Kingdom </a></div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-lg-2 fw-medium">Zip Code</div>
                                <div class="col-lg-10"><a href="javascript:void(0);">81135-0615 </a></div>
                            </div>
                        </div>
                        <hr>
                        <div class="card card-body general-info">
                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0">
                                    <span class="d-block mb-2">General Information :</span>
                                    <span class="fs-12 fw-normal text-muted d-block">General information for your lead</span>
                                </h5>
                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Edit Lead</a>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Status</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-text avatar-sm">
                                            <i class="feather-git-commit"></i>
                                        </div>
                                        <span>Customer</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Source</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-text avatar-sm">
                                            <i class="feather-facebook"></i>
                                        </div>
                                        <span>Facebook</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Default Language</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-text avatar-sm">
                                            <i class="feather-airplay"></i>
                                        </div>
                                        <span>System Default</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Privacy</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-text avatar-sm">
                                            <i class="feather-globe"></i>
                                        </div>
                                        <span>Private</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Created</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-text avatar-sm">
                                            <i class="feather-clock"></i>
                                        </div>
                                        <span>26 MAY, 2023</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Assigned</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-image avatar-sm">
                                            <img src="./../assets/images/avatar/1.png" alt="" class="img-fluid">
                                        </div>
                                        <span>Alexandra Della</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Lead By</div>
                                <div class="col-lg-10 hstack gap-1">
                                    <a href="javascript:void(0);" class="hstack gap-2">
                                        <div class="avatar-image avatar-sm">
                                            <img src="./../assets/images/avatar/2.png" alt="" class="img-fluid">
                                        </div>
                                        <span>Green Cute - Website design and development</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Tags</div>
                                <div class="col-lg-10 hstack gap-1"><a href="javascript:void(0);" class="badge bg-soft-primary text-primary">VIP</a><a href="javascript:void(0);" class="badge bg-soft-success text-success">High Rated</a><a href="javascript:void(0);" class="badge bg-soft-warning text-warning">Promotions</a><a href="javascript:void(0);" class="badge bg-soft-danger text-danger">Team</a><a href="javascript:void(0);" class="badge bg-soft-teal text-teal">Updates</a></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 fw-medium">Description</div>
                                <div class="col-lg-10 hstack gap-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae, nulla veniam, ipsam nemo autem fugit earum accusantium reprehenderit recusandae in minima harum vitae doloremque quasi aut dolorum voluptate. Minima, deleniti.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae, nulla veniam, ipsam nemo autem fugit earum accusantium reprehenderit recusandae in minima harum vitae doloremque quasi aut dolorum voluptate.</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="proposalTab" role="tabpanel">
                        <div class="card card-body">
                            <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 315px)">
                                <div class="text-center">
                                    <h2 class="fs-16 fw-semibold">No proposals yet!</h2>
                                    <p class="fs-12 text-muted">There is no proposals create yet.</p>
                                    <a href="javascript:void(0);" class="avatar-text bg-soft-primary text-primary mx-auto" data-bs-toggle="tooltip" title="Create Proposals">
                                        <i class="feather-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tasksTab" role="tabpanel">
                        <div class="card card-body">
                            <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 315px)">
                                <div class="text-center">
                                    <h2 class="fs-16 fw-semibold">No tasks yet!</h2>
                                    <p class="fs-12 text-muted">There is no tasks create yet.</p>
                                    <a href="javascript:void(0);" class="avatar-text bg-soft-primary text-primary mx-auto" data-bs-toggle="tooltip" title="Create Tasks">
                                        <i class="feather-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notesTab" role="tabpanel">
                        <div class="card card-body">
                            <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 315px)">
                                <div class="text-center">
                                    <h2 class="fs-16 fw-semibold">No notes yet!</h2>
                                    <p class="fs-12 text-muted">There is no notes create yet.</p>
                                    <a href="javascript:void(0);" class="avatar-text bg-soft-primary text-primary mx-auto" data-bs-toggle="tooltip" title="Create Notes">
                                        <i class="feather-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="commentTab" role="tabpanel">
                        <div class="card card-body">
                            <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 315px)">
                                <div class="text-center">
                                    <h2 class="fs-16 fw-semibold">No comments yet!</h2>
                                    <p class="fs-12 text-muted">There is no comments posted yet.</p>
                                    <a href="javascript:void(0);" class="avatar-text bg-soft-primary text-primary mx-auto" data-bs-toggle="tooltip" title="Add Comments">
                                        <i class="feather-plus"></i>
                                    </a>
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
@endsection

@section('footer')
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/select2-active.min.js')}}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{asset('assets/js/leads-view-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{asset('assets/js/theme-customizer-init.min.js')}}"></script>
    <!--! END: Theme Customizer !-->
@endsection