


<header class="page-header page-header-with-slider">

   @include('market.partials.nav_menu')

    <section data-min-height="250px"style="margin-top: 10px;" data-height="calc(100vh - 152px)" data-autoplay="true" class="swiper-container swiper-slider">
        <div class="swiper-wrapper">
            {{--<div data-slide-bg="{{secure_asset('images/shopaff.jpg')}}" class="swiper-slide">--}}
                {{--<div class="swiper-caption">--}}
                    {{--<div class="swiper-slide-caption">--}}
                        {{--<h1 data-caption-animate="fadeInUp" data-caption-delay="650">E- Bicycle <span class="veil reveal-xs-inline">NXT 3000</span>--}}
                        {{--</h1><a href="#" data-caption-animate="fadeInUp" data-caption-delay="900" class="btn btn-primary">Read more</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div data-slide-bg="{{secure_asset('images/shop_image.jpg')}}" class="swiper-slide">
                <div class="swiper-caption">
                    <div class="swiper-slide-caption">
                        <p data-caption-animate="fadeInDown" data-caption-delay="600" class="small veil reveal-md-block small">
                            {{--Posted by Shane Doe--}}
                        </p>
                        <h1 data-caption-animate="fadeInUp" data-caption-delay="200">
                           <i style="color: rgba(255,255,255,0.6)">Shopaholicks.com</i>
                        </h1>
                        {{--<a href="#" data-caption-animate="fadeInUp" data-caption-delay="450" class="btn btn-primary">Read more</a>--}}
                    </div>
                </div>
            </div>
            {{--<div data-slide-bg="{{secure_asset('images/slider-03.jpg')}}" class="swiper-slide">--}}
                {{--<div class="swiper-slide-caption">--}}
                    {{--<p data-caption-animate="fadeInDown" data-caption-delay="600" class="small veil reveal-md-block">Posted by Shane Doe</p>--}}
                    {{--<h1 data-caption-animate="fadeInUp" data-caption-delay="200">Our start<br class="veil-xs">on Kickstarter</h1><a href="#" data-caption-animate="fadeInUp" data-caption-delay="450" class="btn btn-primary">Support us on Kickstarter</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="swiper-pagination"></div>
    </section>
</header>



{{--@include('market.partials.menu')--}}
