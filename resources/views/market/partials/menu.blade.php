{{--<div class="rd-navbar-nav-outher">--}}
    {{--<ul class="rd-navbar-nav">--}}
        {{--<li class="active"><a href="/">Home</a></li>--}}

        {{--<li><a href="#">Clothing </a>--}}

            {{--<ul class="rd-navbar-dropdown">--}}
                {{--<li><a href="/">Men</a></li>--}}
                {{--<li><a href="/">Women</a></li>--}}
                {{--<li><a href="/">Kids & Babies</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li><a href="#">Beauty & Accessories</a>--}}

            {{--<ul class="rd-navbar-dropdown">--}}
                {{--<li><a href="#">Men's</a>--}}
                    {{--<ul class="rd-navbar-dropdown">--}}
                        {{--<li><a href="post-default.html">Standard Format</a></li>--}}
                        {{--<li><a href="post-with-video.html">Video Format</a></li>--}}
                        {{--<li><a href="post-with-carousel.html">Gallery Format</a></li>--}}
                        {{--<li><a href="post-with-quote.html">Quote Format</a></li>--}}
                        {{--<li><a href="post-with-quote-2.html">Quote Format 2</a></li>--}}
                        {{--<li><a href="post-with-link.html">Link Format</a></li>--}}
                        {{--<li><a href="post-with-audio.html">Audio Format</a></li>--}}
                        {{--<li><a href="post-with-facebook.html">Facebook Format</a></li>--}}
                        {{--<li><a href="post-with-twitter.html">Twitter Format</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="#">Women's</a></li>--}}
                {{--<li><a href="#">Kids</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li><a href="#">Home </a>--}}

            {{--<ul class="rd-navbar-dropdown">--}}
                {{--<li><a href="#">Appliances</a>--}}
                    {{--<ul class="rd-navbar-dropdown">--}}
                        {{--<li><a href="post-default.html">Standard Format</a></li>--}}
                        {{--<li><a href="post-with-video.html">Video Format</a></li>--}}
                        {{--<li><a href="post-with-carousel.html">Gallery Format</a></li>--}}
                        {{--<li><a href="post-with-quote.html">Quote Format</a></li>--}}
                        {{--<li><a href="post-with-quote-2.html">Quote Format 2</a></li>--}}
                        {{--<li><a href="post-with-link.html">Link Format</a></li>--}}
                        {{--<li><a href="post-with-audio.html">Audio Format</a></li>--}}
                        {{--<li><a href="post-with-facebook.html">Facebook Format</a></li>--}}
                        {{--<li><a href="post-with-twitter.html">Twitter Format</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="#">Decor</a></li>--}}
                {{--<li><a href="#">Kids</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li><a href="#">Electronic  </a>--}}

            {{--<ul class="rd-navbar-dropdown">--}}
                {{--<li><a href="#">Computers</a>--}}
                    {{--<ul class="rd-navbar-dropdown">--}}
                        {{--<li><a href="post-default.html">Standard Format</a></li>--}}
                        {{--<li><a href="post-with-video.html">Video Format</a></li>--}}
                        {{--<li><a href="post-with-carousel.html">Gallery Format</a></li>--}}
                        {{--<li><a href="post-with-quote.html">Quote Format</a></li>--}}
                        {{--<li><a href="post-with-quote-2.html">Quote Format 2</a></li>--}}
                        {{--<li><a href="post-with-link.html">Link Format</a></li>--}}
                        {{--<li><a href="post-with-audio.html">Audio Format</a></li>--}}
                        {{--<li><a href="post-with-facebook.html">Facebook Format</a></li>--}}
                        {{--<li><a href="post-with-twitter.html">Twitter Format</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="#">Phones</a></li>--}}
                {{--<li><a href="#">Kids</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li><a href="#">Arts & Photography</a></li>--}}
        {{--<li><a href="#">Agric & Food</a></li>--}}
        {{--<li><a href="#">Music</a></li>--}}
        {{--<li><a href="#">Contacts</a></li>--}}
    {{--</ul>--}}
{{--</div>--}}

<style>
    /*@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);*/
    /*body {*/
        /*font-family: 'Open Sans', 'sans-serif';*/
        /*background: #f0f0f0;*/
        /*background: url(https://pcbx.us/bfjb.jpg);*/
    /*}*/

    /*h1,*/
    /*.h1 {*/
        /*font-size: 36px;*/
        /*text-align: center;*/
        /*font-size: 5em;*/
        /*color: #404041;*/
    /*}*/

    .navbar-nav>li>.dropdown-menu {
        margin-top: 20px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .navbar-default .navbar-nav>li>a {
        width: 200px;
        font-weight: bold;
    }

    .mega-dropdown {
        position: static !important;
        width: 100%;
    }

    .mega-dropdown-menu {
        padding: 20px 0px;
        width: 100%;
        box-shadow: none;
        -webkit-box-shadow: none;
    }

    .mega-dropdown-menu:before {
        content: "";
        border-bottom: 15px solid #fff;
        border-right: 17px solid transparent;
        border-left: 17px solid transparent;
        position: absolute;
        top: -15px;
        left: 285px;
        z-index: 10;
    }

    .mega-dropdown-menu:after {
        content: "";
        border-bottom: 17px solid #ccc;
        border-right: 19px solid transparent;
        border-left: 19px solid transparent;
        position: absolute;
        top: -17px;
        left: 283px;
        z-index: 8;
    }

    .mega-dropdown-menu > li > ul {
        padding: 0;
        margin: 0;
    }

    .mega-dropdown-menu > li > ul > li {
        list-style: none;
    }

    .mega-dropdown-menu > li > ul > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.428571429;
        /*color: #999;*/
        white-space: normal;
    }

    .mega-dropdown-menu > li ul > li > a:hover,
    .mega-dropdown-menu > li ul > li > a:focus {
        text-decoration: none;
        /*color: #444;*/
        background-color: #f5f5f5;
    }

    .mega-dropdown-menu .dropdown-header {
        color: #428bca;
        font-size: 18px;
        font-weight: bold;
    }

    .mega-dropdown-menu form {
        margin: 3px 20px;
    }

    .mega-dropdown-menu .form-group {
        margin-bottom: 3px;
    }
</style>
<div class="rd-navbar-nav-outher">

<div class="container">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">MegaMenu</a>--}}
        </div>


        <div class="collapse navbar-collapse js-navbar-collapse">

            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories  <span class="caret"></span></a>

                    <ul class="dropdown-menu mega-dropdown-menu row">
                        {{--<li class="col-sm-3">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header">New in Stores</li>--}}
                                {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                                    {{--<div class="carousel-inner">--}}
                                        {{--<div class="item active">--}}
                                            {{--<a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>--}}
                                            {{--<h4><small>Summer dress floral prints</small></h4>--}}
                                            {{--<button class="btn btn-primary" type="button">49,99 €</button>--}}
                                            {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                        {{--</div>--}}
                                        {{--<!-- End Item -->--}}
                                        {{--<div class="item">--}}
                                            {{--<a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>--}}
                                            {{--<h4><small>Gold sandals with shiny touch</small></h4>--}}
                                            {{--<button class="btn btn-primary" type="button">9,99 €</button>--}}
                                            {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                        {{--</div>--}}
                                        {{--<!-- End Item -->--}}
                                        {{--<div class="item">--}}
                                            {{--<a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>--}}
                                            {{--<h4><small>Denin jacket stamped</small></h4>--}}
                                            {{--<button class="btn btn-primary" type="button">49,99 €</button>--}}
                                            {{--<button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>--}}
                                        {{--</div>--}}
                                        {{--<!-- End Item -->--}}
                                    {{--</div>--}}
                                    {{--<!-- End Carousel Inner -->--}}
                                {{--</div>--}}
                                {{--<!-- /.carousel -->--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Clothing</li>
                                <li><a href="#">Unique Features</a></li>
                                <li><a href="#">Image Responsive</a></li>
                                <li><a href="#">Auto Carousel</a></li>
                                <li><a href="#">Newsletter Form</a></li>
                                <li><a href="#">Four columns</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Agric & Food</li>
                                <li><a href="#">Good Typography</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Beauty & Accessories</li>
                                <li><a href="#">Unique Features</a></li>
                                <li><a href="#">Image Responsive</a></li>
                                <li><a href="#">Auto Carousel</a></li>
                                <li><a href="#">Newsletter Form</a></li>
                                <li><a href="#">Four columns</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Music</li>
                                <li><a href="#">Good Typography</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Home Appliances</li>
                                <li><a href="#">Easy to customize</a></li>
                                <li><a href="#">Glyphicons</a></li>
                                <li><a href="#">Pull Right Elements</a></li>
                                <li class="divider"></li>

                                <li class="dropdown-header">Electronic</li>
                                <li><a href="#">Coloured Headers</a></li>
                                <li><a href="#">Primary Buttons & Default</a></li>
                                <li><a href="#">Calls to action</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Arts & Photography</li>
                                <li><a href="#">Default Navbar</a></li>
                                <li><a href="#">Lovely Fonts</a></li>
                                <li><a href="#">Responsive Dropdown </a></li>
                                {{--<li class="divider"></li>--}}
                                {{--<li class="dropdown-header">Newsletter</li>--}}
                                {{--<form class="form" role="form">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="sr-only" for="email">Email address</label>--}}
                                        {{--<input type="email" class="form-control" id="email" placeholder="Enter email">--}}
                                    {{--</div>--}}
                                    {{--<button type="submit" class="btn btn-primary btn-block">Sign in</button>--}}
                                {{--</form>--}}
                            </ul>
                        </li>
                    </ul>

                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" data-toggle="dropdown">About  <span class="caret"></span></a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
                </li>
            </ul>

        </div>
        <!-- /.nav-collapse -->
    </nav>
</div>

</div>

{{--<h1 class="c-text"> Bootstrap Mega Menu </h1>--}}