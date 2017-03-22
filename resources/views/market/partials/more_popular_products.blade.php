<script>
    @if($nextpageurl)
        nextPageUrl = "{{$nextpageurl}}";
    $('#load-more').show();
    @else
        nextPageUrl = null;
    $('#load-more').hide();
    @endif
</script>

<!-- Begin extraslider-inner -->
<div class="so-extraslider products-list grid"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="25" data-items_column0="5" data-items_column1="4" data-items_column2="3"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

    @foreach($second_set as $product)
            <!--Begin Items-->
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
                    <div class="ratings">
                        <div class="rating-box">
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        </div>
                    </div>

                    <div class="price">
                        <span class="price-new">GHS {{$product->price}}</span>
                        <span class="price-old">GHS {{$product->price}}</span>
                    </div>
                </div>

                <div class="button-group">
                    <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}');"><i class="fa fa-eye"></i> <span class="button-group__text">Add to Cart</span></button>
                    <button class="wishlist" type="button" onclick="fancy.add('{{$product->id}}');"><i class="fa fa-heart"></i>  </button>
                    <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');"><i class="fa fa-thumbs-up"></i><i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i> </button>
                    <button class="compare" type="button"  onclick=""><i class="fa fa-share"></i>  </button>

                </div>
            </div><!-- right block -->
        </div>
    </div>

    @endforeach
            <!--End Items-->
</div>
<!--End extraslider-inner -->