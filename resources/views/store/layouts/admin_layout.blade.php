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
    <link href="{{secure_asset('backend/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE FIRST SCRIPTS -->
    <script src="{{asset('backend/assets/global/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE FIRST SCRIPTS -->
    <!-- BEGIN PAGE TOP STYLES -->
    <link href="{{asset('backend/assets/global/plugins/pace/themes/pace-theme-big-counter.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE TOP STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{secure_asset('backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{secure_asset('backend/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{secure_asset('backend/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{secure_asset('backend/assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{secure_asset('backend/assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{secure_asset('backend/assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css" />
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" type="text/javascript"></script>--}}

    <!-- END THEME LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('backend/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <link rel="shortcut icon" href="{{asset('backend/favicon.ico')}}" />

    <style>
        .page-header .page-header-menu {
            /*background: #444d58;*/
            background: #022431;
            color: #fff !important;
        }
    </style>

</head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- END HEAD -->

<body class="page-container-bg-solid page-boxed">
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">

                <a href="{{url('/')}}">
                    <img src="{{url('frontend_2/image/logo.png')}}"  alt="logo" class="logo-default" style="margin-top: 4px">
                </a>
                {{--<a href="">--}}
{{--                    <img src="{{asset('backend/assets/layouts/layout3/img/logo-default.jpg')}}" alt="logo" class="logo-default">--}}
                    {{--<h1>{{config('app.name')}}</h1>--}}
                {{--</a>--}}
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="https://placehold.it/50x50">
                            <span class="username username-hide-mobile">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{url('/feeds')}}">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="app_calendar.html">--}}
                                    {{--<i class="icon-calendar"></i> My Calendar </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="app_inbox.html">--}}
                                    {{--<i class="icon-envelope-open"></i> My Inbox--}}
                                    {{--<span class="badge badge-danger"> 3 </span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="app_todo_2.html">--}}
                                    {{--<i class="icon-rocket"></i> My Tasks--}}
                                    {{--<span class="badge badge-success"> 7 </span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li class="divider"> </li>
                            {{--<li>--}}
                                {{--<a href="page_user_lock_1.html">--}}
                                    {{--<i class="icon-lock"></i> Lock Screen </a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{url('/logout')}}">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->

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
            {{--<form class="search-form" action="" method="GET">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search" name="query">--}}
                            {{--<span class="input-group-btn">--}}
                                {{--<a href="javascript:;" class="btn submit">--}}
                                    {{--<i class="icon-magnifier"></i>--}}
                                {{--</a>--}}
                            {{--</span>--}}
                {{--</div>--}}
            {{--</form>--}}
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu  ">
                @if(!\Illuminate\Support\Facades\Auth::user()->has_store)
                    <ul class="nav navbar-nav">

                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a href="{{url('/')}}">Back Home
                            <span class="arrow fa fa-arrow"></span>
                        </a>
                    </li>


                    </ul>
                    @else

                    <ul class="nav navbar-nav">
                        @if(\Illuminate\Support\Facades\Auth::user()->admin)
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="{{url('/admin/dashboard')}}"> Admin Dashboard
                                    <span class="arrow"></span>
                                </a>
                            </li>
                        @endif
                        <li class="menu-dropdown classic-menu-dropdown ">
                            <a href="{{url('/store/dashboard')}}"> Dashboard
                                <span class="arrow"></span>
                            </a>


                        </li>
                        <li class="menu-dropdown mega-menu-dropdown  ">
                            <a href="{{url('store/orders')}}"> Orders
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="menu-dropdown classic-menu-dropdown ">
                            <a href="#"> Products
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                <li class=" ">
                                    <a href="{{url('/store/all-products')}}" class="nav-link  ">
                                        All Products
                                        <span class="badge badge-success"></span>
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
                            <a href="{{url('store/marketplace-signup')}}"> Market Place
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="menu-dropdown classic-menu-dropdown ">
                            <a href="{{url('store/store-settings')}}"> Settings
                                <span class="arrow"></span>
                            </a>

                        </li>

                        @if(Auth::check() && Auth::user()->has_store)

                            <li class="menu-dropdown classic-menu-dropdown ">

                                <?php
                                $store = \App\Store::whereUserId(Auth::user()->id)->first()->slug;
                                $user_id = Auth::user()->id;

                                ?>
                                <a href='{{url("stores/$store/$user_id")}}'> My Shop
                                    <span class="arrow"></span>
                                </a>

                                {{--<a href="https://{{$store}}.shopaholicks.com/shop"> My Shop--}}
                                {{--<span class="arrow"></span>--}}
                                {{--</a>--}}



                            </li>

                        @endif
                        {{--<li class="menu-dropdown classic-menu-dropdown">--}}
                        {{--<a href="#">--}}
                        {{--<i class="icon-briefcase"></i> Pages--}}
                        {{--<span class="arrow"></span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                @endif

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
<script src="{{secure_asset('backend/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{secure_asset('backend/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{secure_asset('backend/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend//assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{secure_asset('backend/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{secure_asset('backend/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{--<script src="{{secure_asset('backend/assets/pages/scripts/ecommerce-dashboard.min.js')}}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{secure_asset('backend/assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{secure_asset('backend/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" type="text/javascript"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('backend/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('backend/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('backend/assets/pages/scripts/components-color-pickers.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->


<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script>

    $('.remove-column').on('click',function(){
        alert('hello');
    })


    // Enable pusher logging - don't include this in production
//    Pusher.logToConsole = true;
//
//    var pusher = new Pusher('b0fb81b15a4dfff2c4f4', {
//        cluster: 'eu',
//        encrypted: true
//    });
//
//    var channel = pusher.subscribe('chat-room.1');
//    channel.bind('App\\Events\\ChatMessageReceived', function(data) {
//        alert(data.chatMessage.message);
//    });

    {{--var settings = {--}}
        {{--"async": true,--}}
        {{--"crossDomain": true,--}}
        {{--"url": "https://app.mpowerpayments.com/api/v1/direct-mobile/charge",--}}
        {{--"method": "POST",--}}
        {{--"headers": {--}}
            {{--"mp-master-key": "6aa08205-b195-467b-ad0a-a761fc210d30",--}}
            {{--"mp-private-key": "live_private_e_cbpF28gEH9SSgxDnK-_niztNg",--}}
            {{--"mp-token": "85b97819a15b51648135",--}}
            {{--"content-type": "application/json",--}}
            {{--"cache-control": "no-cache",--}}
            {{--"postman-token": "c8c9e319-8e23-76ca-afd5-52041d82f530"--}}
        {{--},--}}
        {{--"processData": false,--}}
        {{--'data' :{'customer_name':'frederick ankamah','customer_phone':'0241715148','customer_email':'customer@domainname.com','wallet_provider':'MTN','merchant_name':'Shopaholicks','amount':1,},--}}
    {{--}--}}

    {{--$.ajax(settings).done(function (response) {--}}
        {{--console.log(response);--}}
    {{--});--}}
</script>


@yield('scripts')

</body>
</html>