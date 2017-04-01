@extends('market.layouts.index_3_layout')

@section('scripts')

@endsection

@section('content')

        <!-- Block slideshow  -->
<section class="so-slideshow ">
    <div class="container">
        <div class="row">
            <div id="so-slideshow">
                <div class="module slideshow--home8 no-margin">
                    {{--<div class="item">--}}
                        {{--<a href="#"><img src="{{asset('images/shopaff.jpg')}}" width="1170" height="570" alt="slider1" class="img-responsive"></a>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<a href="#"><img src="{{asset('frontend_2/image/demo/slider/home8/slide2-id12.jpg')}}" alt="slider2" class="img-responsive"></a>--}}
                    {{--</div>--}}
                    <div class="item">
                        <a href="#"><img src="{{asset('images/slider_1.jpg')}}" alt="slider3" class="img-responsive"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{asset('images/slider_2.jpg')}}" alt="slider3" class="img-responsive"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{asset('images/slider_3.jpg')}}" alt="slider3" class="img-responsive"></a>
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
                            @foreach($featured_stores as $store)
                            {{--<div class="col-sm-4 col-xs-12 banner-item">--}}

                                {{--<div class="banners banner__img">--}}
                                    {{--<div>--}}
                                        {{--<a title="Static Image" href="#">--}}
                                            {{--<img src='{{asset("images/stores/$store->store_image")}}' alt="Static Image"></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="banner__info">--}}
                                    {{--<h2>{{$store->store_name}}</h2>--}}
                                    {{--<p>ON YOUR MARK, GET SET, GO</p>--}}
                                    {{--<a title="Shop Now" href="#">Shop Now &gt;&gt;</a>--}}
                                {{--</div>--}}

                            {{--</div>--}}

                            @endforeach

                            {{--<div class="col-sm-4 col-xs-12 banner-item hidden-xs">--}}
                                {{--<div class="banners banner__img">--}}
                                    {{--<div>--}}
                                        {{--<a title="Static Image" href="#">--}}
                                            {{--<img src="{{asset('frontend_2/image/demo/cms/home8/cat2-id12.jpg')}}" alt="Static Image"></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="banner__info">--}}
                                    {{--<h2>Women's Shoes</h2>--}}
                                    {{--<p>ON YOUR MARK, GET SET, GO</p>--}}
                                    {{--<a title="Shop Now" href="#">Shop Now &gt;&gt;</a>--}}
                                {{--</div>--}}

                            {{--</div>--}}

                            {{--<div class="col-sm-4 col-xs-12 banner-item hidden-xs">--}}
                                {{--<div class="banners banner__img">--}}
                                    {{--<div>--}}
                                        {{--<a title="Static Image" href="#"><img src="{{asset('frontend_2/image/demo/cms/home8/cat3-id12.jpg')}}" alt="Static Image"></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="banner__info">--}}
                                    {{--<h2>Kid's Shoes</h2>--}}
                                    {{--<p>ON YOUR MARK, GET SET, GO</p>--}}
                                    {{--<a title="Shop Now" href="#">Shop Now &gt;&gt;</a>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>


            <div id="content" class="clearfix">
                <div class="col-xs-12 clearfix">

                    <div class="module so-extraslider--new titleLine">
                        <h3 class="modtitle">Products by Popularity</h3>
                        <div id="so_extraslider1" >

                            <?php $i =0 ?>


                            <!-- Begin extraslider-inner -->
                            <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                @foreach($products as $product)
                                        <?php $i++ ?>
                                        <!--Begin Items-->
                                <div class="ltabs-item product-layout">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container second_img">
                                                <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}' alt="{{$product->name}}" class="img-responsive" />
                                                <img src="{{asset("images/products/$product->image")}}"   alt="{{$product->name}}" class="img-responsive img_0" />
                                            </div>
                                            @if($product->sale)
                                            <span class="label label-sale">Sale</span>
                                            @endif

                                                    <!--Sale Label-->
                                            {{--<span class="label label-new">New</span>--}}

                                            <!--full quick view block-->
                                            <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                                            <!--end full quick view block-->
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4><a href="">{{$product->name}} </a></h4>
                                                <span>Listed in <a href='{{url("stores/$product->store_slug/$product->user_id")}}'>{{$product->store_name}}</a></span>

                                                <div class="ratings">
                                                    {{--<div class="rating-box">--}}
                                                        {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                        {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                        {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                        {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>--}}
                                                </div>

                                                <div class="price">
                                                    <div class="price">
                                                        @if($product->sale)
                                                            <span class="price-new">GH&#162; {{$product->sale_price}}</span>

                                                            <span class="price-old">GH&#162; {{$product->price}}</span>
                                                        @else
                                                            <span class="price-new">GH&#162; {{$product->price}}</span>

                                                        @endif
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="button-group">
                                                @if(\Illuminate\Support\Facades\Auth::check() && \App\WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($product->store_id)->first())

                                                    <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
                                                        <i class="fa fa-eye-slash"></i> <span class="button-group__text"></span>
                                                    </button>
                                                    @else
                                                    <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
                                                        <i class="fa fa-eye"></i> <span class="button-group__text"></span>
                                                    </button>

                                                @endif


                                                <button class="wishlist" type="button" onclick="fancy.add('{{$product->id}}');"><i class="fa fa-heart"></i>  </button>

                                                @if(\Illuminate\Support\Facades\Auth::check()&& \App\Like::whereUserId(Auth::user()->id)->whereProductId($product->id)->first())
                                                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                        <i class="fa fa-thumbs-down like-toggle-{{$product->id}}"></i>
                                                        <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                    </button>
                                                @else
                                                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                        <i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>
                                                        <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                    </button>

                                                @endif


                                                <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');"><i  class="addthis_inline_share_toolbox"></i></button>


                                                {{--<button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>--}}

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

                                @foreach($second_set as $product)
                                        <!--Begin Items-->
                                <div class="ltabs-item product-layout">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container second_img">
                                                <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}'  alt="{{$product->name}}" class="img-responsive" />
                                                <img src="{{asset("images/products/$product->image")}}"  alt="{{$product->name}}" class="img-responsive img_0" />
                                            </div>
                                            @if($product->sale)
                                                <span class="label label-sale">Sale</span>
                                                @endif
                                            <!--full quick view block-->
                                            <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                                            <!--end full quick view block-->
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4><a href="">{{$product->name}} </a></h4>
                                                <div class="ratings">
                                                    <span>Listed in <a href='{{url("stores/$product->store_slug/$product->user_id")}}'>{{$product->store_name}}</a></span>

                                                    <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    @if($product->sale)
                                                        <span class="price-new">GH&#162; {{$product->sale_price}}</span>

                                                        <span class="price-old">GH&#162; {{$product->price}}</span>
                                                    @else
                                                        <span class="price-new">GH&#162; {{$product->price}}</span>

                                                    @endif
                                                </div>

                                            </div>

                                            <div class="button-group">
                                                <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                                                <button class="wishlist" type="button" onclick="fancy.add('{{$product->id}}');"><i class="fa fa-heart"></i>  </button>

                                                @if(\Illuminate\Support\Facades\Auth::check()&& \App\Like::whereUserId(Auth::user()->id)->whereProductId($product->id)->first())
                                                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                        <i class="fa fa-thumbs-down like-toggle-{{$product->id}}"></i>
                                                        <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                    </button>
                                                    @else
                                                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                        <i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>
                                                        <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                    </button>

                                                @endif

                                                {{--<button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">--}}
                                                    {{--<i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>--}}
                                                    {{--<i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>--}}
                                                {{--</button>--}}

                                                {{--<button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">--}}
                                                    {{--<i id="like-toggle-{{$product->id}}" class="fa fa-thumbs-up"></i>--}}
                                                    {{--<i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>--}}
                                                {{--</button>--}}
                                                <button class="compare" type="button"  onclick=""><i class="fa fa-share"></i>  </button>

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
                                        <h4><a href="{{url('/category',$category->id)}}">{{$category->name}} </a></h4>

                                        <div class="left-block">
                                            <div class="product-image-container second_img">
                                                <img src="https://placehold.it/180x200"  alt="" class="img-responsive" />
                                                {{--<img src="{{asset('frontend_2/image/demo/shop/product/home8/8_3.jpg')}}"  alt="Apple Cinema 30&quot;" class="img-responsive img_0" />--}}
                                            </div>
                                            <!--Sale Label-->
                                            {{--<span class="label label-sale">Sale</span>--}}
                                            {{--<span class="label label-new">New</span>--}}

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
                                <h3 class="modtitle modtitle--small">Best Deals</h3>
                                <div id="so_extraslider1__home8">

                                    <!-- Begin extraslider-inner -->
                                    <div class="so-extraslider products-list grid product-style__8"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="3" data-items_column1="2" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                        <!--Begin Items-->
                                        @foreach($best_deals as $deal)
                                        <div class="ltabs-item product-layout">
                                            <div class="product-item-container">
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                        <img src='{{asset("images/$deal->image")}}'  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                                    </div>
                                                    <!--Sale Label-->
                                                    <span class="label label-sale">Sale</span>

                                                    <!--full quick view block-->
                                                    <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="{{url('/quick-view-product',$deal->id)}}">>  Quickview</a>
                                                    <!--end full quick view block-->
                                                </div>
                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="#">{{$deal->name}}</a></h4>
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
                                                            <span class="price-new">{{$deal->sale_price}}</span>
                                                            <span class="price-old">{{$deal->price}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="button-group">
                                                        <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$deal->id}}', '{{$deal->store_id}}');">
                                                            <i class="fa fa-eye"></i> <span class="button-group__text"></span>
                                                        </button>
                                                        <button class="wishlist" type="button" onclick="fancy.add('{{$deal->id}}');"><i class="fa fa-heart"></i>  </button>

                                                        @if(\Illuminate\Support\Facades\Auth::check()&& \App\Like::whereUserId(Auth::user()->id)->whereProductId($deal->id)->first())
                                                            <button class="compare" type="button"  onclick="likes.add('{{$deal->id}}');">
                                                                <i class="fa fa-thumbs-down like-toggle-{{$deal->id}}"></i>
                                                                <i class="like-counts-{{$deal->id}}">{{$deal->like_counts}} </i>
                                                            </button>
                                                        @else
                                                            <button class="compare" type="button"  onclick="likes.add('{{$deal->id}}');">
                                                                <i class="fa fa-thumbs-up like-toggle-{{$deal->id}}"></i>
                                                                <i class="like-counts-{{$deal->id}}">{{$deal->like_counts}} </i>
                                                            </button>

                                                        @endif


                                                        {{--<button class="compare" type="button"  onclick="likes.add('{{$deal->id}}');">--}}
                                                            {{--<i id="like-toggle-{{$deal->id}}" class="fa fa-thumbs-up"></i>--}}
                                                            {{--<i class="like-counts-{{$deal->id}}">{{$deal->like_counts}} </i>--}}
                                                        {{--</button>--}}
                                                        {{----}}

                                                        <button class="compare" type="button"  onclick=""><i class="fa fa-share"></i>  </button>

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

                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->

@endsection