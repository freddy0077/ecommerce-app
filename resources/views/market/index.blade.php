@extends('market.layouts.master')

@section('scripts')
    <div id="unusable-scripts">
    <script>
        $(document).ready(function(){
            //style top list items
            $('#top-list-items a').css('margin-right','20px')

            $('#loading').hide();

            var nextPageUrl  = {!! $nextpageurl?"\"$nextpageurl\";":"null;" !!}

{{--            alert('{{(int)$products->currentpage()+1}}')--}}

            var page = '{{(int)$products->currentpage()}}';

            var url = "{{url('/')}}/"+'?page=';


        $('#load-more').on('click',function(){
            page++

                $.ajax({
                    url: url+page,
                    dataType: "text",
                    success: function(data) {
//                    $(".demo-card").html(data);
                        $('#loader').append(data);
//                        $('#loader').append(data);
//                        $('#loader h4').hide()
//                        $('#loader #load-button').hide()
//                        $('#loader header').hide()
//                        $('#loader footer').hide()
//                        $('#loader .modal').hide()

                    }
                });

                {{--$.get(nextPageUrl,function(data){--}}
                {{--@include('market.partials.more_popular_products', ['some' => 'data'])--}}

                {{--//                $('#loading').show();--}}
                {{--$('#loader').append(data);--}}
                {{--$('#loader h4').hide()--}}
                {{--$('#loader #load-button').hide()--}}
                {{--$('#loader header').hide()--}}
                {{--$('#loader footer').hide()--}}
                {{--$('#loader .modal').hide()--}}

                {{--}).success(function(){--}}
                {{--$('#loading').hide();--}}
                {{--});--}}


                {{--$('.loader').load('{{url($nextpageurl)}}')--}}
            })
        })

    </script>

    </div>


@endsection

@section('content')

    <main class="page-content offset-top-30">
        {{--<div id="fb-root"></div>--}}

        <h4 class="text-center">PRODUCTS BY POPULARITY</h4>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-4">
                    <div class="owl-item">
                        <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                            <div>
                                <div class="post-media-wrap">
                                    <a href="#">
                                        {{--<img src='{{secure_asset("images/$product->image")}}' width="370" height="231" alt="" class="img-responsive post-image"/>--}}
                                        <img src='{{secure_asset("images/nike_shoes.jpg")}}' width="370" height="231" alt="" class="img-responsive post-image"/>
                                    </a>
                                    <ul class="post-categories list-inline-0">
                                        <li><a href="#"><span class="label label-primary">{{$product->category_name}}</span></a></li>
                                    </ul>
                                </div>
                                <div class="post-content-wrap" style="padding-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-sm-6" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product->price}}</div>
                                        <div class="col-sm-6" style="margin-top:-15px;">
                                            <a href="#"><i class="fa fa-thumbs-up like" data-id ="{{$product->id}}" aria-hidden="true"></i></a>
                                            {{--<a href="">&#x263a;</a>--}}
                                            <span class="counts-{{$product->id}}">({{$product->like_counts}})</span>
                                            <a href="#"><img  src="{{secure_asset('images/fancy1.png')}}"  onclick="fancy('{{$product->id}}')" class="img-responsive" style="width:25px" height="20px" /></a>
                                        </div>


                                        <h6>
                                            <a class="text-center" href="#"> {{$product->name}}</a>
                                            <?php  ?>
                                            {{--<button  onclick="fancy('{{$product->id}}')"> <i class="fancy" ></i>fancy it</button>--}}
                                        </h6>
                                        <div><a href=""><i class="fa fa-eye"></i></a> Listed in
                                            <a href='{{secure_url("/stores/$product->store_slug/$product->user_id")}}'>{{$product->store_name}}</a>
                                        </div>
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

        <div id="loader"></div>



        <div id="load-button" style="text-align: center" >
            <button class="btn btn-success" style="margin-bottom: 21px;" id="load-more">Load More.. </button>
            {{--<span id="loading" class="fa fa-spinner fa-spin fa-5x text-center" ></span>--}}
        </div>

    </main>

@endsection