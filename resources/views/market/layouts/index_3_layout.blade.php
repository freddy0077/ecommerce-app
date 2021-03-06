
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic page needs
	============================================ -->
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="Evergreen Solutions">
    <meta name="robots" content="index, follow" />

    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" href="ico/favicon.png">

    <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Libs CSS
	============================================ -->
    <link rel="stylesheet" href="{{asset('frontend_2/css/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('frontend_2/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/themecss/lib.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

    <!-- Theme CSS
    ============================================ -->
    <link href="{{asset('frontend_2/css/themecss/so_megamenu.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/themecss/so-categories.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/header8.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/footer5.css')}}" rel="stylesheet">
    <link id="color_scheme" href="{{asset('frontend_2/css/home8.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/responsive.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">--}}
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.1.1/type_8ahead.bundle.min.js"></script>--}}

    <!-- BEGIN PAGE FIRST SCRIPTS -->
    <script src="{{asset('backend/assets/global/plugins/pace/pace.min.js')}}.." type="text/javascript"></script>
    <!-- END PAGE FIRST SCRIPTS -->
    <!-- BEGIN PAGE TOP STYLES -->
    <link href="{{asset('backend/assets/global/plugins/pace/themes/pace-theme-big-counter.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE TOP STYLES -->



    <style type="text/css">


        /*.bs-example {*/
        /*font-family: sans-serif;*/
        /*position: relative;*/
        /*margin: 100px;*/
        /*}*/


    </style>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}

    <script>

        var prefetch = [];

        function buildSearch(_data){
            $(".search-query").select2({
                data: _data,
                ajax: {
                    url: "/search-query",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            address: params.term, // search term
                            page: params.page
                        };
                    },

                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 2,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page

            });
        }

        buildSearch(prefetch);

        function formatRepo (area) {
            if (area.loading) return area.text;

            var markup = "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'>" + area.name + "</div>";

            markup += "</div></div>";

            return markup;
        }

        function formatRepoSelection (area) {
            if(area.text){
                return area.text;
            }
            return area.name;
        }


        $('.search-query').on('change',function(){
            $('#search-form').submit();

        })

    </script>

</head>

<body class="common-home res layout-home8 ">


