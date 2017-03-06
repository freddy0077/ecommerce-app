@extends('store.layouts.master')

@section('scripts')

    <script>


    </script>

@endsection

@section('content')

<div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-xs-12">
                <div class="row">
                    <div class="col-sm-8">
                        <!-- Slideshow Start-->
                        <div class="slideshow single-slider owl-carousel">
                            <div class="item"> <a href="#"><img class="img-responsive" src="{{secure_asset('store_resources/image/slider/banner-1-750x400.jpg')}}" alt="banner 1" /></a></div>
                            <div class="item"> <a href="#"><img class="img-responsive" src="{{secure_asset('store_resources/image/slider/banner-2-750x400.jpg')}}" alt="banner 2" /></a></div>
                            <div class="item"> <a href="#"><img class="img-responsive" src="{{secure_asset('store_resources/image/slider/banner-3-750x400.jpg')}}" alt="banner 3" /></a></div>
                        </div>
                        <!-- Slideshow End-->
                    </div>
                    <div class="col-sm-4 pull-right flip">
                        <div class="marketshop-banner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="sample-banner1" alt="sample-banner1" src="{{secure_asset('store_resources/image/banner/sp-small-banner-360x185.jpg')}}"></a></div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="sample-banner" alt="sample-banner" src="{{secure_asset('store_resources/image/banner/sp-small-banner1-360x185.jpg')}}"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bestsellers Product Start-->
                <h3 class="subtitle">Bestsellers</h3>
                <div class="owl-carousel product_carousel">

                    @foreach($products as $product )

                    <div class="product-thumb clearfix">
                        <div class="image"><a href="#">
                                <img src="{{secure_asset('store_resources/image/product/iphone_1-200x200.jpg')}}"
                                                            alt="iPhone5" title="iPhone5" class="img-responsive" /></a>
                        </div>
                        <div class="caption">
                            <h4><a href="#">{{$product->name}}</a></h4>
                            <p class="price"> GHS {{$product->price}} </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i>
                                    <i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            </div>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" id="cart-btn" onclick='addToCart("{{$product->id}}","{{$product->name}}",1,"{{$product->price}}")'>

                                <span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                <!-- Featured Product End-->
                <!-- Banner Start-->
                <div class="marketshop-banner">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="Sample Banner 2" alt="Sample Banner 2" src="{{secure_asset('store_resources/image/banner/sample-banner-3-360x360.jpg')}}"></a></div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="Sample Banner" alt="Sample Banner" src="{{secure_asset('store_resources/image/banner/sample-banner-1-360x360.jpg')}}"></a></div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="Sample Banner 3" alt="Sample Banner 3" src="{{secure_asset('store_resources/image/banner/sample-banner-2-360x360.jpg')}}"></a></div>
                    </div>
                </div>
                <!-- Banner End-->
                <!-- Categories Product Slider Start-->
                <div class="category-module" id="latest_category">
                    <h3 class="subtitle">Electronics - <a class="viewall" href="#">view all</a></h3>
                    <div class="category-module-content">
                        <ul id="sub-cat" class="tabs">
                            @foreach($categories as $category)
                                <li><a href="#{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>


                        @foreach($sub_categories as $sub_category)

                        <div id="{{$sub_category->product_category_id}}" class="tab_content">
                            <div class="owl-carousel latest_category_tabs">

                                @foreach(\App\Store::getProductsByCategory($sub_category->id,$user) as $product)

                                <div class="product-thumb">
                                    <div class="image"><a href="#"><img src="{{secure_asset('store_resources/image/product/samsung_tab_1-200x200.jpg')}}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                                    <div class="caption">
                                        <h4><a href="#">{{$product->name}}</a></h4>
                                        <p class="price"> <span class="price-new">{{$product->price}}</span>
                                            <span class="price-old">{{$product->price}}</span>
                                            <span class="saving">-5%</span> </p>
                                        <div class="rating">
                                            <span class="fa fa-stack">
                                                <i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x">
                                                </i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-primary" type="button" onclick='addToCart("{{$product->id}}","{{$product->name}}",1,"{{$product->price}}")'>
                                            <span>Add to Cart</span></button>
                                        <div class="add-to-links">
                                            <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                            <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                        </div>
                                    </div>
                                </div>

                                @endforeach



                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                <!-- Categories Product Slider End-->
                <!-- Categories Product Slider Start -->
                <h3 class="subtitle">Health &amp; Beauty - <a class="viewall" href="category.html">view all</a></h3>
                <div class="owl-carousel latest_category_carousel">
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src="{{secure_asset('store_resources/image/product/iphone_6-200x200.jpg')}}" alt="Hair Care Cream for Men" title="Hair Care Cream for Men" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Hair Care Cream for Men</a></h4>
                            <p class="price"> $134.00 </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src="{{secure_asset('store_resources/image/product/nikon_d300_5-200x200.jpg')}}" alt="Hair Care Products" title="Hair Care Products" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Hair Care Products</a></h4>
                            <p class="price"> <span class="price-new">$66.80</span> <span class="price-old">$90.80</span> <span class="saving">-27%</span> </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src="{{secure_asset('store_resources/image/product/nikon_d300_4-200x200.jpg')}}" alt="Bed Head Foxy Curls Contour Cream" title="Bed Head Foxy Curls Contour Cream" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Bed Head Foxy Curls Contour Cream</a></h4>
                            <p class="price"> $88.00 </p>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="#"><img src="{{secure_asset('store_resources/image/product/macbook_5-200x200.jpg')}}" alt="Shower Gel Perfume for Women" title="Shower Gel Perfume for Women" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Shower Gel Perfume for Women</a></h4>
                            <p class="price"> <span class="price-new">$95.00</span> <span class="price-old">$99.00</span> <span class="saving">-4%</span> </p>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick="cart.add('61');"><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="wishlist.add('61');"><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick="compare.add('61');"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src={{secure_asset('store_resources/image/product/macbook_4-200x200.jpg')}} alt="Perfumes for Women" title="Perfumes for Women" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Perfumes for Women</a></h4>
                            <p class="price"> $85.00 </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src="{{secure_asset('store_resources/image/product/macbook_3-200x200.jpg')}}" alt="Make Up for Naturally Beautiful Better" title="Make Up for Naturally Beautiful Better" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Make Up for Naturally Beautiful Better</a></h4>
                            <p class="price"> $123.00 </p>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="image"><a href="product.html"><img src="{{secure_asset('store_resources/image/product/macbook_2-200x200.jpg')}}" alt="Pnina Tornai Perfume" title="Pnina Tornai Perfume" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">Pnina Tornai Perfume</a></h4>
                            <p class="price"> $110.00 </p>
                        </div>
                        <div class="button-group">
                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                            <div class="add-to-links">
                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categories Product Slider End -->
                <!-- Banner Start -->
                <div class="marketshop-banner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="1 Block Banner" alt="1 Block Banner" src="{{secure_asset('store_resources/image/banner/1blockbanner-1140x75.jpg')}}"></a></div>
                    </div>
                </div>

            </div>
            <!--Middle Part End-->
        </div>
    </div>
</div>

<!-- Feature Box Start-->
<div class="container">
    <div class="custom-feature-box row">
        <div class="col-sm-4 col-xs-12">
            <div class="feature-box fbox_1">
                <div class="title">Free Shipping</div>
                <p>Free shipping on order over $1000</p>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="feature-box fbox_3">
                <div class="title">Gift Cards</div>
                <p>Give the special perfect gift</p>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="feature-box fbox_4">
                <div class="title">Reward Points</div>
                <p>Earn and spend with ease</p>
            </div>
        </div>
    </div>
</div>
<!-- Feature Box End-->

@endsection