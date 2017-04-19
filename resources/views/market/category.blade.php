@extends('market.layouts.index_3_layout')

@section('scripts')

    <style>
        .img_dimensions{
            display: block;
            max-width:180px;
            max-height:120px;
            width: auto;
            height: auto;
        }

    </style>

        <script>
            var nextPageUrl  = {!! $nextpageurl?"\"$nextpageurl\";":"null;" !!}

            {{--alert('{{(int)$products->currentpage()+1}}')--}}

            var page = '{{(int)$second_set->currentpage()}}';

            var url = '{{url("/category/$category_id")}}/'+'?page=';


            $('#load-more').on('click',function() {
                page++

                $.ajax({
                    url: url + page,
                    dataType: "html",
                    success: function (data) {
                        $('#load').append(data);
                    }
                });
            })

        </script>

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
                            {{--                            <h4 class="">{{strtoupper($store->name)}}</h4>--}}

                            @foreach($featured_stores as $store)
                                <div class="col-sm-4  col-xs-4 banner-item">
                                    <div class="banners banner__img">
                                        <div>
                                            <a title="Static Image" href="#">
                                                {{--                                            <img src='{{\Illuminate\Support\Facades\Storage::url("images/$store->store_banner")}}'  class="img-thumbnail"><br><br>--}}

                                                <img src='{{\Illuminate\Support\Facades\Storage::url("products/$store->image")}}' alt="Static Image"></a>
                                        </div>
                                    </div>
                                    <div class="banner__info">
                                        <h2>{{$store->store_name}}</h2>
                                        <p>{{$store->name}}</p>
                                        <a title="Shop Now" href='{{url("stores/$store->slug/$store->user_id")}}'>Shop Now &gt;&gt;</a>
                                    </div>

                                </div>
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


                    @if(!count($products))
                        <div class="alert alert-block alert-info fade in">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <h4 class="alert-heading">NO PRODUCT IN THIS CATEGORY</h4>
                            {{--<p> You have currently not stored any product yet !</p>--}}
                            <p>
                                {{--<a class="btn purple" href="{{url('store/add-product')}}"> Add New Product </a>--}}
                                {{--<a class="btn dark" href="{{url('store/quick-add-products')}}"> Add More Products </a>--}}
                            </p>
                        </div>
                    @else

                    <div class="module so-extraslider--new titleLine">
                        <h3 class="modtitle">{{$category_name}} Category</h3>
                        <div id="so_extraslider1" >

                            <!-- Begin extraslider-inner -->
                            <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                @foreach($products as $product)
                                        <!--Begin Items-->
                                <div class="ltabs-item product-layout">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container">
{{--                                                <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}' alt="{{$product->name}}" class="img-responsive" />--}}
                                                <img src='{{\Illuminate\Support\Facades\Storage::url("images/$product->image")}}'  alt="{{$product->name}}" class="img-responsive img_0 img_dimensions" />
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


                                            @include('market.partials.button_groups_partial')

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
                            <div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                @foreach($second_set as $product)
                                        <!--Begin Items-->
                                <div class="ltabs-item product-layout">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container">
                                                <img src='{{\Illuminate\Support\Facades\Storage::url("products/$product->image")}}'  alt="{{$product->name}}" class="img-responsive img_0 img_dimensions" />

                                                {{--<img src='{{isset($product->image)?asset("images/products/$product->image"):""}}' alt="{{$product->name}}" class="img-responsive" />--}}
                                                {{--<img src="{{asset("images/products/$product->image")}}"   alt="{{$product->name}}" class="img-responsive img_0" />--}}
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


                                            @include('market.partials.button_groups_partial')

                                        </div><!-- right block -->
                                    </div>
                                </div>


                                @endforeach
                                        <!--End Items-->
                            </div>
                            <!--End extraslider-inner -->

                            <br>
                            <br>

                            <div id="load"></div>



                            <button class="text-center btn btn-default" id="load-more">Load More ...</button>

                            <br>

                        </div>
                    </div>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->

@endsection