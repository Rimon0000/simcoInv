<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simco Inventory</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />


    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('backend/assets/plugins/toaster/toastr.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/nprogress/nprogress.css') }} " rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/ladda/ladda.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />

    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- SELECT 2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

    <!-- DataTable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name">Simco Inventory</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <!-- POS start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">POS</span>
                            </a>
                        </li>
                        <!-- POS end -->
                        <!-- Dashboard start -->
                        <li class="has-sub {{ (request()->is('dashboard')) ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse {{ (request()->is('dashboard')) ? 'show' : '' }}" id="dashboard" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                            <span class="nav-text">Report</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Dashboard end -->

                        <!-- Attribute start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#attribute" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Attribute</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="attribute" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Logo</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Attribute end -->

                        <!-- Expanse start -->
                        <li class="has-sub {{ (request()->is('expanse/*')) ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#expanse" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Expanse MGMT</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse {{ (request()->is('expanse/*')) ? 'show' : '' }} " id="expanse" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (request()->segment(2) == 'type') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('expanse.show')}}">
                                            <span class="nav-text">Expanse Type</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'detail') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('expanse.detail.show')}}">
                                            <span class="nav-text">Expanse Details</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Expanse end -->

                        <!-- Employee start -->
                        <li class="has-sub {{ (request()->is('employee/*')) ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#employee" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Employee MGMT</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse {{ (request()->is('employee/*')) ? 'show' : '' }}" id="employee" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (request()->segment(2) == 'area') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('area.show')}}">
                                            <span class="nav-text">Area</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'designation') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('designation.show')}}">
                                            <span class="nav-text">Designation</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'department') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('department.show')}}">
                                            <span class="nav-text">Department</span>
                                        </a>
                                    </li>

                                    <li class="{{ (request()->segment(2) == 'show') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('employee.show')}}">
                                            <span class="nav-text">Employee List</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'add') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('employee.add.page')}}">
                                            <span class="nav-text">Employee Add</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'loan') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('expanse.detail.show')}}">
                                            <span class="nav-text">Employee Advance Salary</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Employee end -->

                        <!-- Site start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#site" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Site Info</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="site" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('about.show')}}">
                                            <span class="nav-text">About us</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('address.show')}}">
                                            <span class="nav-text">Address</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('social.show')}}">
                                            <span class="nav-text">Social Links</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('faq.show')}}">
                                            <span class="nav-text">FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('tnc.show')}}">
                                            <span class="nav-text">Terms & Condition</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('policy.show')}}">
                                            <span class="nav-text">Privacy Policy</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Site end -->

                        <!-- Contact start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contacts" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Contacts</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="contacts" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('contact.show')}}">
                                            <span class="nav-text">Contacts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('subscribe.show')}}">
                                            <span class="nav-text">Subscribers</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Contact end -->
                        <!-- Supplier start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#suppliers" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Suppliers MGMT</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="suppliers" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('supplier.show')}}">
                                            <span class="nav-text">Suppliers List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('supplier.add.page')}}">
                                            <span class="nav-text">Supplier Add</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Supplier end -->
                        <!-- Customers start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#customers" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Customers MGMT</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="customers" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('customer.type.show')}}">
                                            <span class="nav-text">Customer Type</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('customer.show')}}">
                                            <span class="nav-text">Customer List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('customer.add.page')}}">
                                            <span class="nav-text">Customer Add</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Customers end -->
                        <!-- Product start -->
                        <li class="has-sub {{ (request()->is('product-mgt/*')) ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#products" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Product MGMT</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse {{ (request()->is('product-mgt/*')) ? 'show' : '' }}" id="products" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (request()->segment(2) == 'category') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Category</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'subcategory') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('subcategory.show')}}">
                                            <span class="nav-text">Sub Category One</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'subsubcategory') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('subsubcategory.show')}}">
                                            <span class="nav-text">Sub Category Two</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'brand') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('brand.show')}}">
                                            <span class="nav-text">Brand List</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'displaysection') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('displaysection.show')}}">
                                            <span class="nav-text">Varity Section</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'unit') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('unit.show')}}">
                                            <span class="nav-text">Product Unit</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'origin') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{route('origin.show')}}">
                                            <span class="nav-text">Product Origin</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'product-list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('product.list.show') }}">
                                            <span class="nav-text">Product List</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'product-attribute') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('product.attribute.show') }}">
                                            <span class="nav-text">Product Attribute</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'product-detail') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('product.detail.show') }}">
                                            <span class="nav-text">Product Details</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'slider') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('slider.show') }}">
                                            <span class="nav-text">Slider</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'campaign') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('campaign.show') }}">
                                            <span class="nav-text">Campaign</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->segment(2) == 'coupon') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('coupon.show') }}">
                                            <span class="nav-text">Coupon</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Product end -->

                        <!-- Product Purchase start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#purchase" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Purchase Mgmt</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="purchase" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('purchase.show')}}">
                                            <span class="nav-text">Product Purchase</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Product Purchase end -->

                        <!-- Product Order start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#productOrders" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Order Mgmt</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="productOrders" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Product Order</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('subcategory.show')}}">
                                            <span class="nav-text">Product Review</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Product order end -->

                        <!-- Product Stock start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Stock" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Stock Mgmt</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="Stock" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Product Stock</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Stock Transfer</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Product Stock end -->

                        <!-- Invoice start -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Invoice Mgmt</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="invoice" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('category.show')}}">
                                            <span class="nav-text">Manage Invoice</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!-- Invoice end -->

                    </ul>

                </div>

                <hr class="separator" />

            </div>
        </aside>


        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- search form -->
                    <div class="search-form d-none d-lg-inline-block">

                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <li class="dropdown notifications-menu">
                                <button class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">You have 5 notifications</li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-plus"></i> New user registered
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-remove"></i> User deleted
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-supervisor"></i> New client
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-server-network-off"></i> Server overloaded
                                            <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="text-center" href="#"> View All </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{asset('backend/assets/img/user/user.png')}}" class="user-image" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">Abdus Salam</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="{{asset('backend/assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                                        <div class="d-inline-block">
                                            Abdus Salam <small class="pt-1">abdus@gmail.com</small>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="profile.html">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="signin.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>


            @yield('content')

            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                        <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    {{ asset('backend/') }}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/toaster/toastr.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/charts/Chart.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/ladda/spin.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/ladda/ladda.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/jquery-mask-input/jquery.mask.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/jvectormap/jquetormap-2.0.3.min.jsry-jvec') }} "></script>
    <script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }} "></script>
    <script src="{{ asset('backend/assets/plugins/jekyll-search.min.js') }} "></script>
    <script src="{{ asset('backend/assets/js/sleek.js') }} "></script>
    <script src="{{ asset('backend/assets/js/chart.js') }} "></script>
    <script src="{{ asset('backend/assets/js/date-range.js') }} "></script>
    <script src="{{ asset('backend/assets/js/map.js') }} "></script>
    <script src="{{ asset('backend/assets/js/custom.js') }} "></script>

    <!-- datatables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Select 2 JS
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- toastr js -->

    <script>
        @if(Session::has('message'))

        var type = "{{ session::get('alert-type','info') }}"

        switch (type) {

            case 'info':
                toastr.info(" {{ session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ session::get('message') }} ");
                break;
        }
        @endif
    </script>

    <!-- script tags from other pages -->
    @yield('scripts')

</body>

</html>