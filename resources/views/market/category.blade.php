@extends('market.layouts.index_3_layout')

@section('scripts')

@endsection

@section('content')


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
                                                <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '1');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                                                <button class="wishlist" type="button" onclick="fancy.add('42');"><i class="fa fa-heart"></i>  </button>
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
                                            <span class="label label-sale">Sale</span>
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
                                                <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                                                <button class="wishlist" type="button" onclick="fancy.add('42');"><i class="fa fa-heart"></i>  </button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->

@endsection