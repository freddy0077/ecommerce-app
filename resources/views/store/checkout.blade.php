@extends('store.layouts.master')

@section('scripts')
    <script>
//        $(document).ready(function(){

           var qty1 = $('.qty').val();
            function updateCart(rowId,qty){
                alert('rowId: '+rowId+' '+ qty)
            }
//        })
    </script>

@endsection


@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{url('/cart')}}">Shopping Cart</a></li>
                <li><a href="{{url('/checkout')}}">Checkout</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">Checkout</h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                                        </div>
                                        <div class="panel-body">
                                            <p>Please select the preferred shipping method to use on this order.</p>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="Free Shipping">
                                                    Delivery - $0.00</label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Flat Shipping Rate">
                                                    Pick Up - $8.00</label>
                                            </div>
                                            {{--<div class="radio">--}}
                                                {{--<label>--}}
                                                    {{--<input type="radio" name="Per Item Shipping Rate">--}}
                                                    {{--Per Item Shipping Rate - $150.00</label>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                                        </div>
                                        <div class="panel-body">
                                            <p>Please select the preferred payment method to use on this order.</p>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="Cash On Delivery">
                                                    Cash</label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Bank Transfer">
                                                    Mobile Money</label>
                                            </div>
                                            {{--<div class="radio">--}}
                                                {{--<label>--}}
                                                    {{--<input type="radio" name="Paypal">--}}
                                                    {{--Paypal</label>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-ticket"></i> Use Coupon Code</h4>
                                        </div>
                                        <div class="panel-body">
                                            <label for="input-coupon" class="col-sm-3 control-label">Enter coupon code</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                          <span class="input-group-btn">
                          <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                          </span></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12" id="shopping-cart">
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
                                </div>
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
                                        </div>
                                        <div class="panel-body">
                                            <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
                                            <br>
                                            <label class="control-label" for="confirm_agree">
                                                <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                                <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <input type="button" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>

@endsection