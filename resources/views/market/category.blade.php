@extends('market.layouts.without_slider_layout')

@section('scripts')
   <style>
       body{
           min-height: 80%;
       }
   </style>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.1.1/typeahead.bundle.min.js"></script>

   <div id="unusable-scripts">


       <script>

           $(document).ready(function(){
               var products = new Bloodhound({
                   hint: false,
                   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                   queryTokenizer: Bloodhound.tokenizers.whitespace,
                   remote: {
                       url: '/search-query?q=%QUERY%',
                       wildcard: '%QUERY%'
                   }
               });

//                     Initializing the typeahead with remote dataset without highlighting
               $('.typeahead').typeahead(null, {
                   name: 'products',
                   source: products,
                   limit: 20 /* Specify max number of suggestions to be displayed */
               });

               //style top list items
               $('#top-list-items a').css('margin-right','20px')

               $('#loading').hide();

               {{--var nextPageUrl  = {!! $nextpageurl?"\"$nextpageurl\";":"null;" !!}--}}

{{--            alert('{{(int)$products->currentpage()+1}}')--}}

            {{--var page = '{{(int)$products->currentpage()}}';--}}

               {{--var url = "{{url('/')}}/"+'?page=';--}}


//               $('#load-more').on('click',function(){
//                   page++
//
//                   $.ajax({
//                       url: url+page,
//                       dataType: "text",
//                       success: function(data) {
////                    $(".demo-card").html(data);
//                           $('#loader').append(data);
//                       }
//                   });
//
//               })
           })

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

        {{$products}}

    </main>

@endsection