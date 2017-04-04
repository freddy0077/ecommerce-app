@extends('store.layouts.store_layout')

@section('content')

        <!-- Main Container  -->
<div class="main-container container">
    {{--<ul class="breadcrumb">--}}
    {{--<li><a href="#"><i class="fa fa-home"></i></a></li>--}}
    {{--<li><a href="#">Smartphone & Tablets</a></li>--}}
    {{--</ul>--}}

    <div class="row">
        <!--Left Part Start -->
        <aside class="col-sm-4 col-md-3" id="column-left">
            <div class="module menu-category titleLine">
                <h3 class="modtitle">Sub Categories</h3>
                <div class="modcontent">
                    <div class="box-category">
                        <ul id="cat_accordion" class="list-group">

                            @foreach($sub_categories as $category)
                                <li class=""><a href="{{url('')}}" class="cutom-parent">{{$category->name}}</a>  <span class="dcjq-icon"></span></li>
                            @endforeach

                        </ul>
                    </div>


                </div>
            </div>
            <div class="module hidden-xs">
                <div class="modcontent clearfix">
                    <div class="banners">
                        <div>
                            <a href="#"><img src="{{asset('frontend_2/image/demo/cms/left-image-static.png')}}" alt="left-image"></a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="module latest-product titleLine hidden-xs">
                <h3 class="modtitle">Latest Products</h3>
                <div class="modcontent ">
                    @foreach($latest_products as $product)
                        <div class="product-latest-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img src='{{asset("images/products/$product->image")}}' alt="{{$product->name}}" title="{{$product->image}}" class="img-responsive" style="width: 100px; height: 82px;"></a>
                                </div>
                                <div class="media-body">
                                    <div class="caption">
                                        <h4><a href="#">{{$product->name}}</a></h4>

                                        <div class="price">
                                            <span class="price-new">{{$product->price}}</span>
                                        </div>

                                        <div class="button-group">

                                            <button class="addToCart addToCart--notext" type="button" title="Add to Cart" onclick="cart.add('{{$product->id}}', '{{$product->name}}',1,'{{$product->price}}','{{$user_id}}');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </aside>
        <!--Left Part End -->

        <!--Middle Part Start-->
        <div id="content" class="col-md-9 col-sm-8">
            <div class="products-category">
                <div class="category-derc">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banners">
                                <div>
                                    {{--                                        <a  href="#"><img src="{{asset('frontend_2/image/demo/shop/category/electronic-cat.png')}}" alt=" 30&quot;"><br></a>--}}
                                    <a  href="#">
                                        {{--<img src="https://placehold.it/870x260" alt=" 30&quot;">--}}
                                        <img src="/images/stores/{{$store->store_banner}}" alt=" 30&quot;">
                                        <br>
                                    </a>
                                    <br>
                                    <br>

                                    {{--<form enctype="multipart/form-data" id="banner_image_form">--}}

                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<input type="file" class="form-control" id="fileUpload" name="image" />--}}

                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<button type="button" class="btn btn-default" value="Upload" onclick="return Upload()">Edit Image</button>--}}
                                            {{--<button type="submit" class="btn btn-default" value="Upload">Edit Image</button>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                    {{--</form>--}}

                                    {{--<input type="button" value="Upload" onclick="return Upload()" />--}}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Filters -->
                <div class="product-filter filters-panel">
                    <div class="row">
                        <div class="col-md-2 visible-lg">
                            <div class="view-mode">
                                <div class="list-view">
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
                            {{--<div class="form-group short-by">--}}
                            {{--<label class="control-label" for="input-sort">Sort By:</label>--}}
                            {{--<select id="input-sort" class="form-control"--}}
                            {{--onchange="location = this.value;">--}}
                            {{--<option value="" selected="selected">Default</option>--}}
                            {{--<option value="">Name (A - Z)</option>--}}
                            {{--<option value="">Name (Z - A)</option>--}}
                            {{--<option value="">Price (Low &gt; High)</option>--}}
                            {{--<option value="">Price (High &gt; Low)</option>--}}
                            {{--<option value="">Rating (Highest)</option>--}}
                            {{--<option value="">Rating (Lowest)</option>--}}
                            {{--<option value="">Model (A - Z)</option>--}}
                            {{--<option value="">Model (Z - A)</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label" for="input-limit">Show:</label>--}}
                            {{--<select id="input-limit" class="form-control" onchange="location = this.value;">--}}
                            {{--<option value="" selected="selected">9</option>--}}
                            {{--<option value="">25</option>--}}
                            {{--<option value="">50</option>--}}
                            {{--<option value="">75</option>--}}
                            {{--<option value="">100</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                        </div>
                        {{--<div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">--}}
                        {{--<ul class="pagination">--}}
                        {{--<li class="active"><span>1</span></li>--}}
                        {{--<li><a href="#">2</a></li><li><a href="#">&gt;</a></li>--}}
                        {{--<li><a href="#">&gt;|</a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <!-- //end Filters -->
                <!--changed listings-->

                @if(!count($products))
                    <div class="alert alert-block alert-info fade in">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="alert-heading">NO PRODUCTS IN THIS CATEGORY</h4>
                        {{--<p> You have currently not stored any product yet !</p>--}}
                        <p>
                            {{--<a class="btn purple" href="{{url('store/add-product')}}"> Add New Product </a>--}}
                            {{--<a class="btn dark" href="{{url('store/quick-add-products')}}"> Add More Products </a>--}}
                        </p>
                    </div>

                @else
                    <div class="products-list row grid">
                        @foreach($products as $product)
                            <div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
                                <div class="product-item-container">
                                    <div class="left-block">
                                        <div class="product-image-container lazy second_img ">
                                            <img data-src='{{asset("images/products/$product->image")}}' src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt=" 30&quot;" class="img-responsive" />
                                            <img data-src='{{asset("images/products/$product->image")}}' src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt=" 30&quot;" class="img_0 img-responsive" />
                                        </div>
                                        <!--Sale Label-->
                                        @if($product->sale)
                                        <span class="label label-sale">Sale</span>
                                        @endif
                                        <!--countdown box-->
                                        {{--<div class="countdown_box">--}}
                                        {{--<div class="countdown_inner">--}}
                                        {{--<div class="title">This limited offer ends</div>--}}

                                        {{--<div class="defaultCountdown-30"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <!--end countdown box-->

                                        <!--full quick view block-->
                                        <a class="quickview  visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                                        <!--end full quick view block-->
                                    </div>


                                    <div class="right-block">
                                        <div class="caption">
                                            <h4><a href="#">{{$product->name}}</a></h4>
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
                                                @if($product->sale)
                                                    <span class="price-new">GH&#162; {{$product->sale_price}}</span>

                                                    <span class="price-old">GH&#162; {{$product->price}}</span>
                                                    <span class="label label-percent">-40%</span>

                                                @else
                                                    <span class="price-new">GH&#162; {{$product->price}}</span>

                                                @endif
                                            </div>
                                            <div class="description item-desc hidden">
                                                <p>
                                                    {{$product->description}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="button-group">
                                            <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('{{$product->id}}', '{{$product->name}}',1,'{{$product->price}}','{{$user_id}}');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>

                                            <button class="wishlist" type="button" onclick="fancy.add('{{$product->id}}');" data-toggle="tooltip" title="Add to fancies">
                                                @if(\Illuminate\Support\Facades\Auth::check() && \App\Fancy::whereProductId($product->id)->first())
                                                    <i class="fa fa-heart fancy-toggle-{{$product->id}}"></i>
                                                @else
                                                    <i class="fa fa-heart-o fancy-toggle-{{$product->id}}"></i>
                                                @endif
                                            </button>

                                            @if(\Illuminate\Support\Facades\Auth::check()&& \App\Like::whereUserId(Auth::user()->id)->whereProductId($product->id)->first())
                                                <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                    <i class="fa fa-thumbs-up like-toggle-{{$product->id}}" style="color: green;"></i>
                                                    <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                </button>
                                            @else
                                                <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                                                    <i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>
                                                    <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                                                </button>

                                            @endif
                                            {{--<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>--}}
                                            {{--<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>--}}
                                        </div>
                                    </div><!-- right block -->

                                </div>
                            </div>
                            <div class="clearfix visible-xs-block"></div>

                        @endforeach

                        @endif
                    </div>					<!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel" >
                        <div class="row">
                            <div class="col-md-2 hidden-sm hidden-xs">
                            </div>
                            <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                                {{--<div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>--}}
                                <div class="form-group" style="margin: 7px 10px">{{$products}}</div>
                            </div>
                            {{--<div class="box-pagination col-md-3 col-sm-4 text-right"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">&gt;</a></li><li><a href="#">&gt;|</a></li></ul></div>--}}

                        </div>
                    </div>
                    <!-- //end Filters -->

            </div>

        </div>


    </div>
    <!--Middle Part End-->
</div>
<!-- //Main Container -->

    @endsection