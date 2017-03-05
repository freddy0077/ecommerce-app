<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{secure_asset('backend/secure_assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{secure_asset('backend/secure_assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{secure_asset('backend/secure_assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/secure_assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{secure_asset('backend/secure_assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{secure_asset('backend/favicon.ico')}}" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-boxed">
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="">
{{--                    <img src="{{secure_asset('backend/secure_assets/layouts/layout3/img/logo-default.jpg')}}" alt="logo" class="logo-default">--}}
                    <h1>{{config('app.name')}}</h1>
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    {{--<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">--}}
                        {{--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
                            {{--<i class="icon-bell"></i>--}}
                            {{--<span class="badge badge-default">7</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="external">--}}
                                {{--<h3>You have--}}
                                    {{--<strong>12 pending</strong> tasks</h3>--}}
                                {{--<a href="app_todo.html">view all</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">just now</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-success">--}}
                                                            {{--<i class="fa fa-plus"></i>--}}
                                                        {{--</span> New user registered. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">3 mins</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-danger">--}}
                                                            {{--<i class="fa fa-bolt"></i>--}}
                                                        {{--</span> Server #12 overloaded. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">10 mins</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-warning">--}}
                                                            {{--<i class="fa fa-bell-o"></i>--}}
                                                        {{--</span> Server #2 not responding. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">14 hrs</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-info">--}}
                                                            {{--<i class="fa fa-bullhorn"></i>--}}
                                                        {{--</span> Application error. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">2 days</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-danger">--}}
                                                            {{--<i class="fa fa-bolt"></i>--}}
                                                        {{--</span> Database overloaded 68%. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">3 days</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-danger">--}}
                                                            {{--<i class="fa fa-bolt"></i>--}}
                                                        {{--</span> A user IP blocked. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">4 days</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-warning">--}}
                                                            {{--<i class="fa fa-bell-o"></i>--}}
                                                        {{--</span> Storage Server #4 not responding dfdfdfd. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">5 days</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-info">--}}
                                                            {{--<i class="fa fa-bullhorn"></i>--}}
                                                        {{--</span> System Error. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<span class="time">9 days</span>--}}
                                                    {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-danger">--}}
                                                            {{--<i class="fa fa-bolt"></i>--}}
                                                        {{--</span> Storage server failed. </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    {{--<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">--}}
                        {{--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
                            {{--<i class="icon-calendar"></i>--}}
                            {{--<span class="badge badge-default">3</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu extended tasks">--}}
                            {{--<li class="external">--}}
                                {{--<h3>You have--}}
                                    {{--<strong>12 pending</strong> tasks</h3>--}}
                                {{--<a href="app_todo_2.html">view all</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">New release v1.2 </span>--}}
                                                        {{--<span class="percent">30%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">40% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Application deployment</span>--}}
                                                        {{--<span class="percent">65%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">65% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Mobile app release</span>--}}
                                                        {{--<span class="percent">98%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">98% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Database migration</span>--}}
                                                        {{--<span class="percent">10%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">10% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Web server upgrade</span>--}}
                                                        {{--<span class="percent">58%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">58% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Mobile development</span>--}}
                                                        {{--<span class="percent">85%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress">--}}
                                                        {{--<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">85% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">New UI release</span>--}}
                                                        {{--<span class="percent">38%</span>--}}
                                                    {{--</span>--}}
                                                    {{--<span class="progress progress-striped">--}}
                                                        {{--<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">38% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<!-- END TODO DROPDOWN -->--}}
                    {{--<li class="droddown dropdown-separator">--}}
                        {{--<span class="separator"></span>--}}
                    {{--</li>--}}

                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="circle">3</span>
                            <span class="corner"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <strong>7 New</strong> Messages</h3>
                                <a href="app_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../secure_assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../secure_assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../secure_assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                            <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../secure_assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../secure_assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{secure_asset('backend/secure_assets/layouts/layout3/img/avatar9.jpg')}}">
                            <span class="username username-hide-mobile">Nick</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo_2.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="page_user_login_1.html">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->

                    {{--<!-- BEGIN QUICK SIDEBAR TOGGLER -->--}}
                    {{--<li class="dropdown dropdown-extended quick-sidebar-toggler">--}}
                        {{--<span class="sr-only">Toggle Quick Sidebar</span>--}}
                        {{--<i class="icon-logout"></i>--}}
                    {{--</li>--}}
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">
            <!-- BEGIN HEADER SEARCH BOX -->
            <form class="search-form" action="http://www.keenthemes.com/preview/metronic/theme/admin_3_rounded/page_general_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu  ">
                <ul class="nav navbar-nav">
                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="javascript:;"> Dashboard
                            <span class="arrow"></span>
                        </a>


                    </li>
                    <li class="menu-dropdown mega-menu-dropdown  ">
                        <a href="javascript:;"> Orders
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="javascript:;"> Products
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class=" ">
                                <a href="{{url('/store/all-products')}}" class="nav-link  ">
                                    All Products
                                    <span class="badge badge-success">1</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="{{url('/store/add-product')}}" class="nav-link  ">
                                    <i class="icon-plus"></i> Add Product </a>
                            </li>
                            <li class=" ">
                                <a href="{{url('/store/quick-add-products')}}" class="nav-link  ">
                                    <i class="material-icons-plus_one"></i> Quick add products
                                    {{--<span class="badge badge-danger">3</span>--}}
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                        <a href="javascript:;"> Market Place
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="javascript:;"> Settings
                            <span class="arrow"></span>
                        </a>

                    </li>
                    <li class="menu-dropdown classic-menu-dropdown">
                        <a href="#">
                            <i class="icon-briefcase"></i> Pages
                            <span class="arrow"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->

@yield('content')

<!-- BEGIN INNER FOOTER -->
<div class="page-footer">
    <div class="container"> <?php echo date('Y') ?> &copy; {{config('app.name')}}
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{secure_asset('backend/secure_assets/global/plugins/respond.min.js')}}"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{secure_asset('backend/secure_assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend//secure_assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{secure_asset('backend/secure_assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="../secure_assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="../secure_assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../secure_assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{secure_asset('backend/secure_assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{secure_asset('backend/secure_assets/pages/scripts/ecommerce-dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{secure_asset('backend/secure_assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/secure_assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" type="text/javascript"></script>

<!-- END THEME LAYOUT SCRIPTS -->

@yield('scripts')

</body>
</html>