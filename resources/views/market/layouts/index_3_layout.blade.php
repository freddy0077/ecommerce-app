
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic page needs
	============================================ -->
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="Magentech">
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


</head>

<body class="common-home res layout-home8 ">


<div id="wrapper" class="wrapper-full banners-effect-1">
    <!-- Preloading Screen -->
    <div class="ip-header">
        <h1 class="ip-logo">
            <a href="#">
                <img src="{{url('frontend_2/image/logo.png')}}" alt="Shopaholicks">
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
                        <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                @if(\Illuminate\Support\Facades\Auth::check() && Auth::user()->has_store == true)
                                    <li class="account" id="my_account">
                                        <a href="{{url('store/dashboard')}}" title="My Account" class="btn btn-xs dropdown-toggle" > <i class="fa fa-user" ></i> My Account </a>
                                    </li>
                                @endif
                                <li class="checkout"><a href="{{url('/store/checkout')}}" class="top-link-checkout" title="Checkout"><i class="fa fa-check-square-o" ></i> Checkout</a></li>
                                @if(Auth::check())
                                    <li class="wishlist"><a href="{{url('/fancies')}}" class="top-link-wishlist" title="wishlist"><i class="fa fa-heart" ></i> My Fancies</a></li>

                                    <li class="signin"><a href="{{url('/feeds')}}" class="top-link-checkout" title="login"><i class="fa fa-user" ></i> Profile</a></li>

                                @else
                                    <li class="signin"><a href="{{url('/login')}}" class="top-link-checkout" title="login"><i class="fa fa-lock" ></i> Sign In</a></li>
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
                        <a href="index.html">
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
                                        @foreach(\App\ProductCategory::all('id','name') as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Enter keywords to search..." name="search">
								<span class="input-group-btn">
								<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
								</span>
                            </div>
                            <input type="hidden" name="route" value="product/search">
                        </form>
                    </div>
                    <!-- //Search -->

                    <!-- Main Menu -->
                    <div class="phone-contact col-md-2  hidden-md hidden-sm hidden-xs">
                        <div class="inner-info">
                            <strong>Call us Now:</strong><br>
                            {{--<span>Toll free:  0123-456-789</span>--}}
                        </div>
                    </div>
                    <!-- //Main Menu -->

                    <!-- Shopping Cart -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 shopping_cart pull-right">
                        <!--cart-->
                        <div id="cart" class="btn-group btn-shopping-cart">
                            <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                                <div class="shopcart">
                                    <span class="handle pull-left"></span>
                                    <span class="title">Shopping Cart</span>
                                    <p class="text-shopping-cart cart-total-full">2 item(s) - GHS 1,262.00 </p>
                                </div>
                            </a>

                            <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
                                <li>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html"> <img src="{{asset('frontend_2/image/demo/shop/product/resize/2.jpg')}}" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name" href="product.html">Filet Mign</a> </td>
                                            <td class="text-center"> x1 </td>
                                            <td class="text-center"> $1,202.00 </td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html"> <img src="{{asset('frontend_2/image/demo/shop/product/resize/3.jpg')}}" style="width:70px" alt="Canon EOS 5D" title="Canon EOS 5D" class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name" href="">Canon EOS 5D</a> </td>
                                            <td class="text-center"> x1 </td>
                                            <td class="text-center"> $60.00 </td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
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
                                                <td class="text-right">$1,060.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                </td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>VAT (20%)</strong>
                                                </td>
                                                <td class="text-right">$200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">$1,262.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-right"> <a class="btn view-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a> </p>
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
                                                <ul class="megamenu " data-transition="slide" data-animationtime="250">
                                                    <li class="home">
                                                        <a href="{{url('/')}}">Home</a>

                                                    </li>

                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="{{url('/category')}}" class="clearfix">
                                                            <strong>ALL SHOPS</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>

                                                    @foreach(\App\ProductCategory::all('id','name') as $category)

                                                        <li class="">
                                                            <p class="close-menu"></p>
                                                            <a href="{{url('/category',$category->id)}}" class="clearfix">
                                                                <strong>{{$category->name}}</strong>
                                                                <span class="label"></span>
                                                            </a>
                                                        </li>


                                                    @endforeach


                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="{{url('/category')}}" class="clearfix">
                                                            <strong>BLOG</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>
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
                                                </ul>

                                            </div>
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
                                    <div class="policy policy1 col-sm-4 col-xs-12">
                                        <div class="policy-inner">
                                            <i class="ico-policy"></i>
                                            <h4>30 days return</h4>
                                            <span>Money back guarantee</span>
                                        </div>
                                    </div>
                                    <div class="policy policy2 col-sm-4 col-xs-12">
                                        <div class="policy-inner">
                                            <i class="ico-policy"></i>
                                            <h4>free shipping on $30</h4>
                                            <span>on all orders over $99</span>
                                        </div>
                                    </div>
                                    <div class="policy policy3 col-sm-4 col-xs-12">
                                        <div class="policy-inner">
                                            <i class="ico-policy"></i>
                                            <h4>Safe shopping</h4>
                                            <span>Save up to 50% now  </span>
                                        </div>
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
                                <a title="Facebook" href="http://www.facebook.com/MagenTech" target="_blank">
                                    <span class="fa fa-facebook icon-circled icon-color"></span>
                                </a>

                                <a title="Twitter" href="https://twitter.com/magentech" target="_blank">
                                    <span class="fa fa-twitter icon-circled icon-color"></span>
                                </a>

                                <a title="Google+" href="https://plus.google.com/u/0/+Smartaddons" target="_blank">
                                    <span class="fa fa-google-plus icon-circled icon-color"></span>
                                </a>


                                <a title="Pinterest" href="#" target="_blank">
                                    <span class="fa fa-instagram icon-circled icon-color"></span>
                                </a>


                            </div>

                        </div>
                    </div>
                    <hr class="footer-lines ">
                    <div class="col-sm-6 col-md-3 box-information">
                        <div class="module clearfix">
                            <h3 class="modtitle">Information</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="order-history.html">Order history</a></li>
                                    <li><a href="order-information.html">Order information</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 box-service">
                        <div class="module clearfix">
                            <h3 class="modtitle">Customer Service</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="return.html">Returns</a></li>
                                    <li><a href="sitemap.html">Site Map</a></li>
                                    <li><a href="{{url('/feeds')}}">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 box-account">
                        <div class="module clearfix">
                            <h3 class="modtitle">My Account</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="gift-voucher.html">Gift Vouchers</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#" target="_blank">Our Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 collapsed-block ">
                        <div class="module clearfix">
                            <h3 class="modtitle">Contact Us	</h3>
                            <div class="modcontent">
                                <ul class="contact-address">
                                    <li><span class="fa fa-map-marker"></span> My Company, 42 avenue des Champs Elysées 75000 Paris France</li>
                                    <li><span class="fa fa-envelope-o"></span> Email: <a href="#"> sales@yourcompany.com</a></li>
                                    <li><span class="fa fa-phone">&nbsp;</span> Phone 1: 0123456789 <br>Phone 2: (123) 4567890</li>
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
                    <div class="col-sm-5 copyright-text"> © 2016 Market. All Rights Reserved. </div>
                    <div class="col-sm-7">
                        <div class="block-payment text-right"><img src="image/demo/content/payment.png" alt="payment" title="payment" ></div>
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


<!-- Theme files
============================================ -->
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/application.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/homepage.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/addtocart.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/pathLoader.js')}}"></script>
<!--<script type="text/javascript" src="js/themejs/toppanel.js"></script>-->
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/cpanel.js')}}"></script>

<script type="text/javascript">
    <!--
    var $typeheader = 'header-home8';
    //-->
    $('#sp-cpanel_btn > i').hide();
    $('#sp-cpanel_btn').hide();

        $('.like').on('click',function(event){
            event.preventDefault();
            var product_id = $(this).data('id')

            @if(Auth::check())

            $.post("{{secure_url('/like-it')}}/"+product_id,function(data){
                $('.counts-'+product_id).text(data.likes)
            });

            @elseif(Auth::guest())
            $('#login-modal').modal();
            @endif


        });

        {{--function fancy(product_id) {--}}
            {{--@if(Auth::check())--}}

             {{--$.post("{{secure_url('/fancy-it')}}/"+product_id,function(data){--}}
                {{--$('.fancy').click(function(){--}}
                    {{--$(this).addClass('fa fa-spinner fa-spin')--}}

                {{--})--}}

            {{--});--}}

            {{--@elseif(Auth::guest())--}}
            {{--$('#login-modal').modal();--}}
            {{--@endif--}}

        {{--}--}}

        function like(product_id) {
            @if(Auth::check())

             $.post("{{secure_url('/like-it')}}/"+product_id,function(data){

            });

            @elseif(Auth::guest())
            $('#login-modal').modal();
            @endif
    }
</script>

@yield('scripts')
</body>

</html>