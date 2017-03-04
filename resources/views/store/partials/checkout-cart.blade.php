<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
    </div>
    <div class="panel-body" id="shopping-cart">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                </tr>
                </thead>
                <tbody>
                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $content)
                    <tr>

                        <td class="text-center"><a href="product.html">
                                <img src="http://placehold.it/50x75" alt="Xitefun Causal Wear Fancy Shoes"
                                     title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail"></a></td>
                        <td class="text-left"><a href="product.html">{{$content->name}}</a></td>
                        <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                                <input type="text" name="quantity" value="{{$content->qty}}" size="1" class="form-control qty">
                                    <span class="input-group-btn">
                                    <button data-toggle="tooltip" title="Update" onclick="updateCart('{{$content->rowId}}')" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick="checkOutRemoveFromCart('{{$content->rowId}}')"><i class="fa fa-times-circle"></i></button>
                                    </span></div></td>
                        <td class="text-right">{{$content->price}}</td>
                        <td class="text-right">{{$content->subtotal}}</td>
                    </tr>

                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                    <td class="text-right">GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                </tr>
                {{--<tr>--}}
                {{--<td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>--}}
                {{--<td class="text-right">$5.00</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td class="text-right" colspan="4"><strong>Eco Tax (-2.00):</strong></td>--}}
                {{--<td class="text-right">$4.00</td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                {{--<td class="text-right" colspan="4"><strong>VAT (20%):</strong></td>--}}
                {{--<td class="text-right">$151.00</td>--}}
                {{--</tr>--}}
                <tr>
                    <td class="text-right" colspan="4"><strong>Total:</strong></td>
                    <td class="text-right">GHS {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
