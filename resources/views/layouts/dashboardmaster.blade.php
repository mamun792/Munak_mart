<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend_asset/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend_asset/images/favicon.png') }}" type="image/x-icon">
    <title>Fastkart - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{ asset('backend_asset/css/linearicon.css') }}">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/font-awesome.css') }}">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/themify.css') }}">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/ratio.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/remixicon.css') }}">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/feather-icon.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/animate.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vendors/bootstrap.css') }}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/vector-map.css') }}">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('backend_asset/css/vendors/slick.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_asset/css/style.css') }}">
    <!----DataTable--->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <!-- Include Quill stylesheets -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.css">
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo" src="{{ asset('backend_asset/images/logo/1.png') }}"
                                alt="logo">
                            <img class="img-fluid white-logo"
                                src="{{ asset('backend_asset/images/logo/1-white.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.html">
                            <img src="{{ asset('backend_asset/images/logo/1.png') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Fastkart .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">

                                @if (Auth::check() && Auth::user()->photo)
                                    <img src="{{ asset('image/profile_photo/' . Auth::user()->photo) }}"
                                        alt="{{ Auth::user()->name }}" width="40" height="40"
                                        style="border-radius: 50%;">
                                @else
                                    <img src="{{ Avatar::create(Auth::user()->name ?? 'Default')->toBase64() }}"
                                        alt="Avatar" width="40" height="40">
                                @endif



                                @if (auth()->check())
                                    <p class="p-2">{{ auth()->user()->name }}</p>
                                @endif



                            </div>





                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="all-users.html">
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="order-list.html">
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit') }}">
                                        <i data-feather="settings"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">

                                            <i data-feather="log-out"></i>
                                            <span>Log out</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="index.html" data-bs-original-title="" title="">
                            <img class="img-fluid for-white"
                                src="{{ asset('backend_asset/images/logo/full-white.png') }}" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo main-white"
                                src="{{ asset('backend_asset/images/logo/logo.png') }}" alt="logo">
                            <img class="img-fluid main-logo main-dark"
                                src="{{ asset('backend_asset/images/logo/logo-white.png') }}" alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="index.html">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Product</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('all.product') }}">Prodcts</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('product.show') }}">Add New Products</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Category</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('categories.index') }}">Category List</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('categories.create') }}">Add New Category</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-settings-line"></i>
                                        <span>Attributes</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="attributes.html">Attributes</a>
                                        </li>

                                        <li>
                                            <a href="{{route('add.attribute')}}">Add Attributes</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('users.list') }}">All users</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('users') }}">Add new user</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="order-list.html">Order List</a>
                                        </li>
                                        <li>
                                            <a href="order-detail.html">Order Detail</a>
                                        </li>
                                        <li>
                                            <a href="order-tracking.html">Order Tracking</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Coupons</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="coupon-list.html">Coupon List</a>
                                        </li>

                                        <li>
                                            <a href="create-coupon.html">Create Coupon</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                        <i class="ri-star-line"></i>
                                        <span>Product Review</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-settings-line"></i>
                                        <span>Settings</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('profile.edit') }}">Profile Setting</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('content')

        </div>
        <!-- page-wrapper End-->



        <!-- latest js -->
        <script src="{{ asset('backend_asset/js/jquery-3.6.0.min.js') }}"></script>

        <!-- Bootstrap js -->
        <script src="{{ asset('backend_asset/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <!-- feather icon js -->
        <script src="{{ asset('backend_asset/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('backend_asset/js/icons/feather-icon/feather-icon.js') }}"></script>

        <!-- scrollbar simplebar js -->
        <script src="{{ asset('backend_asset/js/scrollbar/simplebar.js') }}"></script>
        <script src="{{ asset('backend_asset/js/scrollbar/custom.js') }}"></script>

        <!-- Sidebar jquery -->
        <script src="{{ asset('backend_asset/js/config.js') }}"></script>

        <!-- tooltip init js -->
        <script src="{{ asset('backend_asset/js/tooltip-init.js') }}"></script>

        <!-- Plugins JS -->
        <script src="{{ asset('backend_asset/js/sidebar-menu.js') }}"></script>
        <script src="{{ asset('backend_asset/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('backend_asset/js/notify/index.js') }}"></script>

        <!-- Apexchar js -->
        <script src="{{ asset('backend_asset/js/chart/apex-chart/apex-chart1.js') }}"></script>
        <script src="{{ asset('backend_asset/js/chart/apex-chart/moment.min.js') }}"></script>
        <script src="{{ asset('backend_asset/js/chart/apex-chart/apex-chart.js') }}"></script>
        <script src="{{ asset('backend_asset/js/chart/apex-chart/stock-prices.js') }}"></script>
        <script src="{{ asset('backend_asset/js/chart/apex-chart/chart-custom1.js') }}"></script>


        <!-- slick slider js -->
        <script src="{{ asset('backend_asset/js/slick.min.js') }}"></script>
        <script src="{{ asset('backend_asset/js/custom-slick.js') }}"></script>

        <!-- customizer js -->
        <script src="{{ asset('backend_asset/js/customizer.js') }}"></script>

        <!-- ratio js -->
        <script src="{{ asset('backend_asset/js/ratio.js') }}"></script>

        <!-- sidebar effect -->
        <script src="{{ asset('backend_asset/js/sidebareffect.js') }}"></script>

        <!-- Theme js -->
        <script src="{{ asset('backend_asset/js/script.js') }}"></script>
        <!----DataTable---->
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

        {{-- Sweet Aleart --}}

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('footer_scprit')
</body>

</html>
