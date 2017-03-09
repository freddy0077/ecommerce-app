@extends('market.layouts.master')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.1.1/typeahead.bundle.min.js"></script>



    <div id="unusable-scripts">


    <script>

        function loadScriptsAgain(){
            $('.like').on('click',function(event){
                event.preventDefault();
                var product_id = $(this).data('id')

                @if(Auth::check())

                $.post("{{secure_url('/like-it')}}/"+product_id,function(data){
                    $('.counts-'+product_id).text(data.likes)
                });

                @elseif(Auth::guest())
                $('#login-modal').modal();
                @endif


            });

            function fancy(product_id) {
                @if(Auth::check())

                 $.post("{{secure_url('/fancy-it')}}/"+product_id,function(data){
                    $('.fancy').click(function(){
                        $(this).addClass('fa fa-spinner fa-spin')

                    })

                });

                @elseif(Auth::guest())
                $('#login-modal').modal();
                @endif

            }

            function like(product_id) {
                @if(Auth::check())

                 $.post("{{secure_url('/like-it')}}/"+product_id,function(data){

                });

                @elseif(Auth::guest())
                $('#login-modal').modal();
                @endif

            }
        }

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
                        loadScriptsAgain();
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

        <div class="row">
            <div class="col-md-9">
                <h4 class="text-center">PRODUCTS BY POPULARITY</h4>

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-4 col-xs-4">
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
                                                <div class="col-sm-6 price-tag" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product->price}}</div>
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

                <h4 class="text-center">SHOP FROM CATEGORIES</h4>

                {{--<div class="row">--}}

                <div class="shell">

                        <div class="row">

                            @foreach($categories as $category)

                                <div class="col-xs-18 col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="http://placehold.it/500x250/EEE">
                                        <div class="caption">
                                            <h6 class="text-center">{{$category->name}}</h6>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            {{--<div class="col-xs-18 col-sm-6 col-md-3">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img src="http://placehold.it/500x250/EEE">--}}
                                    {{--<div class="caption">--}}
                                        {{--<h6 class="text-center">Category</h6>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-18 col-sm-6 col-md-3">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img src="http://placehold.it/500x250/EEE">--}}
                                    {{--<div class="caption">--}}
                                        {{--<h6 class="text-center">Category</h6>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-18 col-sm-6 col-md-3">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img src="http://placehold.it/500x250/EEE">--}}
                                    {{--<div class="caption">--}}
                                        {{--<h6 class="text-center">Category</h6>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </div><!--/row-->
                    {{--</div><!--/container -->--}}
                </div>

                <hr>

                <h4 class="text-center">EDITOR'S PICKS</h4>

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-4 col-xs-4">
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
                                                <div class="col-sm-6 price-tag" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product->price}}</div>
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

            </div>

            <div class="col-md-3">

                <div class="cell-md-3">

                    <div class="range offset-top-30 offset-md-top-0">
                        <div class="cell-sm-8 cell-sm-preffix-2 cell-md-12 cell-md-preffix-0">
                            <div class="box text-center">
                                {{--<div class="section-xs-size section-bottom-10"><img src="images/sidebar-01.jpg" width="193" height="193" alt="" class="img-circle img-responsive offset-top-5">--}}
                                    {{--<h5>Startup by Daryl & Ray<br>Chief Guys and Founders</h5>--}}
                                    {{--<p>Our journey for an ecologically friendly yet energetic and powerful bicycle started out in Antarctica.</p>--}}
                                {{--</div>--}}
                                <hr class="divider">
                                {{--<div class="section-xs-size"><a href="#" class="btn btn-primary">Read more</a></div>--}}
                            </div>
                        </div>
                        <div class="cell-sm-8 cell-sm-preffix-2 cell-md-12 cell-md-preffix-0 offset-top-30">
                            <div class="box text-center">
                                <div class="section-xs-size">
                                    <h5>Follow us</h5>
                                    <ul class="list-inline-0">
                                        <li><a href="#" class="icon icon-circle fa-facebook icon-default text-info"></a></li>
                                        <li><a href="#" class="icon icon-circle fa-twitter icon-default text-info"></a></li>
                                        <li><a href="#" class="icon icon-circle fa-google-plus icon-default text-info"></a></li>
                                        <li><a href="#" class="icon icon-circle fa-linkedin icon-default text-info"></a></li>
                                        <li><a href="#" class="icon icon-circle fa-pinterest icon-default text-info"></a></li>
                                    </ul>
                                </div>
                                <hr class="divider offset-none">
                                <div class="section-xs-size">
                                    <h5>Newsletter</h5>
                                    <p>Sign up for the latest news on this startup further process and when the product will be released!</p>

                                    <form data-result-class="rd-mailform-validate" data-form-type="subscribe" method="post" action="bat/rd-mailform.php" class="rd-mailform form-inline-flex form-inline reveal-xs-flex">
                                        <input type="text" name="email" data-constraints="@NotEmpty @Email" placeholder="Your e-mail">
                                        <button class="btn btn-primary offset-top-15 offset-xs-top-0"> Subscribe</button>
                                    </form>

                                </div>
                                <div class="rd-mailform-validate">
                                    <form action="#" class="form-inline-custom form-inline-flex reveal-xs-flex">
                                        <div class="form-group offset-bottom-0">
                                            <input type="text" name="email" placeholder="Search..." class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-icon material-icons-search btn-primary offset-top-10 offset-xs-top-0"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="cell-sm-8 cell-sm-preffix-2 cell-md-12 cell-md-preffix-0 offset-top-30">
                            <div class="box section-xs-size bg-img-sidebar-02">
                                <h5>Kickstarter</h5>
                                <h3 class="text-primary reveal-inline-block">$2,350</h3><span class="big"> pledged</span>
                                <hr class="divider offset-top-20">
                                <h3 class="text-primary reveal-inline-block">120%</h3><span class="big"> funded</span>
                                <hr class="divider offset-top-20">
                                <h3 class="text-primary reveal-inline-block">10</h3><span class="big"> backers</span>
                                <hr class="divider offset-top-20">
                                <h3 class="text-primary reveal-inline-block">8</h3><span class="big"> days to go</span><a href="#" class="btn btn-lg btn-primary reveal-block offset-top-20">Support us on Kickstarter</a>
                            </div>
                        </div>
                        <div class="cell-sm-8 cell-sm-preffix-2 cell-md-12 cell-md-preffix-0 offset-top-30">
                            <div class="box section-xs-size">
                                <h5>Facebook</h5>
                                <div class="ofset-top-5">
                                    <div class="fb-widget">

                                        <div class="fb-page-responsive">
                                            <div data-href="https://www.facebook.com/TemplateMonster" data-tabs="timeline" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" class="fb-page">
                                                <div class="fb-xfbml-parse-ignore">
                                                    <blockquote cite="https://www.facebook.com/TemplateMonster"><a href="https://www.facebook.com/TemplateMonster">TemplateMonster</a></blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                </div>


            </div>
        </div>



    </main>

@endsection