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
    <style>
        .personal-info .row,
        .additional-info .row,
        .pass-info .row,
        .choose-plan .row { margin-bottom: 0.5rem !important; }
        .personal-info .form-control,
        .personal-info .form-select,
        .personal-info select.form-control,
        .personal-info .input-group-text,
        .additional-info .form-control,
        .additional-info .form-select,
        .additional-info select.form-control,
        .additional-info .input-group-text,
        .pass-info .form-control,
        .pass-info .form-select,
        .pass-info select.form-control,
        .pass-info .input-group-text,
        .choose-plan .form-control,
        .choose-plan .form-select,
        .choose-plan select.form-control,
        .choose-plan .input-group-text {
            height: 36px;
            min-height: 36px;
            padding: 0.3rem 0.6rem;
            font-size: 13px;
        }
        .personal-info .input-group,
        .additional-info .input-group,
        .pass-info .input-group,
        .choose-plan .input-group { height: 36px; }
        .personal-info label,
        .additional-info label,
        .pass-info label,
        .choose-plan label { font-size: 12px; margin-bottom: 0; }
        .pass-info textarea.form-control,
        .choose-plan textarea.form-control {
            height: auto;
            min-height: auto;
        }
        .pass-info .input-group:has(textarea),
        .choose-plan .input-group:has(textarea) { height: auto; }
    </style>
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
                        </ul>
                    </li>
                    
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
                                <span>Cập nhật thông tin</span>
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
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#bookingTab" role="tab">2.Booking thăm khám</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#saleTab" role="tab">3.Bán hàng</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#servicesTab" role="tab">4.Sử dụng dịch vụ</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab">Thông tin liên quan</a>
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
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Getfly ID:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="getfly_id" value="{{ $customer->getfly_id ?? '' }}" readonly></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Mã KH:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="account_code" value="{{ $customer->account_code ?? '' }}" readonly></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold" style="color:red">Họ tên:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="account_name" value="{{ $customer->account_name ?? '' }}" @if(!in_array('account_name', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold" style="color:red">Giới tính:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="gender" @if(!in_array('gender', $editableFields)) disabled @endif>
                                                            <option value="2" {{ $customer->gender == '2' ? 'selected' : '' }}>Nam</option>
                                                            <option value="1" {{ $customer->gender == '1' ? 'selected' : '' }}>Nữ</option>
                                                            <option value="3" {{ $customer->gender == '3' ? 'selected' : '' }}>Khác</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold" style="color:red">Tuổi:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="tuoi" value="{{ $customer->tuoi ?? '' }}" @if(!in_array('tuoi', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Sinh nhật:</label></div>
                                                    <div class="col-8"><input class="form-control" id="dateofBirth" name="birthday" value="{{ $customer->birthday ?? '' }}" @if(!in_array('birthday', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold" style="color:red">Điện thoại:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="phone_office" value="{{ $customer->phone_office ?? '' }}" @if(!in_array('phone_office', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Email:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="email" value="{{ $customer->email ?? '' }}" @if(!in_array('email', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Nghề nghiệp:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="industry" value="{{ $customer->industry ?? '' }}" @if(!in_array('industry', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Quốc gia:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" @if(!in_array('currency', $editableFields)) disabled @endif>
                                                            <option selected>Vietnam</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Tỉnh/TP:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" value="" disabled></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Quận/Huyện:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" value="" disabled></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Phường/Xã:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" value="" disabled></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row align-items-center">
                                                    <div class="col-2"><label class="fw-semibold" style="color:red">Địa chỉ:</label></div>
                                                    <div class="col-10"><input type="text" class="form-control" name="billing_address_street" value="{{ $customer->billing_address_street ?? '' }}" @if(!in_array('address', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Liệu pháp:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="lieu_phap" @if(!in_array('lieu_phap', $editableFields)) disabled @endif>
                                                            <option value="50" {{ $customer->lieu_phap == '50' ? 'selected' : '' }}>TBG Nhật</option>
                                                            <option value="51" {{ $customer->lieu_phap == '51' ? 'selected' : '' }}>NMN MJ</option>
                                                            <option value="49" {{ $customer->lieu_phap == '49' ? 'selected' : '' }}>TBG Nhật</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Insight:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="insight" value="{{ $customer->insight ?? '' }}" @if(!in_array('insight', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Camp:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="camp" value="{{ $customer->camp ?? '' }}" @if(!in_array('camp', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Link MXH:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" name="link_mxh" value="{{ $customer->link_mxh ?? '' }}" @if(!in_array('link_mxh', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        {{-- ## --}}
                                    <div class="card-body additional-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Nguồn:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Communication details in case we want to connect with you.</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Trạng thái:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="account_relation_detail" data-select2-selector="account_relation_detail" @if(!in_array('account_relation_detail', $editableFields)) disabled @endif>
                                                            <option value="6" {{ $customer->relation_id == '6' ? 'selected' : '' }}>Chưa phân loại</option>
                                                            <option value="1" {{ $customer->relation_id == '1' ? 'selected' : '' }}>Gọi được</option>
                                                            <option value="3" {{ $customer->relation_id == '3' ? 'selected' : '' }}>Số không tồn tại</option>
                                                            <option value="5" {{ $customer->relation_id == '5' ? 'selected' : '' }}>Không liên lạc được (Trên 3 ngày)</option>
                                                            <option value="4" {{ $customer->relation_id == '4' ? 'selected' : '' }}>Không liên lạc được (Dưới 3 ngày)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">DM data vào:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" data-select2-selector="data-in" id="danh_muc_data_dau_vao" name="danh_muc_data_dau_vao" @if(!in_array('danh_muc_data_dau_vao', $editableFields)) disabled @endif>
                                                            <option data-in="bg-primary" value="128" {{ $customer->danh_muc_data_dau_vao == '128' ? 'selected' : '' }}>Mua (BI)</option>
                                                            <option data-in="bg-secondary" value="129" {{ $customer->danh_muc_data_dau_vao == '129' ? 'selected' : '' }}>Quảng cáo (AD)</option>
                                                            <option data-in="bg-success" value="130" {{ $customer->danh_muc_data_dau_vao == '130' ? 'selected' : '' }}>Online (OR)</option>
                                                            <option data-in="bg-warning" value="131" {{ $customer->danh_muc_data_dau_vao == '131' ? 'selected' : '' }}>Offline (OF)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Nguồn:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" data-select2-selector="source" id="nguon" name="nguon" @if(!in_array('nguon', $editableFields)) disabled @endif>
                                                            <option value="174" {{ $customer->nguon == '174' ? 'selected' : '' }}>Cá nhân</option>
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
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Mảng KD:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" data-select2-selector="business" id="mang_kinh_doanh" name="mang_kinh_doanh" @if(!in_array('mang_kinh_doanh', $editableFields)) disabled @endif>
                                                            <option value="132" {{ $customer->mang_kinh_doanh == '132' ? 'selected' : '' }}>MJB</option>
                                                            <option value="133" {{ $customer->mang_kinh_doanh == '133' ? 'selected' : '' }}>LMC</option>
                                                            <option value="134" {{ $customer->mang_kinh_doanh == '134' ? 'selected' : '' }}>LGP</option>
                                                            <option value="135" {{ $customer->mang_kinh_doanh == '135' ? 'selected' : '' }}>LGG</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Nhóm nguồn:</label></div>
                                                    <div class="col-8">
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
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                         {{-- ###    --}}
                                    <hr class="my-0">

                                    <div class="card-body additional-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Giới thiệu bạn:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Communication details in case we want to connect with you.</span>
                                            </h5>
                                        </div>   

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Chính sách ref:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="chinh_sach_ref" name="chinh_sach_ref" value="{{ $customer->chinh_sach_ref ?? '' }}" @if(!in_array('chinh_sach_ref', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Dịch vụ ref:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="dich_vu_ref" name="dich_vu_ref" value="{{ $customer->dich_vu_ref ?? '' }}" @if(!in_array('dich_vu_ref', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Giá trị ref:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="gia_tri_ref" name="gia_tri_ref" value="{{ $customer->gia_tri_ref ?? '' }}" @if(!in_array('gia_tri_ref', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="tab-pane fade" id="bookingTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Gọi điện</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">[Tele] Gọi điện</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">CV tư vấn:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" data-select2-selector="chuyen_vien_tu_van">
                                                            <option value="" disabled selected>Chọn chuyên viên</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->getfly_id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Bệnh lý:</label></div>
                                                    <div class="col-8">
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
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">DV quan tâm:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="dich_vu_quan_tam" name="dich_vu_quan_tam" value="{{ $customer->dich_vu_quan_tam ?? '' }}" @if(!in_array('dich_vu_quan_tam', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Tài chính:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="tai_chinh" data-select2-selector="tai_chinh" @if(!in_array('tai_chinh', $editableFields)) disabled @endif>
                                                            <option value="Tốt" {{ $customer->tai_chinh == 'Tốt' ? 'selected' : '' }}>Tốt</option>
                                                            <option value="Bình thường" {{ $customer->tai_chinh == 'Bình thường' ? 'selected' : '' }}>Bình thường</option>
                                                            <option value="Yếu" {{ $customer->tai_chinh == 'Yếu' ? 'selected' : '' }}>Yếu</option>
                                                            <option value="Không xác định" {{ $customer->tai_chinh == 'Không xác định' ? 'selected' : '' }}>Không xác định</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Ngày BK DK:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-select form-control max-select" data-select2-selector="tag" name="ngay_booking_du_kien" @if(!in_array('ngay_booking_du_kien', $editableFields)) disabled @endif>
                                                            <option value="" disabled selected>Chọn</option>
                                                            <option value="145" {{ $customer->ngay_booking_du_kien == '145' ? 'selected' : '' }}>Lên đúng lịch</option>
                                                            <option value="146" {{ $customer->ngay_booking_du_kien == '146' ? 'selected' : '' }}>Dời lịch</option>
                                                            <option value="147" {{ $customer->ngay_booking_du_kien == '147' ? 'selected' : '' }}>Hủy lịch</option>
                                                            <option value="148" {{ $customer->ngay_booking_du_kien == '148' ? 'selected' : '' }}>Chốt nóng</option>
                                                            <option value="149" {{ $customer->ngay_booking_du_kien == '149' ? 'selected' : '' }}>Không đặt được lịch</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Booking:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="booking" data-select2-selector="booking" @if(!in_array('booking', $editableFields)) disabled @endif>
                                                            <option value="" disabled selected>Chọn</option>
                                                            <option value="72" {{ $customer->booking == '72' ? 'selected' : '' }}>Lên đúng lịch</option>
                                                            <option value="73" {{ $customer->booking == '73' ? 'selected' : '' }}>Dời lịch</option>
                                                            <option value="74" {{ $customer->booking == '74' ? 'selected' : '' }}>Hủy lịch</option>
                                                            <option value="75" {{ $customer->booking == '75' ? 'selected' : '' }}>Chốt nóng</option>
                                                            <option value="76" {{ $customer->booking == '76' ? 'selected' : '' }}>Không đặt được lịch</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Chấm điểm:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="cham_diem" name="cham_diem" value="{{ $customer->cham_diem ?? '' }}" @if(!in_array('cham_diem', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">[Show]</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">DV thực hiện:</label></div>
                                                    <div class="col-8">
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
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">BS tư vấn:</label></div>
                                                    <div class="col-8">
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
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">PL show:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="phan_loai_show" data-select2-selector="phan_loai_show" @if(!in_array('phan_loai_show', $editableFields)) disabled @endif>
                                                            <option value="82" {{ $customer->phan_loai_show == '82' ? 'selected' : '' }}>Member log</option>
                                                            <option value="83" {{ $customer->phan_loai_show == '83' ? 'selected' : '' }}>Follow</option>
                                                            <option value="84" {{ $customer->phan_loai_show == '84' ? 'selected' : '' }}>Miss sale log</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">LS tư vấn:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="lich_su_tu_van" name="lich_su_tu_van" value="{{ $customer->lich_su_tu_van ?? '' }}" @if(!in_array('lich_su_tu_van', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="saleTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Sale</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">[SALE]</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Hợp đồng:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="hop_dong" name="hop_dong" value="{{ $customer->hop_dong ?? '' }}" @if(!in_array('hop_dong', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Dịch vụ:</label></div>
                                                    <div class="col-8">
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
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Tổng giá trị:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="tong_gia_tri" name="tong_gia_tri" value="{{ $customer->tong_gia_tri ?? '' }}" @if(!in_array('tong_gia_tri', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Công nợ:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="cong_no" name="cong_no" value="{{ $customer->cong_no ?? '' }}" @if(!in_array('cong_no', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Ngày thu DK:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="ngay_thu_du_kien" name="ngay_thu_du_kien" value="{{ $customer->ngay_thu_du_kien ?? '' }}" @if(!in_array('ngay_thu_du_kien', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Tiền thu DK:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="tien_thu_du_kien" name="tien_thu_du_kien" value="{{ $customer->tien_thu_du_kien ?? '' }}" @if(!in_array('tien_thu_du_kien', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Ngày thu TT:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="ngay_thu_thuc_te" name="ngay_thu_thuc_te" value="{{ $customer->ngay_thu_thuc_te ?? '' }}" @if(!in_array('ngay_thu_thuc_te', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Tiền thu TT:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="tien_thu_thuc_te" name="tien_thu_thuc_te" value="{{ $customer->tien_thu_thuc_te ?? '' }}" @if(!in_array('tien_thu_thuc_te', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Bán hàng lần tiếp theo</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">[AF]</span>
                                            </h5>
                                        </div>
                                        
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Phân loại:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="phan_loai" data-select2-selector="phan_loai">
                                                            <option value="New" {{ $customer->phan_loai == 'New' ? 'selected' : '' }}>New</option>
                                                            <option value="Ex-new" {{ $customer->phan_loai == 'Ex-new' ? 'selected' : '' }}>Ex-new</option>
                                                            <option value="Upgrade" {{ $customer->phan_loai == 'Upgrade' ? 'selected' : '' }}>Upgrade</option>
                                                            <option value="Cross - sale" {{ $customer->phan_loai == 'Cross - sale' ? 'selected' : '' }}>Cross - sale</option>
                                                            <option value="Not-yet" {{ $customer->phan_loai == 'Not-yet' ? 'selected' : '' }}>Not-yet</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">DV AF:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="dich_vu_af" name="dich_vu_af" value="{{ $customer->dich_vu_af ?? '' }}" @if(!in_array('dich_vu_af', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">LS tư vấn AF:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="lich_su_tu_van_af" name="lich_su_tu_van_af" value="{{ $customer->lich_su_tu_van_af ?? '' }}" @if(!in_array('lich_su_tu_van_af', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="servicesTab" role="tabpanel">
                                    {{-- <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-octagon fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-1 text-truncate-1-line">We need your attention!</p>
                                            <p class="fs-12 fw-medium text-truncate-1-line">Your payment was declined. To start using tools, please <strong>Add Payment Method</strong></p>
                                            <a href="javascript:void(0);" class="btn btn-sm bg-soft-teal text-teal d-inline-block">Add Payment Method</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div> --}}
                                    <div class="card-body choose-plan">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Sử dụng dịch vụ:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">[Booking]</span>
                                            </h5>
                                        </div>
                                        
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">BK thăm khám:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="dich_vu_booking" data-select2-selector="dich_vu_booking" @if(!in_array('dich_vu_booking', $editableFields)) disabled @endif>
                                                            <option value="Tư vấn thăm khám" {{ $customer->dich_vu_booking == 'Tư vấn thăm khám' ? 'selected' : '' }}>Tư vấn thăm khám</option>
                                                            <option value="Siêu âm" {{ $customer->dich_vu_booking == 'Siêu âm' ? 'selected' : '' }}>Siêu âm</option>
                                                            <option value="Xét nghiệm máu" {{ $customer->dich_vu_booking == 'Xét nghiệm máu' ? 'selected' : '' }}>Xét nghiệm máu</option>
                                                            <option value="Siêu âm và xét nghiệm" {{ $customer->dich_vu_booking == 'Siêu âm và xét nghiệm' ? 'selected' : '' }}>Siêu âm và xét nghiệm</option>
                                                            <option value="Đọc kết quả" {{ $customer->dich_vu_booking == 'Đọc kết quả' ? 'selected' : '' }}>Đọc kết quả</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Số lượng:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="so_luong_booking" name="so_luong_booking" value="{{ $customer->so_luong_booking ?? '' }}" @if(!in_array('so_luong_booking', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Ngày DK SD:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="ngay_du_kien_su_dung" name="ngay_du_kien_su_dung" value="{{ $customer->ngay_du_kien_su_dung ?? '' }}" @if(!in_array('ngay_du_kien_su_dung', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Ngày TT SD:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="ngay_thuc_te_su_dung" name="ngay_thuc_te_su_dung" value="{{ $customer->ngay_thuc_te_su_dung ?? '' }}" @if(!in_array('ngay_thuc_te_su_dung', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Địa điểm:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-control" name="dia_diem_su_dung" data-select2-selector="dia_diem_su_dung" @if(!in_array('dia_diem_su_dung', $editableFields)) disabled @endif>
                                                            <option value="21 Thái Phiên" {{ $customer->dia_diem_su_dung == '21 Thái Phiên' ? 'selected' : '' }}>21 Thái Phiên</option>
                                                            <option value="59 Ngô Thì Nhậm" {{ $customer->dia_diem_su_dung == '59 Ngô Thì Nhậm' ? 'selected' : '' }}>59 Ngô Thì Nhậm</option>
                                                            <option value="207 Nguyễn Văn Thủ" {{ $customer->dia_diem_su_dung == '207 Nguyễn Văn Thủ' ? 'selected' : '' }}>207 Nguyễn Văn Thủ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Người TH:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="nguoi_thuc_hien" name="nguoi_thuc_hien" value="{{ $customer->nguoi_thuc_hien ?? '' }}" @if(!in_array('nguoi_thuc_hien', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Feedback BK:</label></div>
                                                    <div class="col-8"><input type="text" class="form-control" id="feedback_booking" name="feedback_booking" value="{{ $customer->feedback_booking ?? '' }}" @if(!in_array('feedback_booking', $editableFields)) disabled @endif></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                        
                                    </div>
                                    <hr class="my-0">
                                </div>
                                <div class="tab-pane fade" id="notificationsTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Thông tin liên quan:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Thông tin này chỉ admin và quản lý được sửa.</span>
                                            </h5>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-4"><label class="fw-semibold">Thông tin chung:</label></div>
                                                    <div class="col-8">
                                                        <textarea class="form-control" id="aboutInput" cols="30" rows="4" name="thong_tin_chung" @if(!in_array('thong_tin_chung', $editableFields)) disabled @endif>{{ $customer->thong_tin_chung ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Người GT:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-select form-control max-select" data-select2-selector="tag" name="a.referrer_id" disabled @if(!in_array('referrer_id', $editableFields)) disabled @endif>
                                                            <option value="" disabled selected>Chọn người giới thiệu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Người PT:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-select form-control max-select" data-select2-selector="tag" name="account_manager" @if(!in_array('account_manager', $editableFields)) disabled @endif>
                                                            <option value="{{ auth()->user()->getfly_id }}" selected>{{ auth()->user()->name }}</option>
                                                            @if(in_array('account_manager', $editableFields))
                                                                @foreach ($users as $user)
                                                                    @if($user->id !== auth()->id())
                                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col-4"><label class="fw-semibold">Truy cập:</label></div>
                                                    <div class="col-8">
                                                        <select class="form-select form-control max-select" data-select2-selector="tag" name="accessible_user_ids" multiple disabled>
                                                            <option value="1" selected>Admin</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->getfly_id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{asset('assets/js/custom-select2-init.js')}}"></script>
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
