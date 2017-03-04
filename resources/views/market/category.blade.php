@extends('market.layouts.without_slider_layout')

@section('scripts')
    <script>


            </script>
@endsection

@section('content')

    <div class="container">
        <div style="text-align: left;">

            {!! Breadcrumbs::render('category', $category) !!}

        </div>
    </div>

    {{--{{$products->product_category_name}}--}}

    <h1 class="h2"> {{$category->name}}</h1>
    <main class="page-content offset-top-30">
        <div id="fb-root"></div>


       <?php ?>

        {{--<div data-items="3" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="false" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">--}}


        <div class="row">
            @foreach($products as $key=>$product)
                {{--@foreach($category->products as $product)--}}
                <div class="col-md-3">
                    <div class="owl-item">
                        <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                            <div>
                                <div class="post-media-wrap">
                                    <p>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>
                                    </p>
                                    <a href="#"><img src='{{asset('images/'.$product['image'])}}' width="370" height="231" alt="" class="img-responsive post-image"/></a>
                                    <ul class="post-categories list-inline-0">
                                        <li><a href="#"><span class="label label-primary">{{$product['category_name']}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-content-wrap" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-sm-6" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product['price']}}</div>
                                        <div class="col-sm-6" style="margin-top:-15px;">
                                            <a href=""><i class="fa fa-thumbs-up " aria-hidden="true"></i></a>
                                            {{--<a href="">&#x263a;</a>--}}
                                            ({{$product['like_counts']}})
                                            {{--<a href=""><img  src="{{asset('images/fancy1.png')}}" class="img-responsive" style="width:10px" height="10px" /></a>--}}
                                        </div>


                                        <h6>
                                            <a class="text-center" href="#"> {{$product['name']}}</a>
                                            {{--<button id="myFancy"> <i class="" ></i>fancy it</button>--}}
                                        </h6>
                                        <div><a href=""><i class="fa fa-eye"></i></a> Listed in <a href="#">Sourcecode .</a></div>
                                        {{--<div class="col-sm-6"> price: {{$product->price}}</div>--}}
                                        {{--<div class="col-sm-6"><a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><a href="">&#x263a;</a>({{$product->like_counts}})</div>--}}
                                    </div>

                                    {{--<div class="small text-gray-dark post-meta-author">--}}
                                    {{--<a href=""> <i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                                    {{--Listed <span class="text-primary"> in <a href="#"></a></span>--}}
                                    {{--</div>--}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>

        {{$products}}

    </main>

@endsection