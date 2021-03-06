<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{secure_asset('image/favicon.png')}}" rel="icon" />
    <title>{{isset($store->name)? $store->name :""}}</title>
    <META NAME="robots" CONTENT="index">
    <meta name="description" content="">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/js/bootstrap/css/bootstrap.min.css')}}" />
    {{--<link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/font-awesome/css/font-awesome.min.css')}}" />--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/stylesheet.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/owl.transitions.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{secure_asset('store_resources/css/stylesheet-skin3.css')}}" />
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile"><i class="fa fa-phone"></i>233 </li>
                                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#">Wish List (0)</a></li>
                                <li><a href="#">Checkout</a></li>
                            </ul>
                        </div>
                        <div id="language" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="{{secure_asset('store_resources/image/flags/gb.png')}}" alt="English" title="English">English <i class="fa fa-caret-down"></i></span></button>
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li>--}}
                                    {{--<button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/gb.png" alt="English" title="English" /> English</button>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/ar.png" alt="Arabic" title="Arabic" /> Arabic</button>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                        <div id="currency" class="btn-group">
                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> GHS <i class="fa fa-caret-down"></i></span></button>
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li>--}}
                                    {{--<button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                    {{--<div id="top-links" class="nav pull-right flip">--}}
                        {{--<ul>--}}
                            {{--<li><a href="login.html">Login</a></li>--}}
                            {{--<li><a href="register.html">Register</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 inner">
                        {{--<div id="logo"><a href="index.html"><img class="img-responsive" src="{{secure_asset('store_resources/image/logo.png')}}" title="MarketShop" alt="MarketShop" /></a></div>--}}
                        <div id="logo"><a href="index.html">
                                <?php $user = \App\User::find($user) ?>
                                <h1>{{isset($user->name) ? $user->name :""}}</h1>
                            </a></div>
                    </div>
                    <!-- Logo End -->
                    <!-- Search Start-->
                    <div class="col-table-cell col-lg-5 col-md-5 col-md-push-0 col-sm-6 col-sm-push-6 col-xs-12">
                        <div id="search" class="input-group">
                            <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                            <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- Search End-->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-md-pull-0 col-sm-6 col-sm-pull-6 col-xs-12 inner">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
                                <span class="cart-icon pull-left flip"></span> <span id="cart-total">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}} item(s) - GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <table class="table">
                                        <tbody>

                                        {{--<tr>--}}
                                            {{--<td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="{{secure_asset('store_resources/image/product/sony_vaio_1-50x50.jpg')}}"></a></td>--}}
                                            {{--<td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></td>--}}
                                            {{--<td class="text-right">x 1</td>--}}
                                            {{--<td class="text-right">$902.00</td>--}}
                                            {{--<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>--}}
                                        {{--</tr>--}}
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $content)

                                        <tr>
                                            <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="{{secure_asset('store_resources/image/product/sony_vaio_1-50x50.jpg')}}"></a></td>
                                            <td class="text-left"><a href="product.html">{{$content->name}}</a></td>
                                            <td class="text-right">x {{$content->qty}}</td>
                                            <td class="text-right">GHS {{$content->price}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-xs remove" title="Remove" onClick="removeFromCart('{{$content->rowId}}')" type="button">
                                                    <i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{--<tr>--}}
                                            {{--<td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="{{secure_asset('store_resources/image/product/samsung_tab_1-50x50.jpg')}}"></a></td>--}}
                                            {{--<td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a></td>--}}
                                            {{--<td class="text-right">x 1</td>--}}
                                            {{--<td class="text-right">$230.00</td>--}}
                                            {{--<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>--}}
                                        {{--</tr>--}}
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Sub-Total</strong></td>
                                                <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td class="text-right"><strong>Eco Tax (-2.00)</strong></td>--}}
                                                {{--<td class="text-right">$4.00</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td class="text-right"><strong>VAT (20%)</strong></td>--}}
                                                {{--<td class="text-right">$188.00</td>--}}
                                            {{--</tr>--}}
                                            <tr>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="checkout"><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>
                                                View Cart</a>&nbsp;&nbsp;&nbsp;<a href="{{secure_url('/store/checkout')}}" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main Menu Start-->
        <nav id="menu" class="navbar">
            <div class="container">
                <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="Home" href="#"><span>Home</span></a></li>

                        <li class="dropdown"><a>Shop by Categories</a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach(\App\ProductCategory::all() as $category)
                                    <li> <a href="#">{{$category->name}}<span>&rsaquo;</span></a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                @foreach(\App\SubCategory::whereProductCategoryId($category->id)->get() as $subcategory)
                                                <li><a href="">{{$subcategory->name}} <span>&rsaquo;</span></a>
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">Sub Categories New</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                </li>

                                                @endforeach
                                                    <div class="dropdown-menu">
                                                        <ul>
                                                            <li><a href="category.html">New Sub Categories</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    @endforeach
                                    {{--<li> <a href="category.html">Electronics<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li> <a href="category.html">Laptops <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories </a> </li>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories </a> </li>--}}
                                                            {{--<li> <a href="category.html">Sub Categories New </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li> <a href="category.html">Desktops <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories </a> </li>--}}
                                                            {{--<li> <a href="category.html">Sub Categories New </a> </li>--}}
                                                            {{--<li> <a href="category.html">Sub Categories New </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li> <a href="category.html">Cameras <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Mobile Phones <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">New Sub Categories</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">TV &amp; Home Audio <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories </a> </li>--}}
                                                            {{--<li><a href="category.html">Sub Categories New </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">MP3 Players</a> </li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="category.html">Shoes<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="category.html">Men</a> </li>--}}
                                                {{--<li><a href="category.html">Women <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories </a> </li>--}}
                                                            {{--<li><a href="category.html">Sub Categories </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Girls</a> </li>--}}
                                                {{--<li><a href="category.html">Boys</a> </li>--}}
                                                {{--<li><a href="category.html">Baby</a> </li>--}}
                                                {{--<li><a href="category.html">Accessories <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">New Sub Categories</a></li>--}}
                                                            {{--<li><a href="category.html">Sub Categories</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Watches<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li> <a href="category.html">Men's Watches</a></li>--}}
                                                {{--<li> <a href="category.html">Women's Watches</a></li>--}}
                                                {{--<li> <a href="category.html">Kids' Watches</a></li>--}}
                                                {{--<li> <a href="category.html">Accessories</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Jewellery<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li> <a href="category.html">Silver <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories</a></li>--}}
                                                            {{--<li> <a href="category.html">New Sub Categories</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Gold <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">test 1</a></li>--}}
                                                            {{--<li><a href="category.html">test 2</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Diamond</a></li>--}}
                                                {{--<li><a href="category.html">Pearl <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Men's Jewellery</a></li>--}}
                                                {{--<li><a href="category.html">Children's Jewellery <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">New Sub Categories </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="category.html">Health &amp; Beauty<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li> <a href="category.html">Perfumes</a></li>--}}
                                                {{--<li> <a href="category.html">Makeup</a></li>--}}
                                                {{--<li> <a href="category.html">Sun Care</a></li>--}}
                                                {{--<li> <a href="category.html">Skin Care</a></li>--}}
                                                {{--<li> <a href="category.html">Eye Care</a></li>--}}
                                                {{--<li> <a href="category.html">Hair Care</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Kids &amp; Babies<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="category.html">Toys</a></li>--}}
                                                {{--<li><a href="category.html">Games <span>&rsaquo;</span></a>--}}
                                                    {{--<div class="dropdown-menu">--}}
                                                        {{--<ul>--}}
                                                            {{--<li><a href="category.html">test 25</a></li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="category.html">Puzzles</a></li>--}}
                                                {{--<li><a href="category.html">Hobbies</a></li>--}}
                                                {{--<li><a href="category.html">Strollers</a></li>--}}
                                                {{--<li><a href="category.html">Health &amp; Safety</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Sports<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="category.html">Cycling</a></li>--}}
                                                {{--<li><a href="category.html">Running</a></li>--}}
                                                {{--<li><a href="category.html">Swimming</a></li>--}}
                                                {{--<li><a href="category.html">Football</a></li>--}}
                                                {{--<li><a href="category.html">Golf</a></li>--}}
                                                {{--<li><a href="category.html">Windsurfing</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Home &amp; Garden<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="category.html">Bedding</a></li>--}}
                                                {{--<li><a href="category.html">Food</a></li>--}}
                                                {{--<li><a href="category.html">Furniture</a></li>--}}
                                                {{--<li><a href="category.html">Kitchen</a></li>--}}
                                                {{--<li><a href="category.html">Lighting</a></li>--}}
                                                {{--<li><a href="category.html">Tools</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li> <a href="category.html">Wines &amp; Spirits<span>&rsaquo;</span></a>--}}
                                        {{--<div class="dropdown-menu">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="category.html">Wine</a></li>--}}
                                                {{--<li><a href="category.html">Whiskey</a></li>--}}
                                                {{--<li><a href="category.html">Vodka</a></li>--}}
                                                {{--<li><a href="category.html">Liqueurs</a></li>--}}
                                                {{--<li><a href="category.html">Beer</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </li>
                        {{--<li class="menu_brands dropdown"><a href="#">Brands</a>--}}
                            {{--<div class="dropdown-menu">--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/apple_logo-60x60.jpg')}}" title="Apple" alt="Apple" /></a><a href="#">Apple</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/canon_logo-60x60.jpg')}}" title="Canon" alt="Canon" /></a><a href="#">Canon</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"> <a href="#"><img src="{{secure_asset('store_resources/image/product/hp_logo-60x60.jpg')}}" title="Hewlett-Packard" alt="Hewlett-Packard" /></a><a href="#">Hewlett-Packard</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/htc_logo-60x60.jpg')}}" title="HTC" alt="HTC" /></a><a href="#">HTC</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/palm_logo-60x60.jpg')}}" title="Palm" alt="Palm" /></a><a href="#">Palm</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/sony_logo-60x60.jpg')}}" title="Sony" alt="Sony" /></a><a href="#">Sony</a> </div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/canon_logo-60x60.jpg')}}" title="test" alt="test" /></a><a href="#">test</a> </div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/apple_logo-60x60.jpg')}}" title="test 3" alt="test 3" /></a><a href="#">test 3</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/canon_logo-60x60.jpg')}}" title="test 5" alt="test 5" /></a><a href="#">test 5</a> </div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/canon_logo-60x60.jpg')}}" title="test 6" alt="test 6" /></a><a href="#">test 6</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/apple_logo-60x60.jpg')}}" title="test 7" alt="test 7" /></a><a href="#">test 7</a> </div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('store_resources/image/product/canon_logo-60x60.jpg')}}" title="test1" alt="test1" /></a><a href="#">test1</a></div>--}}
                                {{--<div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="{{secure_asset('image/product/apple_logo-60x60.jpg')}}" title="test2" alt="test2" /></a><a href="#">test2</a></div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="custom-link"><a href="#">Custom Links</a></li>--}}
                        {{--<li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>Custom Block</a>--}}
                            {{--<div class="dropdown-menu custom_block">--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<table>--}}
                                            {{--<tbody>--}}
                                            {{--<tr>--}}
                                                {{--<td><img alt="" src="{{secure_asset('store_resources/image/banner/cms-block.jpg')}}"></td>--}}
                                                {{--<td><img alt="" src="{{secure_asset('store_resources/image/banner/responsive.jpg')}}"></td>--}}
                                                {{--<td><img alt="" src="{{secure_asset('store_resources/image/banner/cms-block.jpg')}}"></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><h4>CMS Blocks</h4></td>--}}
                                                {{--<td><h4>Responsive Template</h4></td>--}}
                                                {{--<td><h4>Dedicated Support</h4></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>--}}
                                                {{--<td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>--}}
                                                {{--<td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>--}}
                                                {{--<td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>--}}
                                                {{--<td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>--}}
                                            {{--</tr>--}}
                                            {{--</tbody>--}}
                                        {{--</table>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown"><a>Pages</a>--}}
                            {{--<div class="dropdown-menu">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="category.html">Category (Grid/List)</a></li>--}}
                                    {{--<li><a href="product.html">Product</a></li>--}}
                                    {{--<li><a href="cart.html">Shopping Cart</a></li>--}}
                                    {{--<li><a href="checkout.html">Checkout</a></li>--}}
                                    {{--<li><a href="compare.html">Compare</a></li>--}}
                                    {{--<li><a href="wishlist.html">Wishlist</a></li>--}}
                                    {{--<li><a href="search.html">Search</a></li>--}}
                                    {{--<li><a href="manufacturer.html">Brands</a></li>--}}
                                {{--</ul>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="about-us.html">About Us</a></li>--}}
                                    {{--<li><a href="email-template/index.html" target="_blank">Email Template Page</a></li>--}}
                                    {{--<li><a href="elements.html">Elements</a></li>--}}
                                    {{--<li><a href="elements-forms.html">Forms</a></li>--}}
                                    {{--<li><a href="careers.html">Careers</a></li>--}}
                                    {{--<li><a href="faq.html">Faq</a></li>--}}
                                    {{--<li><a href="404.html">404</a></li>--}}
                                    {{--<li><a href="sitemap.html">Sitemap</a></li>--}}
                                    {{--<li><a href="contact-us.html">Contact Us</a></li>--}}
                                {{--</ul>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="login.html">Login</a></li>--}}
                                    {{--<li><a href="register.html">Register</a></li>--}}
                                    {{--<li><a href="my-account.html">My Account</a></li>--}}
                                    {{--<li><a href="order-history.html">Order History</a></li>--}}
                                    {{--<li><a href="order-information.html">Order Information</a></li>--}}
                                    {{--<li><a href="return.html">Return</a></li>--}}
                                    {{--<li><a href="gift-voucher.html">Gift Voucher</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <li class="contact-link"><a href="#">Contact Us</a></li>
                        {{--<li class="custom-link-right"><a href="#" target="_blank">Special Offers</a></li>--}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main Menu End-->
    </div>

    @yield('content')

    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row">
                    <div class="contact col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h5>Contact Details</h5>
                        <ul>
                            <li class="address"><i class="fa fa-map-marker"></i>Central Square, 22 Hoi Wing Road, New Delhi, India</li>
                            <li class="mobile"><i class="fa fa-phone"></i>+91 9898777656</li>
                            <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="contact-us.html">Contact Us</a>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="about-us.html">Delivery Information</a></li>
                            <li><a href="about-us.html">Privacy Policy</a></li>
                            <li><a href="about-us.html">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>Customer Service</h5>
                        <ul>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="returns.html">Returns</a></li>
                            <li><a href="sitemap.html">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>Extras</h5>
                        <ul>
                            <li><a href="manufacturer.html">Brands</a></li>
                            <li><a href="gift-voucher.html">Gift Vouchers</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h5>Newsletter</h5>
                        <div class="form-group">
                            <label class="control-label" for="subscribe">Sign up to receive latest news and updates.</label>
                            <input id="signup" type="email" required="" placeholder="Email address" name="email" class="form-control">
                        </div>
                        <input type="submit" value="Subscribe" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="{{secure_asset('store_resources/js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('store_resources/js/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('store_resources/js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('store_resources/js/jquery.dcjqaccordion.min.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('store_resources/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('store_resources/js/custom.js')}}"></script>
<!-- JS Part End-->

<script>


    function addToCart(id,name,qty,price){
//           alert(one+', ' + two + ', '+three+', '+four);

        $.post('/store/add-to-cart/'+id+'/'+name+'/'+qty+'/'+price,function(data){
            alert('added an item to cart');
            $('#cart').html(data);

        });
    }

    function removeFromCart(id){
        $.post('/store/remove-from-cart/'+id,function(data){
            $('#cart').html(data);
//            checkOutRemoveFromCart(id);
            alert('removed an item from cart');
        });
    }

    function checkOutRemoveFromCart(id){
        $.post('/store/checkout-remove-from-cart/'+id,function(data){
            $('#shopping-cart').html(data);
            $('#cart').load('{{secure_url('/store/cart-view')}}')
            alert('removed an item from cart');
        });
    }

    function confirmOrder(){
        var delivery = $('#delivery:checked').val() == undefined ? false: true;

        $.post('{{url('/store/check-out')}}',function(data){

            alert('ordered successfully');

//            location.reload();

        })

//        console.log(delivery)
    }
</script>

@yield('scripts')
</body>

</html>