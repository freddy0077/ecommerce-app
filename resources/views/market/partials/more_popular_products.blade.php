<script>
    @if($nextpageurl)
        nextPageUrl = "{{$nextpageurl}}";
    $('#load-more').show();
    @else
        nextPageUrl = null;
    $('#load-more').hide();
    @endif
</script>

<div class="row">
<!-- Begin extraslider-inner -->
<div class="so-extraslider products-list grid owl2-carousel owl2-theme owl2-loaded owl2-responsive-768"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

    @foreach($second_set as $product)
            <!--Begin Items-->
    {{--<div class="owl2-item" style="width: 223.333px">--}}
    <div class="owl2-item col-md-3">

    <div class="ltabs-item product-layout">
        <div class="product-item-container">
            <div class="left-block">
                <div class="product-image-container second_img">
                    <img src='{{isset($product->image)?asset("images/products/$product->image"):""}}'  alt="{{$product->name}}" class="img-responsive" />
                    <img src="{{asset("images/products/$product->image")}}"  alt="{{$product->name}}" class="img-responsive img_0" />
                </div>
                <!--Sale Label-->
                {{--<span class="label label-sale">Sale</span>--}}
                <span class="label label-new">New</span>

                <!--full quick view block-->
                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/quick-view-product',$product->id)}}">  Quickview</a>
                <!--end full quick view block-->
            </div>
            <div class="right-block">
                <div class="caption">
                    <h4><a href="">{{$product->name}} </a></h4>
                    <span>Listed in <a href='{{url("stores/$product->store_slug/$product->user_id")}}'>{{$product->store_name}}</a></span>
                    <div class="ratings">
                        {{--<div class="rating-box">--}}
                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                            {{--<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                            {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                        {{--</div>--}}
                    </div>

                    <div class="price">
                        @if($product->sale)
                            <span class="price-new">GH&#162; {{$product->sale_price}}</span>

                            <span class="price-old">GH&#162; {{$product->price}}</span>
                        @else
                            <span class="price-new">GH&#162; {{$product->price}}</span>

                        @endif
                    </div>
                </div>

                <div class="button-group">
                    @if(\Illuminate\Support\Facades\Auth::check() && \App\WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($product->store_id)->first())

                        <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
                            <i class="fa fa-eye-slash watch-toggle-{{$product->user_id}}"></i> <span class="button-group__text"></span>
                        </button>
                    @else
                        <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
                            <i class="fa fa-eye watch-toggle-{{$product->user_id}}"></i> <span class="button-group__text"></span>
                        </button>

                    @endif

                    <button class="wishlist" type="button" onclick="fancy.add('{{$product->id}}');">
                        @if(\Illuminate\Support\Facades\Auth::check() && \App\Fancy::whereProductId($product->id)->first())
                            <i class="fa fa-heart fancy-toggle-{{$product->id}}"></i>
                        @else
                            <i class="fa fa-heart-o fancy-toggle-{{$product->id}}"></i>
                        @endif
                    </button>

                    @if(\Illuminate\Support\Facades\Auth::check()&& \App\Like::whereUserId(Auth::user()->id)->whereProductId($product->id)->first())
                        <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                            <i class="fa fa-thumbs-down like-toggle-{{$product->id}}"></i>
                            <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                        </button>
                    @else
                        <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
                            <i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>
                            <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
                        </button>

                    @endif


                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');"><i  class="addthis_inline_share_toolbox"></i></button>


                    {{--<button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>--}}

                </div>


            </div><!-- right block -->
        </div>
    </div>

        </div>

    @endforeach
            <!--End Items-->
</div>
<!--End extraslider-inner -->

</div>