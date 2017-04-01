<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.smartaddons.com/templates/html/market/quickview.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2017 21:38:56 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Basic page needs
   ============================================ -->
    <title>{{Config('app.name')}}</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="author" content="Magentech" />
    <meta name="robots" content="index, follow" />

    <!-- Mobile specific metas
   ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Favicon
   ============================================ -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="ico/favicon.png" />

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

<body class="res layout-subpage">
<div id="wrapper" class="wrapper-full ">
    <!-- Main Container  -->
    <div class="main-container container">

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-md-12 col-sm-12">

                <div class="product-view row">
                    <div class="left-content-product col-lg-12 col-xs-12">
                        <div class="row">
                            <div class="content-product-left  col-sm-6 col-xs-12 ">
                                <div class="large-image  ">
                                    <img itemprop="image" class="product-image-zoom" src='{{asset("images/products/$product->image")}}' data-zoom-image="{{asset("images/products/$product->image")}}" title="Bint Beef" alt="Bint Beef" />
                                </div>

                                <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
                                    @foreach($gallery as $gal)
                                    <a data-index="0" class="img thumbnail " data-image="{{asset("images/products/$gal->image")}}" title="Bint Beef">
                                        <img src="{{asset("images/products/$gal->image")}}" title="{{$product->name}}" alt="{{$product->name}}" />
                                    </a>
                                    @endforeach

                                        <a data-index="0" class="img thumbnail " data-image="{{asset("images/products/$product->image")}}" title="Bint Beef">
                                            <img src="{{asset("images/products/$product->image")}}" title="{{$product->name}}" alt="{{$product->name}}" />
                                        </a>

                                </div>

                            </div>

                            <div class="content-product-right col-sm-6 col-xs-12">
                                <div class="title-product">
                                    <h1>{{$product->name}} </h1>
                                </div>
                                <!-- Review ---->
                                <div class="box-review form-group">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>
                                    {{--<a class="reviews_button" href="quickview.php.html" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews </a>--}}
                                </div>

                                <div class="product-label form-group">
                                    <div class="product_page_price price">
                                        @if($product->sale)
                                            <span class="price-new">GH&#162; {{$product->sale_price}}</span>
                                            <span class="price-old">GH&#162; {{$product->price}}</span>
                                        @else
                                            <span class="price-new">GH&#162; {{$product->price}}</span>
                                        @endif
                                    </div>
                                    {{--<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">--}}
                                        {{--<span class="price-new" itemprop="price">GHS {{$product->price}} </span>--}}
                                        {{--<span class="price-old">GHS {{$product->price}} </span>--}}
                                    {{--</div>--}}
                                    {{--<div class="stock"><span>Availability: </span>  <span class="status-stock">In Stock </span></div>--}}
                                </div>

                                <div class="product-box-desc">
                                    <div class="inner-box-desc">
                                        <div class="price-tax"><span>Ex Tax: </span> $60.00 </div>
                                        <div class="reward"><span>Price in reward points: </span> 400 </div>
                                        <div class="brand"><span>Brand: </span><a href="#">Apple </a>		 </div>
                                        <div class="model"><span>Product Code: </span> Product 15 </div>
                                        <div class="reward"><span>Reward Points: </span> 100 </div>
                                    </div>
                                </div>
                                <!-- end box info product -->

                            </div>
                        </div>
                    </div>


                </div>

                <script type="text/javascript">
                    var watch = {

                        'add': function(product_id, store_id,user_id) {

                            $.post('/watch-shop/'+product_id+'/'+store_id+'/'+user_id,function(data){
                                var image_url = data.image_url;
                                if(data.status == 401) {
                                    addProductNotice('Sorry !', '', '<h3><a href="#">You have to Log in first to follow a shop !</h3>', 'error');
                                }
                                else if(data.status == 404) {
                                    addProductNotice('Sorry !', '', '<h3><a href="#">'+data.message+ '!</h3>', 'error');
                                }

                                else if(data.status == 403){
                                    addProductNotice('Sorry !', '', '<h3><a href="#">You can not follow your own shop !</h3>', 'error');

                                }else {
                                    addProductNotice('Shop added to your feeds',
                                            '<img src='+image_url+'>',
                                            '<h3><a href="#">You are now watching </a>'+ data.store +'<a href="#"></a>!</h3>',
                                            'success');
                                }


                            })
                        }
                    }

                    var likes = {

                        'add': function(product_id) {

                            $.post('/like-it/'+product_id,function(data){
                                addProductNotice('',
                                        '',
                                        //'<img src="images/products/"'+product_id+' alt="">',
                                        //'<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>',
                                        '<h3><a href="#">'+data.message+'!</h3>',
                                        'success');
                                $('.like-counts-'+product_id).text(data.likes)
                                $('#like-toggle-'+product_id).removeClass('fa fa-thumbs-up')

                            });


                        }
                    }

                    var cart = {

                        'add': function (product_id, name, quantity, price,user_id) {
                            $.post('/store/add-to-cart/' + product_id + '/' + name + '/' + quantity + '/' + price+'/'+user_id, function (data) {

                                $('#shopping-cart').html(data);

                                addProductNotice('Product added to Cart',
                                        //'<img src="images/products/"'+product_id+'.jpg' alt="">',
                                        '',
                                        '<h3><a href="#">' + name + '</a> added to <a hcref="#"> cart</a>!</h3>',
                                        'success');

                            })

                        },

                        'remove': function (product_id,user_id) {
                            $.post('/store/remove-from-cart/' + product_id+'/'+user_id, function (data) {

                                $('#shopping-cart').html(data);

                                addProductNotice('Product removed from cart',
                                        //'<img src="images/products/"'+product_id+'.jpg' alt="">',
                                        '',
                                        //'<h3><a href="#">'+name+'</a> added to <a href="#"> cart</a>!</h3>',
                                        '<h3><a href="#">an item</a> removed from <a href="#"> cart</a>!</h3>',
                                        'success');

                            })

                        },

                        'confirmOrder': function (user_id) {
                            var delivery = $('#delivery:checked').val() == undefined ? false: true;
                            $.post('/store/check-out/'+user_id,function(data){
                                if(data.status == 401){
                                    addProductNotice('Error', '','<h3><a href="#"></a> You need to login to continue ! </a></h3>','success');
                                    setTimeout(function(){
                                        alert('reached');
                                        $('#login-modal').modal();
                                    },3000)
                                }else {
                                    addProductNotice('Successful', '','<h3><a href="#"></a> Ordered successfully !<a href="#"> </a> redirecting...</h3>','success');
                                    setTimeout(function(){
                                        //location.href="/"
                                        $('.main-container').html(data)
                                    },3000)
                                }

                            })

                        },

                        'checkoutRemove': function (product_id,user_id) {

                            $.post('/store/checkout-remove-from-cart/'+product_id,function(data){
                                $('#checkout-shopping-cart').html(data);
                                $('#shopping-cart').load('/store/cart-view/'+user_id);

                                addProductNotice('Product removed from cart',
                                        '', '<h3><a href="#">an item</a> removed from <a href="#"> cart</a>!</h3>','success');
                                //alert('removed an item from cart');
                            });

                        },



                    }



                    var fancy = {
                        'add': function(product_id) {
                            $.post('/fancy-it/'+product_id,function(data) {
                                addProductNotice('Fancied !',
                                        '',
                                        '<h3>'+data.message+'!</h3>',
                                        'success');

                            });
                        }
                    }
                    var compare = {
                        'add': function(product_id) {
                            addProductNotice('Product added to compare',
                                    '<img src="image/demo/shop/product/e11.jpg" alt="">',
                                    '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
                        }
                    }

                </script>


            </div>


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->

    <style type="text/css">
        #wrapper{box-shadow:none;}
        #wrapper > *:not(.main-container){display: none;}
        #content{margin:0}
        .container{width:100%;}

        .product-info .product-view,.left-content-product,.box-info-product{margin:0;}
        .left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}

        .left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; clear:none; }
        .add-to-links ul li{margin:0;}

    </style></div>

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
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend_2/js/themejs/addtocart.js')}}"></script>

</body>

</html>