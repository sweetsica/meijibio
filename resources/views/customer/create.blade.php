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
    <title>Customers Create || Meijibio S</title>
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
            <form action="{{ route('customer.store') }}" method="post" id="customer-form">
                @csrf
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Customers</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Create</li>
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
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">1.ID Khách hàng</a>
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
                                                <span class="d-block mb-2">ID Khách hàng:</span>
                                                {{-- <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following information is publicly displayed, be careful! </span> --}}
                                            </h5>
                                            {{-- <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add New</a> --}}
                                        </div>
                                        {{-- WORKING HERE --}}
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold" style="color: red;">[ID] Họ tên khách hàng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Name" name="account_name" required>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">[ID] Mã khách hàng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Code" name="account_code"  readonly>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[ID] Quốc gia: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="currency">
                                                    <option data-currency="vn" selected>Vietnam</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[ID]Tỉnh/Thành phố: </label>
                                            </div>
                                            <div class="col-lg-8">
                                               <select class="form-control" data-select2-selector="gender" name="province_name" >
                                                    <option disabled selected value="">-- Chọn Tỉnh/Thành --</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province['name'] }}"
                                                            {{ old('province_name') == $province['name'] ? 'selected' : '' }}>
                                                            {{ $province['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                              <label class="fw-semibold">[ID] Quận/Huyện: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="gender" name="district_name" >
                                                    <option disabled selected value="">-- Chọn Quận/Huyện --</option>
                                                    @foreach($districts as $district)
                                                        <option value="{{ $district['name'] }}"
                                                            {{ old('district_name') == $district['name'] ? 'selected' : '' }}>
                                                            {{ $district['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                              <label class="fw-semibold">[ID} Phường/Xã: </label>
                                            </div>
                                            <div class="col-lg-8">

                                                <select class="form-control" data-select2-selector="gender" name="ward_name" >
                                                    <option disabled selected value="">-- Chọn Phường/Xã --</option>
                                                    @foreach($wards as $ward)
                                                        <option value="{{ $ward['name'] }}"
                                                            {{ old('ward_name') == $ward['name'] ? 'selected' : '' }}>
                                                            {{ $ward['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="thong_tin_chung" class="fw-semibold" style="color: red;">[ID]Địa chỉ: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Địa chỉ" name="billing_address_street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold" style="color: red;">[ID] Giới tính (#24): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="gender" name="gender" required>
                                                    <option value="2" selected>Nam</option>
                                                    <option value="1">Nữ</option>
                                                    <option value="3">Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phoneInput" class="fw-semibold" style="color: red;">[ID] Điện thoại: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text" class="form-control" id="phoneInput" placeholder="Phone" name="phone_office" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[ID] Email: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Email" name="email" value="blank@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="dateofBirth" class="fw-semibold">[ID] Sinh nhật: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input class="form-control" id="dateofBirth" placeholder="Birthday" name="birthday">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold" style="color: red;">[ID] Tuổi: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mailInput" placeholder="Tuổi" name="tuoi" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="industry" class="fw-semibold">[ID] Nghề nghiệp: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <select class="form-control" data-select2-selector="gender" name="industry">
                                                        <option value="" disabled selected>Chưa phân loại</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[ID]Liệu pháp: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="gender" name="lieu_phap">
                                                    <option value="50">TBG Nhật</option>
                                                    <option value="51">NMN MJ</option>
                                                    <option value="49">TBG Nhật</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[ID] Insight </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="insight" placeholder="Insight" name="insight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[ID] Link MXH </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="link_mxh" placeholder="Link MXH" name="link_mxh">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">[ID] Camp: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                    <input type="text" class="form-control" id="fullnameInput" placeholder="Camp" name="camp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">

                                    <div class="card-body additional-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Nguồn:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Communication details in case we want to connect with you.</span>
                                            </h5>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold" style="color: red;">Danh mục data đầu vào (#152): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="data-in" id="danh_muc_data_dau_vao" name="danh_muc_data_dau_vao" required>
                                                    <option data-in="bg-primary" value="128" selected>Mua (BI)</option>
                                                    <option data-in="bg-secondary" value="129">Quảng cáo (AD)</option>
                                                    <option data-in="bg-success" value="130">Online (OR)</option>
                                                    <option data-in="bg-warning" value="131">Offline (OF)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold" style="color: red;">Nguồn (#151): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="source" id="nguon" name="nguon" required>
                                                    <option value="108" selected>FB</option>
                                                    <option value="109">Youtube</option>
                                                    <option value="110">Zalo</option>
                                                    <option value="111">Tiktok</option>
                                                    <option value="112">Web</option>
                                                    <option value="113">Cali</option>
                                                    <option value="114">Elite</option>
                                                    <option value="115">SR</option>
                                                    <option value="116">Collab</option>
                                                    <option value="117">Internal</option>
                                                    <option value="118">Mar</option>
                                                    <option value="119">PNS</option>
                                                    <option value="120">SR</option>
                                                    <option value="121">Collab</option>
                                                    <option value="122">Internal</option>
                                                    <option value="123">BOD</option>
                                                    <option value="124">FOC</option>
                                                    <option value="125">BOD</option>
                                                    <option value="126">FOC</option>
                                                    <option value="127">Walk-in</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold" style="color: red;">Mảng kinh doanh (#153): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="business" id="mang_kinh_doanh" name="mang_kinh_doanh" required>
                                                    <option value="132" selected>MJB</option>
                                                    <option value="133">LMC</option>
                                                    <option value="134">LGP</option>
                                                    <option value="135">LGG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold" style="color: red;">Nhóm nguồn (#154): </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="group" id="nhom_nguon" name="nhom_nguon" required>
                                                    <option value="136" selected>MKT</option>
                                                    <option value="137">PNS</option>
                                                    <option value="138">SR</option>
                                                    <option value="139">Collab</option>
                                                    <option value="140">Internal</option>
                                                    <option value="141">BR</option>
                                                    <option value="142">BOD</option>
                                                    <option value="143">FOC</option>
                                                    <option value="144">Walk-in</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

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
                                                <label for="mailInput" class="fw-semibold">[Ref] Chính sách người giới thiệu</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="chinh_sach_ref" placeholder="[Ref] Chính sách người giới thiệu" name="chinh_sach_ref">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Ref] Dịch vụ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_ref" placeholder="[Ref] Dịch vụ" name="dich_vu_ref">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Ref] Giá trị</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="gia_tri_ref" placeholder="[Ref] Giá trị" name="gia_tri_ref">
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
                                                <label class="fw-semibold">[Show] Chuyên viên tư vấn:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" data-select2-selector="chuyen_vien_tu_van">
                                                    <option value="" disabled selected>Chọn chuyên viên tư vấn</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->getfly_id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Bệnh lý: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="benh_ly" name="benh_ly" data-select2-selector="benh_ly">
                                                    <option value="58">Tim mạch – Huyết áp</option>
                                                    <option value="59">Tiểu đường – Chuyển hoá</option>
                                                    <option value="60">Gan – Thận – Tiêu hoá</option>
                                                    <option value="61">Cơ xương khớp – Vận động</option>
                                                    <option value="62">Nội tiết – Nam - Nữ</option>
                                                    <option value="63">Thần kinh – Giấc ngủ – Căng thẳng</option>
                                                    <option value="64">Miễn dịch – Tự Miễn – Ung thư</option>
                                                    <option value="65">Lão hoá – Trì trệ</option>
                                                    <option value="66">Tổng hợp nhiều bệnh lý</option>
                                                    <option value="67">Bệnh lý đặc biệt khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Tele] Dịch vụ quan tâm</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_quan_tam" placeholder="[Tele] Dịch vụ quan tâm" name="dich_vu_quan_tam">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Tài chính: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="tai_chinh" data-select2-selector="tai_chinh">
                                                    <option value="Tốt">Tốt</option>
                                                    <option value="Bình thường">Bình thường</option>
                                                    <option value="Yếu">Yếu</option>
                                                    <option value="Không xác định">Không xác định</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="ngay_booking_du_kien" class="fw-semibold">[Tele] Ngày booking dự kiến: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <select class="form-select form-control max-select" data-select2-selector="tag" name="ngay_booking_du_kien">
                                                        <option value="" disabled selected>Chọn ngày booking dự kiến</option>
                                                        <option value="145">Lên đúng lịch</option>
                                                        <option value="146">Dời lịch</option>
                                                        <option value="147">Hủy lịch</option>
                                                        <option value="148">Chốt nóng</option>
                                                        <option value="149">Không đặt được lịch</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Tele] Booking </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="booking" data-select2-selector="booking">
                                                    <option value="" disabled selected>Chọn ngày booking</option>
                                                    <option value="72">Lên đúng lịch</option>
                                                    <option value="73">Dời lịch</option>
                                                    <option value="74">Hủy lịch</option>
                                                    <option value="75">Chốt nóng</option>
                                                    <option value="76">Không đặt được lịch</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Chấm điểm </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cham_diem" placeholder="Link MXH" name="cham_diem">
                                                </div>
                                            </div>
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
                                                <label class="fw-semibold">[Show]Dịch vụ thực hiện: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu_thuc_hien" data-select2-selector="dich_vu_thuc_hien">
                                                    <option value="STC Japan">STC Japan</option>
                                                    <option value="NK">NK</option>
                                                    <option value="Lọc máu">Lọc máu</option>
                                                    <option value="Ningen Dock Premium">Ningen Dock Premium</option>
                                                    <option value="Recells">Recells</option>
                                                    <option value="Xsome">Xsome</option>
                                                    <option value="BJR">BJR</option>
                                                    <option value="MesoF">MesoF</option>
                                                    <option value="NMN IV">NMN IV</option>
                                                    <option value="NMN Cap">NMN Cap</option>
                                                    <option value="Thải độc">Thải độc</option>
                                                    <option value="Miễn dịch">Miễn dịch</option>
                                                    <option value="Gói khám VVIP nam">Gói khám VVIP nam</option>
                                                    <option value="Gói khám VVIP nữ">Gói khám VVIP nữ</option>
                                                    <option value="Gói khám cơ bản">Gói khám cơ bản</option>
                                                    <option value="Gói khám tổng quát">Gói khám tổng quát</option>
                                                    <option value="Chăm sóc da">Chăm sóc da</option>
                                                    <option value="Y học phương đông (AP)">Y học phương đông (AP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show] Bác sĩ tư vấn: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="bac_si_tu_van" data-select2-selector="bac_si_tu_van">
                                                    <option value="Lê Tuyên Hồng Dương">Lê Tuyên Hồng Dương</option>
                                                    <option value="Nguyễn Tiến Dũng">Nguyễn Tiến Dũng</option>
                                                    <option value="Ngọc Bình">Ngọc Bình</option>
                                                    <option value="Phan Thị Thanh Vân">Phan Thị Thanh Vân</option>
                                                    <option value="Hoàng Văn Đông">Hoàng Văn Đông</option>
                                                    <option value="Dương Đức Việt">Dương Đức Việt</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Show] Phân loại show: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="phan_loai_show" data-select2-selector="phan_loai_show">
                                                    <option value="82">Member log</option>
                                                    <option value="83">Follow</option>
                                                    <option value="84">Miss sale log</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Show] Lịch sử tư vấn</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="lich_su_tu_van" placeholder="[Show] Lịch sử tư vấn" name="lich_su_tu_van">
                                                </div>
                                            </div>
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
                                                <label for="mailInput" class="fw-semibold">[Show] Hợp đồng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="hop_dong" placeholder="Hợp đồng" name="hop_dong">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[DD] Dịch vụ: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu" data-select2-selector="dich_vu">
                                                    <option value="STC Japan">STC Japan</option>
                                                    <option value="NK">NK</option>
                                                    <option value="Lọc máu">Lọc máu</option>
                                                    <option value="Ningen Dock Premium">Ningen Dock Premium</option>
                                                    <option value="Recells">Recells</option>
                                                    <option value="Xsome">Xsome</option>
                                                    <option value="BJR">BJR</option>
                                                    <option value="MesoF">MesoF</option>
                                                    <option value="NMN IV">NMN IV</option>
                                                    <option value="NMN Cap">NMN Cap</option>
                                                    <option value="Thải độc">Thải độc</option>
                                                    <option value="Miễn dịch">Miễn dịch</option>
                                                    <option value="Gói khám VVIP nam">Gói khám VVIP nam</option>
                                                    <option value="Gói khám VVIP nữ">Gói khám VVIP nữ</option>
                                                    <option value="Gói khám cơ bản">Gói khám cơ bản</option>
                                                    <option value="Gói khám tổng quát">Gói khám tổng quát</option>
                                                    <option value="Chăm sóc da">Chăm sóc da</option>
                                                    <option value="Y học phương đông (AP)">Y học phương đông (AP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tổng giá trị</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tong_gia_tri" placeholder="Tổng giá trị" name="tong_gia_tri">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Công nợ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cong_no" placeholder="Công nợ" name="cong_no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Ngày thu dự kiến</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thu_du_kien" placeholder="Ngày thu dự kiến" name="ngay_thu_du_kien">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tiền thu dự kiến</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tien_thu_du_kien" placeholder="Tiền thu dự kiến" name="tien_thu_du_kien">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Ngày thu thực tế</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thu_thuc_te" placeholder="Ngày thu thực tế" name="ngay_thu_thuc_te">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[DD] Tiền thu thực tế</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tien_thu_thuc_te" placeholder="Tiền thu thực tế" name="tien_thu_thuc_te">
                                                </div>
                                            </div>
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
                                                <label class="fw-semibold">[AF] Phân loại</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="phan_loai" data-select2-selector="phan_loai">
                                                    <option value="New">New</option>
                                                    <option value="Ex-new">Ex-new</option>
                                                    <option value="Upgrade">Upgrade</option>
                                                    <option value="Cross - sale">Cross - sale</option>
                                                    <option value="Not-yet">Not-yet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[AF] Dịch vụ</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dich_vu_af" placeholder="[AF] Dịch vụ" name="dich_vu_af">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[AF] Lịch sử tư vấn</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="lich_su_tu_van_af" placeholder="[AF] Lịch sử tư vấn" name="lich_su_tu_van_af">
                                                </div>
                                            </div>
                                        </div>
                                    {{-- ### --}}
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
                                                <label class="fw-semibold">[Booking] Booking thăm khám</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dich_vu_booking" placeholder="[Booking] Booking thăm khám" data-select2-selector="dich_vu_booking">
                                                    <option value="Tư vấn thăm khám">Tư vấn thăm khám</option>
                                                    <option value="Siêu âm">Siêu âm</option>
                                                    <option value="Xét nghiệm máu">Xét nghiệm máu</option>
                                                    <option value="Siêu âm và xét nghiệm">Siêu âm và xét nghiệm</option>
                                                    <option value="Đọc kết quả">Đọc kết quả</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Số lượng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="so_luong_booking" placeholder="[Booking] Số lượng" name="so_luong_booking" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Ngày dự kiến sử dụng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_du_kien_su_dung" placeholder="[Booking] Ngày dự kiến sử dụng" name="ngay_du_kien_su_dung">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Ngày thực tế sử dụng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ngay_thuc_te_su_dung" placeholder="[Booking] Ngày thực tế sử dụng" name="ngay_thuc_te_su_dung">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">[Booking] Địa điểm sử dụng: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="dia_diem_su_dung" placeholder="[Booking] Địa điểm sử dụng" data-select2-selector="dia_diem_su_dung">
                                                    <option value="21 Thái Phiên">21 Thái Phiên</option>
                                                    <option value="59 Ngô Thì Nhậm">59 Ngô Thì Nhậm</option>
                                                    <option value="207 Nguyễn Văn Thủ">207 Nguyễn Văn Thủ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Người thực hiện</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="nguoi_thuc_hien" placeholder="[Booking] Người thực hiện" name="nguoi_thuc_hien">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">[Booking] Feedback booking</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="feedback_booking" placeholder="[Booking] Feedback booking" name="feedback_booking">
                                                </div>
                                            </div>
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
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="thong_tin_chung" class="fw-semibold">Thông tin chung</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="thong_tin_chung" placeholder="Thông tin chung" name="thong_tin_chung">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">[Ref] Người giới thiệu</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select" data-select2-selector="tag" name="referrer_id" multiple>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Người phụ trách khách hàng</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select"
                                                        data-select2-selector="tag"
                                                        name="account_manager"
                                                        @if(!in_array('account_manager', $editableFields)) disabled @endif>
                                            
                                                    {{-- option mặc định: user hiện tại --}}
                                                    <option value="{{ auth()->user()->getfly_id }}" selected>
                                                        {{ auth()->user()->name }}
                                                    </option>

                                                    {{-- nếu có quyền thì thêm các user khác --}}
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

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Người được phép truy cập khách này</label>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Getfly hãm cành cạch không cho sửa.</span>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-select form-control max-select" data-select2-selector="tag" name="accessible_user_ids" multiple disabled>
                                                    <option value="1" selected>Admin</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->getfly_id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center">
                                <div class="col d-flex justify-content-end" style="padding-right: 2%;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="feather-user-plus me-2"></i>
                                        <span>Thêm mới khách hàng</span>
                                    </button>
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