<div id="wrapper" class="wrapper-full banners-effect-1">
    <!-- Preloading Screen -->
    <div class="ip-header">
        <h1 class="ip-logo">
            <a href="#">
                <img src="{{url('frontend_2/image/shopaholicks_logos_03.png')}}" width="400" alt="Shopaholicks">
            </a>
        </h1>
        <div class="ip-loader">
            <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>
                <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" style="stroke-dashoffset: 0; stroke-dasharray: 192.617;"></path>
            </svg>
        </div>
    </div>
    <!-- End Preloading Screen -->

    <!-- Header Container  -->
    <header id="header" class="variantleft type_8">

        <!-- Header Top -->
        <div class="header-top compact-hidden">
            <div class="container">
                <div class="row">
                    <div class="header-top-left form-inline col-sm-5 col-xs-12 compact-hidden">
                        <div class="form-group languages-block ">
                            <form action="" method="post" enctype="multipart/form-data" id="bt-language">
                                <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('frontend_2/image/demo/flags/gb.png')}}" alt="English" title="English">
                                    <span class="">English</span>
                                    <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href=""><img class="image_flag" src="{{asset('frontend_2/image/demo/flags/gb.png')}}" alt="English" title="English" /> English </a></li>
                                    {{--                                    <li> <a href="#"> <img class="image_flag" src="{{asset('frontend_2/image/demo/flags/lb.png')}}" alt="Arabic" title="Arabic" /> Arabic </a> </li>--}}
                                </ul>
                            </form>
                        </div>

                        <div class="form-group currencies-block">
                            <form action="" method="post" enctype="multipart/form-data" id="currency">
                                <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon icon-credit "></span> GHS <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu btn-xs">
                                    {{--<li> <a href="#">(€)&nbsp;Euro</a></li>--}}
                                    {{--<li> <a href="#">(£)&nbsp;Pounds	</a></li>--}}
                                    {{--<li> <a href="#">&nbsp;GHS	</a></li>--}}
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="header-top-right collapsed-block text-right  col-sm-7 col-xs-12 compact-hidden">
                        <h5 class="tabBlockTitle visible-xs"><a class="expander " href="#TabBlock-1">
                                <button class="btn btn-success btn-xs">More</button>
                                {{--<i class="fa fa-angle-down"></i>--}}
                            </a></h5>
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->has_store == true)
                                    {{--<li class="account" id="my_account">--}}
                                        {{--<a href="{{url('store/dashboard')}}" title="My Account" class="btn btn-xs dropdown-toggle" > <i class="fa fa-user" ></i> My Account </a>--}}
                                    {{--</li>--}}


                                    <li class="account" id="my_account">
                                        <a href="{{url('store/store-settings')}}" title="store settings" class="btn btn-xs dropdown-toggle" ><i class="fa fa-shopping-bag" aria-hidden="true"></i>My Shop </a>
                                    </li>

                                @elseif(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->has_store == false)

                                    <li class="account" id="my_account">
                                        <a  title="store settings" class="btn btn-xs dropdown-toggle" data-toggle="modal" id="create-shop" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Create a shop </a>
                                    </li>


                                @endif
                                {{--<li class="checkout"><a href='{{url("/checkout")}}' class="top-link-checkout" title="Checkout"><i class="fa fa-check-square-o" ></i> Checkout</a></li>--}}
                                @if(Auth::check())
                                    {{--<li class="wishlist"><a href="{{url('/fancies')}}" class="top-link-wishlist" title="wishlist"><i class="fa fa-heart" ></i> My Fancies</a></li>--}}

                                    <li class="signin"><a href="{{url('/feeds')}}" class="top-link-checkout" title="profile"><i class="fa fa-user" ></i> Profile</a></li>

                                    <li class="signin"><a href="{{url('/all-feeds')}}" class="top-link-checkout" title="feeds"><i class="fa fa-feed" ></i> Feeds</a></li>

                                    <li class="signin"><a href="{{url('/logout')}}" class="top-link-checkout" title="sign out"><i class="fa fa-sign-out" ></i> Sign out</a></li>

                                @else
                                    <li class="signin"><a href="{{url('/login')}}" class="top-link-checkout" title="login"><i class="fa fa-lock" ></i> Sign In or Register</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->

        <!-- Header center -->
        <div class="header-center">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
                        <a href="#">
                            <img src="{{url('frontend_2/image/logo.png')}}" alt="SW Shoppy">

                            {{--                            <img src="{{asset('frontend_2/image/demo/logos/logo_8.png')}}" title="Your Store" alt="Your Store">--}}
                        </a>
                    </div>
                    <!-- //end Logo -->

                    <!-- Search -->
                    <div id="sosearchpro" class="col-md-5 col-sm-7 search-pro">
                        <form method="GET" action="">
                            <div id="search0" class="search input-group">
                                <div class="select_category filter_type icon-select">
                                    <select class="no-border" name="category_id">
                                        <option value="all">All Categories</option>
                                        @foreach(\App\ProductCategory::whereEnable(true)->get(['id','name']) as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input class="autosearch-input form-control search-query" type="text" value="" size="50" autocomplete="off" placeholder="Enter keywords to search..." name="search">
								<span class="input-group-btn">
								<button type="submit" class="button-search btn btn-primary " name="submit_search"><i class="fa fa-search"></i></button>
								</span>
                            </div>
                            <input type="hidden" name="route" value="product/search">
                        </form>
                        {{--<form action="{{url('/search-market')}}" id="search-form">--}}
                            {{--{!! csrf_field() !!}--}}
                        {{--<input type="text" class="typeahead" name="term" style=" border-radius: 7px;">--}}
                        {{--</form>--}}
                    </div>
                    <!-- //Search -->

                    <!-- Main Menu -->
                    <div class="phone-contact col-md-2  hidden-md hidden-sm hidden-xs">
                        <div class="inner-info">
                            {{--<strong>Call us Now:</strong><br>--}}
                            {{--<span>Toll free:  0123-456-789</span>--}}
                        </div>
                    </div>
                    <!-- //Main Menu -->

                    <!-- Shopping Cart -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 shopping_cart pull-right" id="shopping-cart">

                        <div id="cart" class=" btn-group btn-shopping-cart">
                            <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                                <div class="shopcart">
                                    <span class="handle pull-left"></span>
                                    <span class="title">My cart</span>
                                    <p class="text-shopping-cart cart-total-full">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}} item(s) - GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} </p>
                                </div>
                            </a>

                            <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">

                                <li>
                                    <table class="table table-striped">
                                        <tbody>

                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $content)

                                            <tr>
                                                <td class="text-center" style="width:70px">
                                                    <a href="product.html">
                                                        <img src="https://placehold.it/30x30" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview">
                                                    </a>
                                                </td>
                                                <td class="text-left"> <a class="cart_product_name" href="#">{{$content->name}}</a> </td>
                                                <td class="text-center"> x{{$content->qty}} </td>
                                                <td class="text-center"> GHS {{$content->price}} </td>
                                                <td class="text-right">
                                                    <a href="#" class="fa fa-edit"></a>
                                                </td>
                                                <td class="text-right">
                                                    <a onclick="cart.remove('{{$content->rowId}}');" class="fa fa-times fa-delete"></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Sub-Total</strong>
                                                </td>
                                                <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            </tr>

                                            {{--<tr>--}}
                                            {{--<td class="text-left"><strong>VAT (20%)</strong>--}}
                                            {{--</td>--}}
                                            {{--<td class="text-right">$200.00</td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-right"> <a class="btn view-cart" href="{{url('/store/checkout')}}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-mega checkout-cart" href="{{url('store/checkout')}}"><i class="fa fa-share"></i>Checkout</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--//cart-->
                    </div>
                    <!-- //Shopping Cart -->
                </div>

            </div>
        </div>
        <!-- //Header center -->

        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">

                    <!-- Main menu -->
                    <div class="megamenu-hori  col-xs-12 ">
                        <div class="responsive so-megamenu ">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        Navigation
                                    </div>

                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container">

                                                {{--<ul class="megamenu " data-transition="slide" data-animationtime="250">--}}
                                                    {!! $MyNavBar->asUl( array('class'=>"megamenu", 'data-transition'=>"slide", 'data-animationtime'=>"250")) !!}
                                                    {{--<li>--}}
                                                        {{--<a href="{{url('/')}}">Home</a>--}}

                                                    {{--</li>--}}

                                                    {{--<li class="">--}}
                                                        {{--<p class="close-menu"></p>--}}
                                                        {{--<a href="{{url('/')}}" class="clearfix">--}}
                                                            {{--<strong>ALL SHOPS</strong>--}}
                                                            {{--<span class="label"></span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}

                                                    {{--@foreach(\App\ProductCategory::all('id','name') as $category)--}}

                                                        {{--<li class="mainNav">--}}
                                                            {{--<p class="close-menu"></p>--}}
                                                            {{--<a href="{{url('/category',$category->id)}}" class="clearfix">--}}
                                                                {{--<strong>{{$category->name}}</strong>--}}
                                                                {{--<span class="label"></span>--}}
                                                            {{--</a>--}}
                                                        {{--</li>--}}


                                                    {{--@endforeach--}}


                                                    {{--<li class="">--}}
                                                        {{--<p class="close-menu"></p>--}}
                                                        {{--<a href="{{url('/category')}}" class="clearfix">--}}
                                                            {{--<strong>BLOG</strong>--}}
                                                            {{--<span class="label"></span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="">--}}
                                                    {{--<p class="close-menu"></p>--}}
                                                    {{--<a href="" class="clearfix">--}}
                                                    {{--<strong>Blog</strong>--}}
                                                    {{--<span class="label"></span>--}}
                                                    {{--</a>--}}
                                                    {{--</li>--}}


                                                    {{--<li class="hidden-md">--}}
                                                    {{--<p class="close-menu"></p>--}}
                                                    {{--<a href="#" class="clearfix">--}}
                                                    {{--<strong>Buy Theme!</strong>--}}

                                                    {{--</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}

                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- //end Main menu -->

                </div>
            </div>

        </div>

        <!-- Navbar switcher -->
        <!-- //end Navbar switcher -->
    </header>
    <!-- //Header Container  -->


    @yield('content')

    <script type="text/javascript"><!--
        var $typeheader = 'header-home1';
        //-->
    </script>

    <!-- Footer Container -->
    <footer class="footer-container type_footer5">

        <!-- Footer Top Container -->
        <section class="footer-top">
            <div class="container content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="module clearfix ">
                            <div class="modcontent">
                                <div class="block-policy-top ">
                                    <div class="policy policy1 col-sm-7 col-xs-12">
                                        {{--<div class="policy-inner">--}}
                                            {{--<i class="ico-policy"></i>--}}
                                            {{--<h4>Advertise on this page ?</h4>--}}
                                            {{--<span>email: info@shopaholicks.com</span>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="policy policy2 col-sm-4 col-xs-12">
                                        {{--<div class="policy-inner">--}}
                                            {{--<i class="ico-policy"></i>--}}
                                            {{--<h4> info@shopaholicks.com</h4>--}}
                                            {{--<span>on all orders over $99</span>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="policy policy3 col-sm-4 col-xs-12">
                                        {{--<div class="policy-inner">--}}
                                            {{--<i class="ico-policy"></i>--}}
                                            {{--<h4>Safe shopping</h4>--}}
                                            {{--<span>Save up to 50% now  </span>--}}
                                        {{--</div>--}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- /Footer Top Container -->

        <section class="footer-center">
            <div class=" container">
                <div class="row">
                    <div class="module clearfix modLine icons-social">
                        <h3 class="modtitle">Follow Us</h3>
                        <div class="modcontent">
                            <div class="list-inline">
                                <a title="Facebook" href="http://www.facebook.com/shopaholicksofficial" target="_blank">
                                    <span class="fa fa-facebook icon-circled icon-color"></span>
                                </a>

                                <a title="Twitter" href="https://twitter.com/shopaholicks" target="_blank">
                                    <span class="fa fa-twitter icon-circled icon-color"></span>
                                </a>

                                <a title="Google+" href="https://plus.google.com/u/0/+Smartaddons" target="_blank">
                                    <span class="fa fa-google-plus icon-circled icon-color"></span>
                                </a>


                                <a title="Pinterest" href="https://www.instagram.com/shopaholicksgh" target="_blank">
                                    <span class="fa fa-instagram icon-circled icon-color"></span>
                                </a>


                            </div>
                        </div>
                    </div>
                    <hr class="footer-lines ">
                    <div class="col-sm-6 col-md-4 box-information">
                        <div class="module clearfix">
                            <h3 class="modtitle">Information</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    {{--<li><a href="#">About Us</a></li>--}}
                                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{url('/terms-of-use')}}">Terms of Use</a></li>
                                    <li><a href="{{url('/our-team')}}">The team</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 box-service">
                        <div class="module clearfix">
                            <h3 class="modtitle">Customer Service</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Returns</a></li>
                                    {{--<li><a href="#">Site Map</a></li>--}}
                                    {{--<li><a href="{{url('/feeds')}}">My Account</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{--<div class="col-sm-6 col-md-3 box-account">--}}
                        {{--<div class="module clearfix">--}}
                            {{--<h3 class="modtitle">My Account</h3>--}}
                            {{--<div class="modcontent">--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><a href="#">Brands</a></li>--}}
                                    {{--<li><a href="gift-voucher.html">Gift Vouchers</a></li>--}}
                                    {{--<li><a href="#">Affiliates</a></li>--}}
                                    {{--<li><a href="#">Specials</a></li>--}}
                                    {{--<li><a href="#" target="_blank">Our Blog</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-sm-6 col-md-4 collapsed-block ">
                        <div class="module clearfix">
                            <h3 class="modtitle">Contact Us	</h3>
                            <h4>Want to Advertise on this page ?</h4>
                            {{--<small>Email: info@shopaholicks.com</small>--}}
                            <div class="modcontent">
                                <ul class="contact-address">
                                    <li><span class="fa fa-map-marker"></span> Shopaholicks Ltd.</li>
                                    <li><span class="fa fa-envelope-o"></span> Email: <a href="#"> info@shopaholicks.com</a></li>
                                    <li><span class="fa fa-phone">&nbsp;</span> Phone 1:  233 20 936 9286<br>Phone 2: (233) 20 506 6233</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr class="footer-lines no-margin-bottom">
                </div>
            </div>
        </section>

        <!-- Footer Bottom Container -->
        <div class="footer-bottom-block ">
            <div class=" container">
                <div class="row">
                    <div class="col-sm-5 copyright-text"> © {{date('Y')}} Shopaholicks. All Rights Reserved. </div>
                    <div class="col-sm-7">
                        <div class="block-payment text-right">
                            {{--<img src="image/demo/content/payment.png" alt="payment" title="payment" >--}}
                            <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=kbvYzNQKXEEbGc9D4lXW7j8p6kJres0uE4E3mfKmzFTFiQfOC84LOh402CtF"></script></span>
                        </div>
                    </div>
                    <!--Back To Top-->
                    <div class="back-to-top"><i class="fa fa-angle-up"></i><span> Top </span></div>

                </div>
            </div>
        </div>
        <!-- /Footer Bottom Container -->

    </footer>
    <!-- //end Footer Container -->
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="create-shop-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New Shop</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{url('add-new-shop')}}" method="post" id="add-new-shop">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name of shop">
                            <span class="help-block text-danger"></span>
                            <span class="validation-error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="col-sm-3 control-label">Domain</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain" readonly>
                            <span class="help-block text-danger"></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                            <span class="help-block text-danger"></span>


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="city" required>
                               <option>Select city</option>
                               <option>Accra</option>
                               <option>Kumasi</option>
                               <option>Koforidua</option>
                               <option>Takoradi</option>
                               <option>Capecoast</option>
                               <option>Ho</option>
                               <option>Sunyani</option>
                               <option>Tamale</option>
                               <option>Wa</option>
                               <option>Bolgatanga</option>
                           </select>
                        </div>
                        <span class="help-block"></span>

                    </div>


                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            <span class="help-block text-danger"></span>


                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<div class="col-sm-offset-2 col-sm-10">--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox"> Remember me--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Create shop</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<link rel='stylesheet' property='stylesheet'  href='{{asset('frontend_2/css/themecss/cpanel.css')}}' type='text/css' media='all' />
<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{asset('frontend_2/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/libs.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/unveil/jquery.unveil.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/datetimepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58d0697a98b6170011a09ff6&product=sticky-share-buttons"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<!-- Theme files
============================================ -->
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/application.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/homepage.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/addtocart.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/pathLoader.js')}}"></script>
<!--<script type="text/javascript" src="js/themejs/toppanel.js"></script>-->
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/cpanel.js')}}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
{{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>--}}

<script type="text/javascript">
    <!--
    var $typeheader = 'header-home8';
    //-->
    $('#sp-cpanel_btn > i').hide();
    $('#sp-cpanel_btn').hide();

    $('.mainNav').on('click',function(){
        $(this).addClass('home');
    })

    $('#create-shop').on('click',function(){
        $('#create-shop-modal').modal()
    })

    $('#header > div.header-bottom > div > div > div > div > nav > div > div.megamenu-wrapper > div > div > ul li').css('font-weight','bolder')

    $('#name').on('change',function(){
        var str = $(this).val();
        str = str.replace(/\s+/g, '-').toLowerCase();
        $('#domain').val(str+'.shopaholicks.com/shop')
    })


    $('#add-new-shop').on('submit',function(e){
        e.preventDefault();

        $.post($(this).attr('action'),$(this).serialize(),function(){

        }).success(function(){
            location.href="/store/store-settings";

        }).fail(function(data){
            for (var field in data.responseJSON) {
                var el = $(':input[name="' + field + '"]');
                el.parent('.form-group').addClass('has-error');
                el.next('.help-block').text(data.responseJSON[field][0]);
                el.next('.validation_error').text(data.responseJSON[field][0]);
//                swal("Error!", data.responseJSON[field][0], "error");

            }
        })


    })

//    $('.typeahead').on('change',function(){
//        alert('hello alert');
//        $('#search-form').submit();
//
//    })

    var prefetch = [];

    function buildSearch(_data){
        $(".search-query").select2({
            data: _data,
            ajax: {
                url: "/search-query",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        address: params.term, // search term
                        page: params.page
                    };
                },

                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 2,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page

        });
    }

    buildSearch(prefetch);

    function formatRepo (area) {
        if (area.loading) return area.text;

        var markup = "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" + area.name + "</div>";

        markup += "</div></div>";

        return markup;
    }

    function formatRepoSelection (area) {
        if(area.text){
            return area.text;
        }
        return area.name;
    }


    $('.search-query').on('change',function(){
        $('#search-form').submit();

    })



</script>

    {{--<script src="https://js.pusher.com/4.0/pusher.min.js"></script>--}}
    {{--<script>--}}

        {{--// Enable pusher logging - don't include this in production--}}
        {{--Pusher.logToConsole = true;--}}

        {{--var pusher = new Pusher('b0fb81b15a4dfff2c4f4', {--}}
            {{--cluster: 'eu',--}}
            {{--encrypted: true--}}
        {{--});--}}

        {{--var channel = pusher.subscribe('chat-room.1');--}}
        {{--channel.bind('App\\Events\\ChatMessageReceived', function(data) {--}}
            {{--alert(data.chatMessage.message);--}}
        {{--});--}}
    {{--</script>--}}

@yield('scripts')
</body>

</html>