@extends('market.layouts.master')

@section('scripts')
    <script>
        //style top list items
        $('#top-list-items a').css('margin-right','20px')

        $(document).ready(function () {
//            $('#myFancy').on('click', function () {
//                alert('hello');
{{--//            })--}}
            {{--$('#load_more').on('click',function(){--}}
{{--//                alert('hello');--}}
                {{--$.get("{{url($nextpageurl)}}",function(data){--}}
                   {{--setTimeout(function(){--}}
                       {{--$('#more_products').append(data)}--}}
                           {{--,1000--}}
                   {{--)--}}
                    {{--console.log(data)--}}
                {{--})--}}

                {{--$( "#more_products" ).load("{{url($nextpageurl)}}", function(data) {--}}
                    {{--alert( "Load was performed."+data );--}}
                {{--});--}}
            })

//        })


    </script>


@endsection

@section('content')

    <main class="page-content offset-top-30">
        <div id="fb-root"></div>

        {{--<h4 class="text-center">TOP ADVERTISEMENTS</h4>--}}


        <h4 class="text-center">PRODUCTS BY POPULARITY</h4>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="owl-item">
                        <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                            <div>
                                <div class="post-media-wrap">
                                    <p>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>
                                    </p>
                                    <a href="#"><img src='{{secure_asset("images/$product->image")}}' width="370" height="231" alt="" class="img-responsive post-image"/></a>
                                    <ul class="post-categories list-inline-0">
                                        <li><a href="#"><span class="label label-primary">{{$product->category_name}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-content-wrap" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-sm-6" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product->price}}</div>
                                        <div class="col-sm-6" style="margin-top:-15px;">
                                            <a href=""><i class="fa fa-thumbs-up " aria-hidden="true"></i></a>
                                            <a href="">&#x263a;</a>
                                            ({{$product->like_counts}})
                                            <a href=""><img  src="{{secure_asset('images/fancy1.png')}}" class="img-responsive" style="width:25px" height="20px" /></a>
                                        </div>


                                        <h6>
                                            <a class="text-center" href="#"> {{$product->name}}</a>
                                            <button id="myFancy"> <i class="" ></i>fancy it</button>
                                        </h6>
                                        <div><a href=""><i class="fa fa-eye"></i></a> Listed in <a href="#">{{$product->store_name}}</a></div>
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

                </div>
            @endforeach
        </div>
        <br>



        <div style="text-align: center">
            <button class="btn btn-success" style="margin-bottom: 21px;" id="load_more">Load More.. </button>
            <span class="fa fa-spinner fa-spin fa-5x text-center" ></span>
        </div>


    </main>

@endsection