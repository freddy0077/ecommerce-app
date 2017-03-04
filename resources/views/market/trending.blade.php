@extends('market.layouts.master')

@section('scripts')
    <script>
        //style top list items
        $('#top-list-items a').css('margin-right','20px')

        $(document).ready(function () {
            $('#myFancy').on('click', function () {
                alert('hello');
            })
        })


    </script>


@endsection

@section('content')

    <main class="page-content offset-top-30">
        <div id="fb-root"></div>

        <h4 class="text-center">TOP ADVERTISEMENTS</h4>


        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">

            @foreach($products as $category)
                @foreach($category->products as $product)


                    <div class="owl-item">
                        <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                            <div>
                                <div class="post-media-wrap">
                                    <p>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>
                                    </p>
                                    <a href="#"><img src="images/{{$product->image}}" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                                    <ul class="post-categories list-inline-0">
                                        <li><a href="#"><span class="label label-primary">{{$category->name}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-content-wrap" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <h6><a href="#"> {{$product->name}}</a>
                                            <button id="myFancy"> <i class="fa fa-spinner fa-spin" ></i>fancy it</button>
                                        </h6>
                                        <div style="text-align: center;">Listed in <a href="#">Sourcecode Network.</a></div>
                                        <div class="col-sm-6"> price: {{$product->price}}</div>
                                        <div class="col-sm-6"><a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><a href="">&#x263a;</a>({{$product->like_counts}})</div>
                                    </div>

                                    {{--<div class="small text-gray-dark post-meta-author">--}}
                                    {{--<a href=""> <i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                                    {{--Listed <span class="text-primary"> in <a href="#"></a></span>--}}
                                    {{--</div>--}}
                                </div>
                                {{--<div class="post-content-bottom">--}}
                                {{--<ul class="post-meta list-inline list-inline-md">--}}
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>

                @endforeach

            @endforeach


        </div>

        <h4 class="text-center">PRODUCTS BY POPULARITY</h4>

        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">

            @foreach($popular_products as $category)
                @foreach($category->products as $product)
                    <div class="owl-item">
                        <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                            <div>
                                <div class="post-media-wrap">
                                    <p>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>
                                    </p>
                                    <a href="#"><img src="images/{{$product->image}}" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                                    <ul class="post-categories list-inline-0">
                                        <li><a href="#"><span class="label label-primary">{{$category->name}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-content-wrap" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <h6><a href="#"> {{$product->name}}</a>
                                            <button id="myFancy"> <i class="fa fa-spinner fa-spin" ></i>fancy it</button>
                                        </h6>
                                        <div style="text-align: center;">Listed in <a href="#">Sourcecode Network.</a></div>
                                        <div class="col-sm-6"> price: {{$product->price}}</div>
                                        <div class="col-sm-6"><a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><a href="">&#x263a;</a>({{$product->like_counts}})</div>
                                    </div>

                                    {{--<div class="small text-gray-dark post-meta-author">--}}
                                    {{--<a href=""> <i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                                    {{--Listed <span class="text-primary"> in <a href="#"></a></span>--}}
                                    {{--</div>--}}
                                </div>
                                {{--<div class="post-content-bottom">--}}
                                {{--<ul class="post-meta list-inline list-inline-md">--}}
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>

                @endforeach

            @endforeach


        </div>



    </main>

@endsection