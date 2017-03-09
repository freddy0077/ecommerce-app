@extends('market.layouts.template_2_layout')

@section('scripts')
        <script>
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

        </script>
@endsection


@section('content')

        <!--products-->

<div class="content-mid">
    <h3>Products by Popularity</h3>
    <label class="line"></label>
    <div class="mid-popular">
        @foreach($products as $product )
        <div class="col-md-3 item-grid simpleCart_shelfItem">
            <div class=" mid-pop">
                <div class="pro-img">
                    <img src="{{asset('frontend/images/pc.jpg')}}" height="200" class="img-responsive" alt="">
                    <div class="zoom-icon ">
                        <a class="picture" href="{{asset('frontend/images/pc.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                        <a href="#"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                    </div>
                </div>
                <div class="mid-1">
                    <div>
                        <div class="women-top">
                            <span>{{$product->category_name}}</span>
                            <h6><a href="#">{{$product->name}}</a></h6>
                        </div>
                        <div class="img item_add">
                            <a href="#">
                                <a>
                                    <img  src="{{secure_asset('images/fancy1.png')}}"  onclick="fancy('{{$product->id}}')" class="img-responsive" style="width:25px" height="20px" /></a>
                                {{--<img src="{{asset('frontend/images/ca.png')}}" alt="">--}}
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mid-2">
                        <p >
                            {{--<label>$100.00</label>--}}
                            <em class="item_price">GHS{{$product->price}}</em></p>
                        <div class="block">
                            {{--<span class="counts-{{$product->id}}">({{$product->like_counts}})</span>--}}
                            <span class="counts-{{$product->id}}">({{$product->like_counts}})</span>

                            <a href="#"><i class="fa fa-thumbs-up like" data-id ="{{$product->id}}" aria-hidden="true"></i></a>

                            {{--<div class="starbox small ghosting"> </div>--}}
                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <br>
            <br>
        </div>
        @endforeach

        <div class="clearfix"></div>
    </div>


    {{--<div class="mid-popular">--}}
        {{--<div class="col-md-3 item-grid simpleCart_shelfItem">--}}
            {{--<div class=" mid-pop">--}}
                {{--<div class="pro-img">--}}
                    {{--<img src="{{asset('frontend/images/pc4.jpg')}}" class="img-responsive" alt="">--}}
                    {{--<div class="zoom-icon ">--}}
                        {{--<a class="picture" href="{{asset('frontend/images/pc4.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>--}}
                        {{--<a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="mid-1">--}}
                    {{--<div class="women">--}}
                        {{--<div class="women-top">--}}
                            {{--<span>Men</span>--}}
                            {{--<h6><a href="single.html">On the other</a></h6>--}}
                        {{--</div>--}}
                        {{--<div class="img item_add">--}}
                            {{--<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="mid-2">--}}
                        {{--<p ><label>$100.00</label><em class="item_price">$70.00</em></p>--}}
                        {{--<div class="block">--}}
                            {{--<div class="starbox small ghosting"> </div>--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 item-grid simpleCart_shelfItem">--}}
            {{--<div class=" mid-pop">--}}
                {{--<div class="pro-img">--}}
                    {{--<img src="{{asset('frontend/images/pc5.jpg')}}" class="img-responsive" alt="">--}}
                    {{--<div class="zoom-icon ">--}}
                        {{--<a class="picture" href="{{asset('frontend/images/pc5.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>--}}
                        {{--<a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="mid-1">--}}
                    {{--<div class="women">--}}
                        {{--<div class="women-top">--}}
                            {{--<span>Men</span>--}}
                            {{--<h6><a href="single.html">Sed ut perspiciati</a></h6>--}}
                        {{--</div>--}}
                        {{--<div class="img item_add">--}}
                            {{--<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="mid-2">--}}
                        {{--<p ><label>$100.00</label><em class="item_price">$70.00</em></p>--}}
                        {{--<div class="block">--}}
                            {{--<div class="starbox small ghosting"> </div>--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 item-grid simpleCart_shelfItem">--}}
            {{--<div class=" mid-pop">--}}
                {{--<div class="pro-img">--}}
                    {{--<img src="{{asset('frontend/images/pc6.jpg')}}" class="img-responsive" alt="">--}}
                    {{--<div class="zoom-icon ">--}}
                        {{--<a class="picture" href="{{asset('frontend/images/pc6.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>--}}
                        {{--<a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="mid-1">--}}
                    {{--<div class="women">--}}
                        {{--<div class="women-top">--}}
                            {{--<span>Women</span>--}}
                            {{--<h6><a href="single.html">At vero eos</a></h6>--}}
                        {{--</div>--}}
                        {{--<div class="img item_add">--}}
                            {{--<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="mid-2">--}}
                        {{--<p ><label>$100.00</label><em class="item_price">$70.00</em></p>--}}
                        {{--<div class="block">--}}
                            {{--<div class="starbox small ghosting"> </div>--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 item-grid simpleCart_shelfItem">--}}
            {{--<div class=" mid-pop">--}}
                {{--<div class="pro-img">--}}
                    {{--<img src="{{asset('frontend/images/pc7.jpg')}}" class="img-responsive" alt="">--}}
                    {{--<div class="zoom-icon ">--}}
                        {{--<a class="picture" href="{{asset('frontend/images/pc7.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>--}}
                        {{--<a href="#"><i class="glyphicon glyphicon-menu-right icon"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="mid-1">--}}
                    {{--<div class="women">--}}
                        {{--<div class="women-top">--}}
                            {{--<span>Men</span>--}}
                            {{--<h6><a href="#">Sed ut perspiciati</a></h6>--}}
                        {{--</div>--}}
                        {{--<div class="img item_add">--}}
                            {{--<a href="#"><img src="{{asset('frontend/images/ca.png')}}" alt=""></a>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="mid-2">--}}
                        {{--<p ><label>$100.00</label><em class="item_price">$70.00</em></p>--}}
                        {{--<div class="block">--}}
                            {{--<div class="starbox small ghosting"> </div>--}}
                        {{--</div>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
    {{--</div>--}}
</div>

@endsection