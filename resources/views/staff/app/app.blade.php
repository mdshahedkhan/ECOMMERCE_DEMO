<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - SSIT Admin</title>
    <!--favicon-->
    <link rel="icon" href="{{  asset('assets/backend/assets/images/favicon-32x32.png') }}" type="image/png"/>
    <!-- Vector CSS -->
    <link href="{{  asset('assets/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <!--plugins-->
    <link href="{{  asset('assets/backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
    <link href="{{  asset('assets/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{  asset('assets/backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{  asset('assets/backend/assets/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{  asset('assets/backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/css/bootstrap.min.css') }}"/>
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />--}}
<!-- Icons CSS -->
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/css/icons.css') }}"/>
    <!-- App CSS -->
    @stack('CSS')
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/css/app.css') }}"/>
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/css/dark-sidebar.css') }}"/>
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/css/dark-theme.css') }}"/>
    <link rel="stylesheet" href="{{  asset('assets/backend/assets/spinkit.css') }}"/>

</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{  asset('assets/backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt=""/>
                </div>
                <div>
                    <h4 class="logo-text">Syndash</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('staff.dashboard') }}">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">Web Apps</li>
                <li>
                    <a href="{{ route('staff.brand.index') }}">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Brand</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('staff.category.index')}}">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Category</div>
                    </a>
                </li>
                <li class="{{ request()->is('staff/product/create') ? 'mm-active':'' }} {{ request()->is('staff/product/edit/*') ? 'mm-active':'' }}">
                    <a href="{{ route('staff.product.index') }}">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Product</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('staff.slider.index') }}">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Slider</div>
                    </a>
                </li>
                <li class="{{ request()->is('staff/order/*') ? 'mm-active':'' }}">
                    <a href="{{ route('staff.order.index') }}">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Order Manage</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">Customer</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:">
                        <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i></div>
                        <div class="menu-title">General Setting</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                </div>
                <div class="flex-grow-1 search-bar">
                    <div class="input-group">
                        <div class="input-group-prepend search-arrow-back">
                            <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="search"/>
                        <div class="input-group-append">
                            <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item search-btn-mobile">
                            <a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown"> <span class="msg-count">6</span>
                                <i class="bx bx-comment-detail vertical-align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <h6 class="msg-header-title">6 New</h6>
                                        <p class="msg-header-subtitle">Application Messages</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="user-online">
                                                <img src="{{  asset('assets/backend/assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">Daisy Anderson <span class="msg-time float-right">5 sec
													ago</span></h6>
                                                <p class="msg-info">The standard chunk of lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Messages</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown"> <i class="bx bx-bell vertical-align-middle"></i>
                                <span class="msg-count">8</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <h6 class="msg-header-title">8 New</h6>
                                        <p class="msg-header-subtitle">Application Notifications</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
													ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Notifications</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="user-name mb-0">{{  Auth::user()->name }}</p>
                                        <p class="designattion mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                    <img src="{{  asset('assets/backend/assets/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-tachometer"></i><span>Dashboard</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-wallet"></i><span>Earnings</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cloud-download"></i><span>Downloads</span></a>
                                <div class="dropdown-divider mb-0"></div>
                                <form id="LogoutForm" action="{{ route('logout') }}" method="post">
                                    <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); this.closest('#LogoutForm').submit()">
                                        <i class="bx bx-power-off"></i>
                                        <span>Logout</span>
                                    </a>
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
        @yield('content')
        <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">SSIT @2020 | Developed By : <a href="http://shahedkhan.com/" target="_blank">Shahed Khan</a>
            </p>
        </div>
        <!-- end footer -->
    </div>
    <div class="loader">
        <div class="example">
            <div class="sk-flow">
                <div class="sk-flow-dot"></div>
                <div class="sk-flow-dot"></div>
                <div class="sk-flow-dot"></div>
            </div>
        </div>
    </div>
    <!--end switcher-->
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{  asset('assets/backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{  asset('assets/backend/assets/js/popper.min.js') }}"></script>
    <script src="{{  asset('assets/backend/assets/js/bootstrap.min.js') }}"></script>
    <!--plugins-->
    <script src="{{  asset('assets/backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{  asset('assets/backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{  asset('assets/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{  asset('assets/backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{  asset('assets/backend/assets/js/index2.js') }}"></script>
@stack('JS')
<!-- App JS -->
    <script src="{{  asset('assets/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/MainIndex.js') }}"></script>
</body>


<!-- Mirrored from codervent.com/syndash/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 12:53:29 GMT -->
</html>
