
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic page needs
	============================================ -->
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />

    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon
    ============================================ -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
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
    <link href="{{asset('frontend_2/css/footer1.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_2/css/header1.css')}}" rel="stylesheet">
    <link id="color_scheme" href="{{asset('frontend_2/css/theme.css')}}" rel="stylesheet">

    <link href="{{asset('frontend_2/css/responsive.css')}}" rel="stylesheet">

    <style>
        ul.megamenu > li > a:hover, ul.megamenu > li.active > a, ul.megamenu > li.home > a, ul.megamenu > li:hover > a {
            background-color: rgba(255,255,255,0.0);
            color: white;
        }

        .header-bottom {
            /*background: #000;*/
            background: {{$store->colour}};
            min-height: 45px;
            margin-bottom: 15px;
        }
    </style>



</head>

<body class="res layout-subpage banners-effect-6">
<div id="wrapper" class="wrapper-full ">
    <!-- Header Container  -->
    <header id="header" class=" variantleft type_1">
        <!-- Header Top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">
                        <div class="form-group languages-block ">
                            <form action="" method="post" enctype="multipart/form-data" id="bt-language">
                                <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('frontend_2/image/demo/flags/gb.png')}}" alt="English" title="English">
                                    <span class="">English</span>
                                    <span class="fa fa-angle-down"></span>
                                </a>
                            </form>
                        </div>

                        <div class="form-group currencies-block">
                            <form action="" method="post" enctype="multipart/form-data" id="currency">
                                <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon icon-credit "></span> GHS <span class="fa fa-angle-down"></span>
                                </a>
                                {{--<ul class="dropdown-menu btn-xs">--}}
                                {{--<li> <a href="#">(€)&nbsp;Euro</a></li>--}}
                                {{--<li> <a href="#">(£)&nbsp;Pounds	</a></li>--}}
                                {{--<li> <a href="#">($)&nbsp;US Dollar	</a></li>--}}
                                {{--</ul>--}}
                            </form>
                        </div>
                    </div>
                    <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
                        <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                <li class="account" id="my_account">
                                    <a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span >My Account</span> <span class="fa fa-angle-down"></span></a>
                                    {{--<ul class="dropdown-menu ">--}}
                                    {{--<li><a href="register.html"><i class="fa fa-user"></i> Register</a></li>--}}
                                    {{--<li><a href="login.html"><i class="fa fa-pencil-square-o"></i> Login</a></li>--}}
                                    {{--</ul>--}}
                                </li>
                                <li class="wishlist"><a href="wishlist.html" id="wishlist-total" class="top-link-wishlist" title="Wish List (2)"><span>Wish List (2)</span></a></li>
                                <li class="checkout"><a href="checkout.html" class="top-link-checkout" title="Checkout"><span >Checkout</span></a></li>
                                <li class="login"><a href="cart.html" title="Shopping Cart"><span >Shopping Cart</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->

        <!-- Header center -->
        <div class="header-center left">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
                        <?php $store = \App\Store::whereUserId($user_id)->first() ?>
                        <a href=""><img src='{{asset("images/stores")}}/{{$store->image}}' title="{{$store->name}}" alt="{{$store->name}}" /></a>
                    </div>
                    <!-- //end Logo -->

                    <!-- Search -->
                    <div id="sosearchpro" class="col-sm-7 search-pro">
                        <form method="GET" action="http://demo.smartaddons.com/templates/html/market/index.html">
                            <div id="search0" class="search input-group">
                                <div class="select_category filter_type icon-select">
                                    <select class="no-border" name="category_id">
                                        <option value="0">All Categories</option>
                                        <option value="78">Apparel</option>
                                        <option value="77">Cables &amp; Connectors</option>
                                        <option value="82">Cameras &amp; Photo</option>
                                        <option value="80">Flashlights &amp; Lamps</option>
                                        <option value="81">Mobile Accessories</option>
                                        <option value="79">Video Games</option>
                                        <option value="20">Jewelry &amp; Watches</option>
                                        <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                        <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                        <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                    </select>
                                </div>

                                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
						<span class="input-group-btn">
						<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
						</span>
                            </div>
                            <input type="hidden" name="route" value="product/search" />
                        </form>
                    </div>
                    <!-- //end Search -->

                    <!-- Secondary menu -->
                    <div class="col-md-2 col-sm-5 col-xs-12 shopping_cart pull-right" id="shopping-cart">
                        <!--cart-->
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
                                                <td class="text-left"> <a class="cart_product_name" href="product.html">{{$content->name}}</a> </td>
                                                <td class="text-center"> x{{$content->qty}} </td>
                                                <td class="text-center"> GHS {{$content->price}} </td>
                                                <td class="text-right">
                                                    <a href="product.html" class="fa fa-edit"></a>
                                                </td>
                                                <td class="text-right">
                                                    <a onclick="cart.remove('{{$content->rowId}}','{{$user_id}}');" class="fa fa-times fa-delete"></a>
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
                                        <p class="text-right"> <a class="btn view-cart" href="{{url('/store/checkout',$user_id)}}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-mega checkout-cart" href="{{url('store/checkout',$user_id)}}"><i class="fa fa-share"></i>Checkout</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--//cart-->
                    </div>

                </div>

            </div>
        </div>
        <!-- //Header center -->

        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">

                    <div class="sidebar-menu col-md-3 col-sm-6 col-xs-12 ">
                        <div class="responsive so-megamenu ">
                            <div class="so-vertical-menu no-gutter compact-hidden">
                                <nav class="navbar-default">

                                    <div class="container-megamenu vertical  ">

                                        <div id="menuHeading">
                                            <div class="megamenuToogle-wrapper">
                                                <div class="megamenuToogle-pattern">
                                                    <div class="container">
                                                        <div>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                        MarketPlace
                                                        <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="navbar-header">
                                            <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">


                                        </div>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <!-- Main menu -->
                    <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12 ">
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

                                                        <a href='{{url("stores/$slug/$user_id")}}'>Home</a>
                                                    </li>

                                                    @foreach($categories as $category)
                                                        <li class="{{$category->name}}">
                                                            <a href='{{url("/stores/category/evergreen-store/$user_id/$category->id")}}'>{{$category->name}} </a>
                                                        </li>

                                                    @endforeach

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


    <!-- Footer Container -->
    <footer class="footer-container type_footer1">


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


<!-- Cpanel Block -->
<div id="sp-cpanel_btn" class="isDown visible-lg">
    <i class="fa fa-cog"></i>
</div>

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


<!-- Theme files
============================================ -->


<script type="text/javascript" src="{{asset('frontend_2/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/addtocart.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/application.js')}}"></script>
<script type="text/javascript"><!--

    //--></script>
</body>

</html>