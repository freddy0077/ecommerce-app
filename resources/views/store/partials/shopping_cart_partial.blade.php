{{--<div id="cart">--}}
    {{--<button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">--}}
        {{--<span class="cart-icon pull-left flip"></span> <span id="cart-total">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}} item(s) - GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></button>--}}
    {{--<ul class="dropdown-menu">--}}
        {{--<li>--}}
            {{--<table class="table">--}}
                {{--<tbody>--}}

                {{--<tr>--}}
                {{--<td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="{{asset('store_resources/image/product/sony_vaio_1-50x50.jpg')}}"></a></td>--}}
                {{--<td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></td>--}}
                {{--<td class="text-right">x 1</td>--}}
                {{--<td class="text-right">$902.00</td>--}}
                {{--<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>--}}
                {{--</tr>--}}
                {{--@foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $content)--}}

                    {{--<tr>--}}
                        {{--<td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="{{asset('store_resources/image/product/sony_vaio_1-50x50.jpg')}}"></a></td>--}}
                        {{--<td class="text-left"><a href="product.html">{{$content->name}}</a></td>--}}
                        {{--<td class="text-right">x {{$content->qty}}</td>--}}
                        {{--<td class="text-right">GHS {{$content->price}}</td>--}}
                        {{--<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="removeFromCart('{{$content->rowId}}')" type="button"><i class="fa fa-times"></i></button></td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--<tr>--}}
                {{--<td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="{{asset('store_resources/image/product/samsung_tab_1-50x50.jpg')}}"></a></td>--}}
                {{--<td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a></td>--}}
                {{--<td class="text-right">x 1</td>--}}
                {{--<td class="text-right">$230.00</td>--}}
                {{--<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<div>--}}
                {{--<table class="table table-bordered">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td class="text-right"><strong>Sub-Total</strong></td>--}}
                        {{--<td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td class="text-right"><strong>Eco Tax (-2.00)</strong></td>--}}
                    {{--<td class="text-right">$4.00</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td class="text-right"><strong>VAT (20%)</strong></td>--}}
                    {{--<td class="text-right">$188.00</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td class="text-right"><strong>Total</strong></td>--}}
                        {{--<td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
                {{--<p class="checkout"><a href="{{url('/cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>--}}
                    {{--&nbsp;&nbsp;&nbsp;<a href="{{url('/checkout')}}" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>--}}
            {{--</div>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</div>--}}


        <!--cart-->
<div id="cart" class=" btn-group btn-shopping-cart">
    <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
        <div class="shopcart">
            <span class="handle pull-left"></span>
            <span class="title">My cart</span>
            <p class="text-shopping-cart cart-total-full">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}} item(s) - GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} </p>
        </div>
    </a>

    <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">

        <li>
            <table class="table table-striped">
                <tbody>

                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $content)

                    <tr>
                        <td class="text-center" style="width:70px">
                            <a href="#">
                                <img src="https://placehold.it/30x30" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview">
                            </a>
                        </td>
                        <td class="text-left"> <a class="cart_product_name" href="#">{{$content->name}}</a> </td>
                        <td class="text-center"> x{{$content->qty}} </td>
                        <td class="text-center"> GHS {{$content->price}} </td>
                        <td class="text-right">
                            <a href="#" class="fa fa-edit"></a>
                        </td>
                        <td class="text-right">
                            <a onclick="cart.remove('{{$content->rowId}}','{{$user_id}}');" class="fa fa-times fa-delete"></a>

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </li>
        <li>
            <div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="text-left"><strong>Sub-Total</strong>
                        </td>
                        <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                    </tr>

                    {{--<tr>--}}
                    {{--<td class="text-left"><strong>VAT (20%)</strong>--}}
                    {{--</td>--}}
                    {{--<td class="text-right">$200.00</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td class="text-left"><strong>Total</strong>
                        </td>
                        <td class="text-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-right"> <a class="btn view-cart" href="{{url('/store/checkout',$user_id)}}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-mega checkout-cart" href="{{url('store/checkout',$user_id)}}"><i class="fa fa-share"></i>Checkout</a>
                </p>
            </div>
        </li>
    </ul>
</div>
<!--//cart-->


