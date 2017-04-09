<div class="button-group">
    @if(\Illuminate\Support\Facades\Auth::check() && \App\WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($product->store_id)->first())

        <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
            <i style="color:green" class="icon-user-following watch-toggle-{{$product->user_id}}"></i> <span class="button-group__text"></span>
        </button>
    @else
        <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$product->id}}', '{{$product->store_id}}','{{$product->user_id}}');">
            {{--<i class="fa fa-eye watch-toggle-{{$product->user_id}}"></i> <span class="button-group__text"></span>--}}
            <i class="icon-user-follow watch-toggle-{{$product->user_id}}"></i> <span class="button-group__text"></span>
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
            <i class="fa fa-thumbs-up like-toggle-{{$product->id}}" style="color: green;"></i>
            <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
        </button>
    @else
        <button class="compare" type="button"  onclick="likes.add('{{$product->id}}');">
            <i class="fa fa-thumbs-up like-toggle-{{$product->id}}"></i>
            <i class="like-counts-{{$product->id}}">{{$product->like_counts}} </i>
        </button>

    @endif


    {{--<button class="compare" type="button"  onclick="likes.add('{{$product->id}}');"><i  class="addthis_inline_share_toolbox"></i></button>--}}


    {{--<button class="compare" type="button"  onclick="compare.add('42');"><i class="fa fa-exchange"></i>  </button>--}}

</div>
