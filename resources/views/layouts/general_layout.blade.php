
<!DOCTYPE html>
<html lang="en" class="wide wow-animation smoothscroll scrollTo boxed">



@include('partials.head')



<body>

<div class="page text-center">

    {{--@include('market.partials.header')--}}

    <header class="page-header page-header-with-slider">

        {{--<div class="rd-navbar-wrap">--}}
            {{--<nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" class="rd-navbar rd-navbar-default" data-stick-up-offset="50px" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fullwidth" data-lg-device-layout="rd-navbar-static">--}}
                {{--<div class="rd-navbar-inner">--}}

                    {{--<div class="rd-navbar-top-part">--}}
                        {{--<div class="rd-navbar-top-part-inner-right element-groups-lg-35 reveal-sm-flex">--}}
                            {{--<form class="pull-right">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Email address</label>--}}
                            {{--<input type="email" class="form-control input-sm" style="height: 10px; width: 200px;" id="exampleInputEmail1" placeholder="Email">--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            {{--<div class="veil reveal-lg-inline-block"><a href="contacts.html" class="text-gray-light"><span class="icon icon-circle icon-sm bg-white text-primary material-icons-location_on"></span><span class="inset-left-10 small">25 East 12th Street 16st Floor New York, NY 12222, United States</span></a></div>--}}
                            {{--<div><a href="callto:#" class="text-gray-light"><span class="icon icon-circle icon-sm bg-white text-primary material-icons-local_phone"></span><span class="inset-left-10 small">800-2345-6789</span></a></div>--}}
                        {{--</div>--}}
                        {{--<div>--}}

                            {{--<div class="top-items" id="top-list-items">--}}
                                {{--<a href="#">My Collections</a>--}}
                                {{--<a href="#">My Feed</a>--}}
                                {{--<a href="#">Trending</a>--}}
                                {{--<a href="#">Store</a>--}}
                                {{--<a href="#">Profile</a>--}}
                            {{--</div>--}}


                            {{--<div data-rd-navbar-toggle=".rd-navbar-search-wrap" class="rd-navbar-search-toggle"></div>--}}
                            {{--<div class="rd-navbar-search-wrap">--}}
                            {{--<div class="rd-navbar-search">--}}
                            {{--<form action="search.php" method="GET" class="rd-navbar-search-form">--}}
                            {{--<label class="rd-navbar-search-form-input">--}}
                            {{--<input type="text" name="s" placeholder="Search..." autocomplete="off">--}}
                            {{--</label>--}}
                            {{--<button type="submit" class="rd-navbar-search-form-submit"></button>--}}
                            {{--</form><span class="rd-navbar-live-search-results"></span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="rd-navbar-panel">--}}

                        {{--<button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>--}}
                    {{--</div>--}}
                    {{--<div class="rd-navbar-nav-wrap">--}}

                        {{--<div class="rd-navbar-brand"><a href="index.html" class="brand-name"><img src="images/logo.png" alt="" width="158" height="50"></a></div>--}}

                        {{--<div class="rd-navbar-nav-outher">--}}
                            {{--<ul class="rd-navbar-nav">--}}
                                {{--<li class="active"><a href="./">Home</a>--}}

                                    {{--<ul class="rd-navbar-dropdown">--}}
                                        {{--<li><a href="categories-masonry.html">Home Masonry</a></li>--}}
                                        {{--<li><a href="categories-list.html">Home Default</a></li>--}}
                                        {{--<li><a href="#">Header Settings</a>--}}
                                            {{--<ul class="rd-navbar-dropdown">--}}
                                                {{--<li><a href="header-variant-1.html">Header Style 1</a></li>--}}
                                                {{--<li><a href="header-variant-2.html">Header Style 2</a></li>--}}
                                                {{--<li><a href="header-variant-3.html">Header Style 3</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Footer Settings</a>--}}
                                            {{--<ul class="rd-navbar-dropdown">--}}
                                                {{--<li><a href="footer-variant-1.html">Footer Style 1</a></li>--}}
                                                {{--<li><a href="footer-variant-2.html">Footer Style 2</a></li>--}}
                                                {{--<li><a href="footer-variant-3.html">Footer Style 3</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Sidebar Settings</a>--}}
                                            {{--<ul class="rd-navbar-dropdown">--}}
                                                {{--<li><a href="sidebar-left.html">Sidebar Left</a></li>--}}
                                                {{--<li><a href="index.html">Sidebar Right</a></li>--}}
                                                {{--<li><a href="no-sidebar.html">No Sidebar</a></li>--}}
                                                {{--<li><a href="double-sidebar.html">Double Sidebar</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="index-boxed.html">Home Boxed Layout</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Categories</a>--}}

                                    {{--<ul class="rd-navbar-dropdown">--}}
                                        {{--<li><a href="#">Post Formats</a>--}}
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
                                        {{--<li><a href="typography.html">Typography</a></li>--}}
                                        {{--<li><a href="404.html">404</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a href="about-us.html">About us</a></li>--}}
                                {{--<li><a href="contacts.html">Contacts</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="rd-navbar-list-social">--}}
                            {{--<ul class="list-inline-0">--}}

                                {{--<li><a href="#" class="">Profile</a></li>--}}
                                {{--<li><a href="#" class="icon icon-circle fa-facebook icon-default"></a></li>--}}
                                {{--<li><a href="#" class="icon icon-circle fa-twitter icon-default"></a></li>--}}
                                {{--<li><a href="#" class="icon icon-circle fa-google-plus icon-default"></a></li>--}}
                                {{--<li><a href="#" class="icon icon-circle fa-linkedin icon-default"></a></li>--}}
                                {{--<li><a href="#" class="icon icon-circle fa-pinterest icon-default"></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}
        {{--</div>--}}

        @include('market.partials.nav_menu')

    </header>


    {{--@include('market.partials.menu')--}}



    @yield('content')

    @include('partials.footer')

</div>

<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

<noscript><a href="https://www.olark.com/site/7830-582-10-3714/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by<a href="https://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>

@yield('scripts')
</body>
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>