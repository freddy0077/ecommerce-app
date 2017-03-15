
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
                                                        <a href="index.html">Home <b class="caret"></b></a>
                                                        <div class="sub-menu" style="width:100%;" >
                                                            <div class="content" >
                                                                <div class="row">
                                                                    <div class="col-md-15">
                                                                        <a href="index.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-1.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - (Default)</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-2.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 2</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home3.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-3.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 3</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home4.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-4.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 4</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home5.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-5.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 5</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home6.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="{{asset('frontend_2/image/demo/feature/home-6.jpg')}}" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 6</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home7.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="image/demo/feature/home-7.jpg" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 7</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="home8.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="image/demo/feature/home-8.jpg" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout 8</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="html_width_RTL/index.html" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="image/demo/feature/home-rtl.jpg" alt="">
																					<span class="btn btn-default">Read More</span>
																				</span>
                                                                            <h3 class="figcaption">Home page - Layout RTL</h3>
                                                                        </a>

                                                                    </div>
                                                                    <div class="col-md-15">
                                                                        <a href="#" class="image-link">
																				<span class="thumbnail">
																					<img class="img-responsive img-border" src="image/demo/feature/comming-soon.png" alt="">

																				</span>
                                                                            <h3 class="figcaption">Comming soon</h3>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

    <!-- Block slideshow  -->
    <section class="so-slideshow ">
        <div class="container">
            <div class="row">
                <div id="so-slideshow">
                    <div class="module slideshow--home8 no-margin">
                        <div class="item">
                            <a href="#"><img src="{{asset('frontend_2/image/demo/slider/home8/slide1-id12.jpg')}}" alt="slider1" class="img-responsive"></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{asset('frontend_2/image/demo/slider/home8/slide2-id12.jpg')}}" alt="slider2" class="img-responsive"></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{asset('frontend_2/image/demo/slider/home8/slide3-id12.jpg')}}" alt="slider3" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="loadeding"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Block slideshow  -->

    <!-- Main Container  -->
    <div class="main-container ">
        <div class="container">
            <div class="row">
                <div id="content-top" class="clearfix" >

                    <div class="container-full home8--banner1">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 banner-item">

                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/cat1-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <h2>Men's Shoes</h2>
                                        <p>ON YOUR MARK, GET SET, GO</p>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>

                                </div>

                                <div class="col-sm-4 col-xs-12 banner-item hidden-xs">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/cat2-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <h2>Women's Shoes</h2>
                                        <p>ON YOUR MARK, GET SET, GO</p>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>

                                </div>

                                <div class="col-sm-4 col-xs-12 banner-item hidden-xs">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/cat3-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <h2>Kid's Shoes</h2>
                                        <p>ON YOUR MARK, GET SET, GO</p>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div id="content" class="clearfix">
                    <div class="col-xs-12 clearfix">

                        <div class="module so-extraslider--new titleLine">
                            <h3 class="modtitle">Products by Popularity</h3>
                            <div id="so_extraslider1" >

                                <!-- Begin extraslider-inner -->
                                <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                    @foreach($products as $product)
                                    <!--Begin Items-->
                                    <div class="ltabs-item product-layout">
                                        <div class="product-item-container">
                                            <div class="left-block">
                                                <div class="product-image-container second_img">
                                                    <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}'  alt="{{$product->name}}" class="img-responsive" />
                                                    <img src="{{asset("images/products/$product->image")}}"  alt="{{$product->name}}" class="img-responsive img_0" />
                                                </div>
                                                <!--Sale Label-->
                                                {{--<span class="label label-sale">Sale</span>--}}
                                                <span class="label label-new">New</span>

                                                <!--full quick view block-->
                                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                                                <!--end full quick view block-->
                                            </div>
                                            <div class="right-block">
                                                <div class="caption">
                                                    <h4><a href="">{{$product->name}} </a></h4>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="price">
                                                        <span class="price-new">GHS {{$product->price}}</span>
                                                        <span class="price-old">GHS {{$product->price}}</span>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="addToCart addToCart--notext" type="button"  onclick="cart.add('42', '1');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                                                    <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                    <button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-thumbs-up"></i>{{$product->like_counts}}  </button>
                                                    <button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>

                                                </div>
                                            </div><!-- right block -->
                                        </div>
                                    </div>

                                    @endforeach

                                    <!--End Items-->

                                </div>
                                <!--End extraslider-inner -->

                                <br>
                                <br>

                                <!-- Begin extraslider-inner -->
                                <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                    @foreach($products as $product)
                                            <!--Begin Items-->
                                    <div class="ltabs-item product-layout">
                                        <div class="product-item-container">
                                            <div class="left-block">
                                                <div class="product-image-container second_img">
                                                    <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}'  alt="{{$product->name}}" class="img-responsive" />
                                                    <img src="{{asset("images/products/$product->image")}}"  alt="{{$product->name}}" class="img-responsive img_0" />
                                                </div>
                                                <!--Sale Label-->
                                                {{--<span class="label label-sale">Sale</span>--}}
                                                <span class="label label-new">New</span>

                                                <!--full quick view block-->
                                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                                                <!--end full quick view block-->
                                            </div>
                                            <div class="right-block">
                                                <div class="caption">
                                                    <h4><a href="">{{$product->name}} </a></h4>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="price">
                                                        <span class="price-new">GHS {{$product->price}}</span>
                                                        <span class="price-old">GHS {{$product->price}}</span>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="addToCart addToCart--notext" type="button"  onclick="cart.add('42', '1');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                                                    <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                    <button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-thumbs-up"></i>{{$product->like_counts}}  </button>
                                                    <button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>

                                                </div>
                                            </div><!-- right block -->
                                        </div>
                                    </div>

                                    @endforeach

                                            <!--End Items-->

                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>
                        <div class="module so-extraslider--new titleLine">
                            <h3 class="modtitle">SHOP FROM SEVERAL CATEGORIES</h3>
                            <div id="so_extraslider1" >

                                <!-- Begin extraslider-inner -->
                                <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                    @foreach($categories as $category)
                                    <!--Begin Items-->
                                    <div class="ltabs-item product-layout">
                                        <div class="product-item-container">
                                            <h4><a href="">{{$category->name}} </a></h4>

                                            <div class="left-block">
                                                <div class="product-image-container second_img">
                                                    <img src="{{asset('frontend_2/image/demo/shop/product/home8/1_2_12.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                    {{--<img src="{{asset('frontend_2/image/demo/shop/product/home8/8_3.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive img_0" />--}}
                                                </div>
                                                <!--Sale Label-->
                                                {{--<span class="label label-sale">Sale</span>--}}
                                                {{--<span class="label label-new">New</span>--}}

                                                <!--full quick view block-->
                                                {{--<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>--}}
                                                <!--end full quick view block-->
                                            </div>
                                            <div class="right-block">
                                                {{--<div class="caption">--}}
{{--                                                    <h4><a href="product.html">{{$category->name}} </a></h4>--}}
                                                    {{--<div class="ratings">--}}
                                                        {{--<div class="rating-box">--}}
                                                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                            {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="price">--}}
                                                        {{--<span class="price-new">$50.00</span>--}}
                                                        {{--<span class="price-old">$62.00</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="button-group">--}}
                                                    {{--<button class="addToCart addToCart--notext" type="button"  onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>--}}
                                                    {{--<button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>--}}
                                                    {{--<button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>--}}
                                                {{--</div>--}}
                                            </div><!-- right block -->
                                        </div>
                                    </div>

                                    <!--End Items-->

                                    @endforeach

                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>

                        <div class="module container-full home8--banner2">
                            <div class="container"><a href="#" title="Static Image"><img src="{{asset('frontend_2/image/demo/cms/home8/image2-id12.png')}}" alt="Static Image"></a></div>
                        </div>

                        <div class="module container-full home8--banner3">

                            <div class="owl-banner__slider">
                                <div class="banner__item">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/image3-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <p>PUSH THE LIMITS OF SPEED</p>
                                        <h3>A MODERN CLASSIC</h3>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>
                                </div>
                                <div class="banner__item">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/image4-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <p>PUSH THE LIMITS OF SPEED</p>
                                        <h3>WARM WEATHER STYLE</h3>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>
                                </div>
                                <div class="banner__item">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/image5-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <p>PUSH THE LIMITS OF SPEED</p>
                                        <h3>A LITTLE BIT OF LUXURY</h3>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>
                                </div>
                                <div class="banner__item">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/image3-id12.jpg')}}" alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <p>PUSH THE LIMITS OF SPEED</p>
                                        <h3>A MODERN CLASSIC</h3>
                                        <a title="Shop Now" href="#">Shop Now &gt;&gt;</a>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="products-slider-bottom">
                            <div class="row">

                                <div class="module so-extraslider--new titleLine col-sm-6 col-xs-12">
                                    <h3 class="modtitle modtitle--small">Sale</h3>
                                    <div id="so_extraslider1__home8">

                                        <!-- Begin extraslider-inner -->
                                        <div class="so-extraslider products-list grid product-style__8"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="3" data-items_column1="2" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                            <!--Begin Items-->
                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/10_7.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-sale">Sale</span>

                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Qurem mazem numa dikam</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$50.00</span>
                                                                <span class="price-old">$62.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container  ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/8_3.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-sale">Sale</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="">Suma fuma direm mase</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$150.00</span>
                                                                <span class="price-old">$125.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>
                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/7_7.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-sale">Sale</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Pumasi dema nones mame</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$120.00</span>
                                                                <span class="price-old">$115.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/5_2_9.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-sale">Sale</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Taetem hasem razem pokam </a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$120.00</span>
                                                                <span class="price-old">$162.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <!--End Items-->

                                        </div>
                                        <!--End extraslider-inner -->
                                    </div>
                                </div>
                                <div class="module so-extraslider--new titleLine col-sm-6 col-xs-12">
                                    <h3 class="modtitle modtitle--small">Most Viewed </h3>
                                    <div id="so_extraslider2__home8" class="so-extraslider--home8 ">

                                        <!-- Begin extraslider-inner -->
                                        <div class="so-extraslider products-list grid product-style__8"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="3" data-items_column1="2" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                            <!--Begin Items-->
                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/1_2_12.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/3_3_15.jpg')}}"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->


                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Qurem mazem numa..</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$50.00</span>
                                                                <span class="price-old">$62.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container  ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/3_3_15.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-new">new</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Suma fuma direm mase</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$150.00</span>

                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>
                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/2_4_14.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-new">new</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Pumasi dema nones mame</a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$120.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/3_3_15.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <span class="label label-sale">Sale</span>
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Taetem hasem razem pokam </a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>

                                                            <div class="price">
                                                                <span class="price-new">$120.00</span>
                                                                <span class="price-old">$162.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>
                                            <div class="ltabs-item product-layout">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container  ">
                                                            <img src="{{asset('frontend_2/image/demo/shop/product/home8/4_3_52.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                        </div>
                                                        <!--Sale Label-->
                                                        <!--<span class="label label-sale">Sale</span>-->
                                                        <!--full quick view block-->
                                                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                                        <!--end full quick view block-->
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="product.html">Trai Kuma pekaem mame </a></h4>
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <span class="price-new">$110.00</span>
                                                            </div>
                                                        </div>

                                                        <div class="button-group">
                                                            <button class="addToCart addToCart--notext" type="button" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="button-group__text">Add to Cart</span></button>
                                                            <button class="wishlist" type="button" onclick="wishlist.add('42');"><i class="fa fa-heart"></i>  </button>
                                                            <button class="compare" type="button" onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>
                                                        </div>
                                                    </div><!-- right block -->
                                                </div>
                                            </div>

                                            <!--End Items-->


                                        </div>
                                        <!--End extraslider-inner -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="module titleLine">
                            <h3 class="modtitle modtitle--small">Latest Blog</h3>
                            <div class="modcontent clearfix">
                                <div class="yt-content-slider slider-blog-post"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="4" data-items_column1="3" data-items_column2="2"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                    <div class="item-post">
                                        <div class="banners image-blog ">
                                            <div>
                                                <a  title="Vestibulum ipsum a ornare lectus" href="#">
                                                    <img src="{{asset('frontend_2/image/demo/blog/blo1.jpg')}}" alt="Blog Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info-blog">
                                            <div class="date-post-title">
                                                <div class="date-post">
                                                    <div class="day">26</div>
                                                    <div class="month">Nov</div>
                                                </div>
                                                <h2 class="postTitle"><a href="blog-detail.html">Vestibulum ipsum a ornare lectus</a></h2>
                                            </div>
                                            <div class="postContent">Fusce sem lacus, sodales sit amet eros a, pharetra feugiat nisl. Integer nunc leo, mollis a libero sit amet, sagittis...</div>
                                        </div>
                                    </div>
                                    <div class="item-post">
                                        <div class="banners image-blog ">
                                            <div>
                                                <a class="img-link" title="Vestibulum ipsum a ornare lectus" href="#">
                                                    <img src="{{asset('frontend_2/image/demo/blog/blo2.jpg')}}" alt="Blog Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info-blog">
                                            <div class="date-post-title">
                                                <div class="date-post">
                                                    <div class="day">26</div>
                                                    <div class="month">Nov</div>
                                                </div>
                                                <h2 class="postTitle"><a href="blog-detail.html">Vestibulum ipsum a ornare lectus</a></h2>
                                            </div>
                                            <div class="postContent">Fusce sem lacus, sodales sit amet eros a, pharetra feugiat nisl. Integer nunc leo, mollis a libero sit amet, sagittis...</div>
                                        </div>
                                    </div>
                                    <div class="item-post">
                                        <div class="banners image-blog ">
                                            <div>
                                                <a class="img-link" title="Vestibulum ipsum a ornare lectus" href="#">
                                                    <img src="{{asset('frontend_2/image/demo/blog/blo3.jpg')}}" alt="Blog Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info-blog">
                                            <div class="date-post-title">
                                                <div class="date-post">
                                                    <div class="day">26</div>
                                                    <div class="month">Nov</div>
                                                </div>
                                                <h2 class="postTitle"><a href="blog-detail.html">Vestibulum ipsum a ornare lectus</a></h2>
                                            </div>
                                            <div class="postContent">Fusce sem lacus, sodales sit amet eros a, pharetra feugiat nisl. Integer nunc leo, mollis a libero sit amet, sagittis...</div>
                                        </div>
                                    </div>
                                    <div class="item-post">
                                        <div class="banners image-blog ">
                                            <div>
                                                <a class="img-link" title="Vestibulum ipsum a ornare lectus" href="#">
                                                    <img src="image/demo/blog/blo4.jpg" alt="Blog Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info-blog">
                                            <div class="date-post-title">
                                                <div class="date-post">
                                                    <div class="day">26</div>
                                                    <div class="month">Nov</div>
                                                </div>
                                                <h2 class="postTitle"><a href="blog-detail.html">Vestibulum ipsum a ornare lectus</a></h2>
                                            </div>
                                            <div class="postContent">Fusce sem lacus, sodales sit amet eros a, pharetra feugiat nisl. Integer nunc leo, mollis a libero sit amet, sagittis...</div>
                                        </div>
                                    </div>
                                    <div class="item-post">
                                        <div class="banners image-blog ">
                                            <div>
                                                <a class="img-link" title="Vestibulum ipsum a ornare lectus" href="#">
                                                    <img src="{{asset('frontend_2/image/demo/blog/blo5.jpg')}}" alt="Blog Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="info-blog">
                                            <div class="date-post-title">
                                                <div class="date-post">
                                                    <div class="day">26</div>
                                                    <div class="month">Nov</div>
                                                </div>
                                                <h2 class="postTitle"><a href="blog-detail.html">Vestibulum ipsum a ornare lectus</a></h2>
                                            </div>
                                            <div class="postContent">Fusce sem lacus, sodales sit amet eros a, pharetra feugiat nisl. Integer nunc leo, mollis a libero sit amet, sagittis...</div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="module">
                            <div class="yt-content-slider yt-content-slider--arrow2"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="35" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                <div class="item">
                                    <a title="Brand" href="#"><img src="{{asset('frontend_2/image/demo/brand/home5/logo-1.png')}}" alt="Brand">
                                    </a>
                                </div>
                                <div class="item">
                                    <a title="Brand" href="#"><img src="{{asset('frontend_2/image/demo/brand/home5/logo-1.png')}}" alt="Brand">
                                    </a>
                                </div>
                                <div class="item">
                                    <a title="Brand" href="#"><img src="{{asset('frontend_2/image/demo/brand/home5/logo-1.png')}}" alt="Brand">
                                    </a>
                                </div>
                                <div class="item">
                                    <a title="Brand" href="#"><img src="{{asset('frontend_2/image/demo/brand/home5/logo-1.png')}}" alt="Brand">
                                    </a>
                                </div>
                                <div class="item">
                                    <a title="Brand" href="#"><img src="{{asset('frontend_2/image/demo/brand/home5/logo-1.png')}}" alt="Brand">
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Main Container -->

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
<!-- Social widgets -->
<section class="social-widgets visible-lg">
    <ul class="items">
        <li class="item item-01 facebook"> <a href="php/facebook8859.html?account=envato" class="tab-icon"><span class="fa fa-facebook"></span></a>
            <div class="tab-content">
                <div class="title">
                    <h5>FACEBOOK</h5>
                </div>
                <div class="loading">
                    <img src="image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
                </div>
            </div>
        </li>
        <li class="item item-02 twitter"> <a href="php/twitterfdaa.html?account_twitter=envato" class="tab-icon"><span class="fa fa-twitter"></span></a>
            <div class="tab-content">
                <div class="title">
                    <h5>TWITTER FEEDS</h5>
                </div>
                <div class="loading">
                    <img src="image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
                </div>
            </div>
        </li>
        <li class="item item-03 youtube"> <a href="php/youtubevideo2de8.html?account_video=PY2RLgTmiZY" class="tab-icon"><span class="fa fa-youtube"></span></a>
            <div class="tab-content">
                <div class="title">
                    <h5>YouTube</h5>
                </div>
                <div class="loading"> <img src="image/theme/lazy-loader.gif" class="ajaxloader" alt="loader"></div>
            </div>
        </li>
    </ul>
</section>	<!-- End Social widgets -->

<!-- Cpanel Block -->
<div id="sp-cpanel_btn" class="isDown visible-lg">
    <i class="fa fa-cog"></i>
</div>
<div id="sp-cpanel" class="sp-delay">
    <h2 class="sp-cpanel-title"> Demo Options <span class="sp-cpanel-close"> <i class="fa fa-times"> </i></span></h2>
    <div id="sp-cpanel_settings">

        <div class="panel-group ">
            <label>Header style</label>
            <div class="group-boxed">
                <select id="change_header_type" name="cpheaderstype" class="form-control" onchange="headerTypeChange(this.value);">
                    <option value="header-home1" >Header 1</option>
                    <option value="header-home2" >Header 2</option>
                    <option value="header-home3" >Header 3</option>
                    <option value="header-home4" >Header 4</option>
                    <option value="header-home5" >Header 5</option>
                    <option value="header-home6" >Header 6</option>
                    <option value="header-home8" >Header 8</option>
                </select>
            </div>
        </div>


        <div class="panel-group">
            <label>Body Image</label>

            <div class="group-pattern">
                <div data-pattern="28"  class="img-pattern"><img src="image/theme/patterns/28.png" alt="pattern 28"></div>
                <div data-pattern="29"  class="img-pattern"><img src="image/theme/patterns/29.png" alt="pattern 29"></div>
                <div data-pattern="30"  class="img-pattern"><img src="image/theme/patterns/30.png" alt="pattern 30"></div>
                <div data-pattern="31"  class="img-pattern"><img src="image/theme/patterns/31.png" alt="pattern 31"></div>
                <div data-pattern="32"  class="img-pattern"><img src="image/theme/patterns/32.png" alt="pattern 32"></div>
                <div data-pattern="33"  class="img-pattern"><img src="image/theme/patterns/33.png" alt="pattern 33"></div>
                <div data-pattern="34"  class="img-pattern"><img src="image/theme/patterns/34.png" alt="pattern 34"></div>
                <div data-pattern="35"  class="img-pattern"><img src="image/theme/patterns/35.png" alt="pattern 35"></div>
                <div data-pattern="36"  class="img-pattern"><img src="image/theme/patterns/36.png" alt="pattern 36"></div>
                <div data-pattern="37"  class="img-pattern"><img src="image/theme/patterns/37.png" alt="pattern 37"></div>
                <div data-pattern="38"  class="img-pattern"><img src="image/theme/patterns/38.png" alt="pattern 38"></div>
                <div data-pattern="39"  class="img-pattern"><img src="image/theme/patterns/39.png" alt="pattern 39"></div>
                <div data-pattern="40"  class="img-pattern"><img src="image/theme/patterns/40.png" alt="pattern 40"></div>
                <div data-pattern="41"  class="img-pattern"><img src="image/theme/patterns/41.png" alt="pattern 41"></div>
                <div data-pattern="42"  class="img-pattern"><img src="image/theme/patterns/42.png" alt="pattern 42"></div>
                <div data-pattern="43"  class="img-pattern"><img src="image/theme/patterns/43.png" alt="pattern 43"></div>
                <div data-pattern="44"  class="img-pattern"><img src="image/theme/patterns/44.png" alt="pattern 44"></div>
                <div data-pattern="45"  class="img-pattern"><img src="image/theme/patterns/45.png" alt="pattern 45"></div>
            </div>
            <p class="label-sm">Background only applies for Boxed,Framed, Rounded Layout</p>
        </div>
        <div class=group-boxed>			<label>More items by magentech</label>			<div id="demo_2" class="tb_demo tb_hover_main_color">			<a class="tb_thumb" href="https://themeforest.net/item/maxshop-multipurpose-ecommerce-html-template/19277593?s_rank=3" target="_blank">			  <img src="intro/img/ads/maxshop-1.jpg" alt="Maxshop html">			</a>			</div>		</div>
        <div class="reset-group">
            <a href="index.html" class="btn btn-success " onclick="ResetAll()">Reset</a>
        </div>

    </div>

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
</script>
</body>

</html>