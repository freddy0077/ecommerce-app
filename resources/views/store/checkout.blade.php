@extends('store.layouts.store_layout')

@section('scripts')


    <style>
        body{
            min-height: 80% !important;
        }
    </style>

    <script>
//        $(document).ready(function(){
//            $('.account').on('change',function(){
//                alert($(this).val());
//            })
//
//        })

    </script>

@endsection


@section('content')

    <div id="container">
        <div class="container main-container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href='{{url("")}}'><i class="fa fa-home"></i></a></li>
                {{--<li><a href="{{url('/cart')}}">Shopping Cart</a></li>--}}
                <li><a href="{{url('/checkout')}}">Checkout</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">

                {{--<div class="row">--}}
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h2 class="title">Checkout</h2>
                        <div class="row">
                            <div class="col-sm-4">
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading">--}}
                                        {{--<h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel-body">--}}
                                        {{--<div class="radio">--}}
                                            {{--<label>--}}
                                                {{--<input type="radio" value="register" name="account">--}}
                                                {{--Register Account</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="radio">--}}
                                            {{--<label>--}}
                                                {{--<input type="radio" checked="checked" value="guest" name="account">--}}
                                                {{--Guest Checkout</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="radio">--}}
                                            {{--<label>--}}
                                                {{--<input type="radio" value="returning" name="account">--}}
                                                {{--Returning Customer</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                                    </div>
                                    <div class="panel-body">
                                        <fieldset id="account">
                                            <div class="form-group required">
                                                <label for="input-payment-firstname" class="control-label"> Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="First Name" value="{{$user->name}}" name="firstname">
                                            </div>
                                            {{--<div class="form-group required">--}}
                                                {{--<label for="input-payment-lastname" class="control-label">Last Name</label>--}}
                                                {{--<input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">--}}
                                            {{--</div>--}}
                                            <div class="form-group required">
                                                <label for="input-payment-email" class="control-label">E-Mail</label>
                                                <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="{{$user->email}}" name="email">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-telephone" class="control-label">Phone Number</label>
                                                <input type="text" class="form-control" id="input-payment-telephone" placeholder="Phone Number" value="{{$user->phone_number}}" name="phone_number">
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="input-payment-fax" class="control-label">Fax</label>--}}
                                                {{--<input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="" name="fax">--}}
                                            {{--</div>--}}
                                        </fieldset>
                                    </div>
                                </div>
                                    @else

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="register" name="account" class="account">
                                                    Register Account</label>
                                            </div>
                                            {{--<div class="radio">--}}
                                                {{--<label>--}}
                                                    {{--<input type="radio" checked="checked" value="guest" name="account">--}}
                                                    {{--Guest Checkout</label>--}}
                                            {{--</div>--}}
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="returning" name="account" class="account">
                                                    Returning Customer</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default checkout-register">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-user"></i> Register</h4>
                                        </div>
                                        <div class="panel-body">
                                            <form action="{{url('/register-new-user')}}" id="checkout-register-form">
                                            <fieldset id="account">
                                                <div class="form-group required">
                                                    <label for="input-payment-firstname" class="control-label"> Name</label>
                                                    <input type="text" class="form-control" id="name" placeholder="First Name" name="name">
                                                </div>

                                                <div class="form-group required">
                                                    <label for="input-payment-email" class="control-label">E-Mail</label>
                                                    <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail"  name="email">
                                                </div>

                                                <div class="form-group required">
                                                    <label for="input-payment-telephone" class="control-label">Phone Number</label>
                                                    <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="" name="phone_number">
                                                </div>

                                                <div class="form-group required">
                                                <label for="input-payment-lastname" class="control-label">Password</label>
                                                <input type="password" class="form-control" id="input-payment-lastname" placeholder="password" value="" name="password">
                                                </div>

                                                <div class="form-group required">
                                                    <button type="submit" class="btn btn-success">Register</button>
                                                </div>



                                            </fieldset>
                                                </form>
                                        </div>
                                    </div>

                                    <div class="panel panel-default checkout-login">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-user"></i> Login</h4>
                                        </div>
                                        <div class="panel-body">
                                            <form action="{{url('/login')}}" id="checkout-login-form">
                                            <fieldset id="account">
                                                <div class="form-group required">
                                                    <label for="input-payment-email" class="control-label">E-Mail</label>
                                                    <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" name="email" required>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-payment-telephone" class="control-label">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
                                                </div>
                                                <div class="form-group ">
                                                    {{--<label for="input-payment-telephone" class="control-label">Password</label>--}}
                                                    <button type="submit" class="btn btn-success">Login</button>
                                                </div>

                                                {{--<div class="form-group">--}}
                                                {{--<label for="input-payment-fax" class="control-label">Fax</label>--}}
                                                {{--<input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="" name="fax">--}}
                                                {{--</div>--}}
                                            </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    @endif

                            </div>
                            <div class="col-sm-8">
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
                                                        Delivery</label>
                                                </div>
                                                {{--<div class="radio">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="Flat Shipping Rate">--}}
                                                        {{--Flat Shipping Rate - $8.00</label>--}}
                                                {{--</div>--}}
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
                                                        <input type="radio" checked="checked" name="Cash On Delivery">Cash On Delivery</label>
                                                </div>
                                                {{--<div class="radio">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="Bank Transfer">Bank Transfer</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="radio">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="radio" name="Paypal">Paypal</label>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="col-sm-12">--}}
                                        {{--<div class="panel panel-default">--}}
                                            {{--<div class="panel-heading">--}}
                                                {{--<h4 class="panel-title"><i class="fa fa-ticket"></i> Use Coupon Code</h4>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-body">--}}
                                                {{--<label for="input-coupon" class="col-sm-3 control-label">Enter coupon code</label>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">--}}
							  {{--<span class="input-group-btn">--}}
							  {{--<input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">--}}
							  {{--</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<div class="panel panel-default">--}}
                                            {{--<div class="panel-heading">--}}
                                                {{--<h4 class="panel-title"><i class="fa fa-gift"></i> Use Gift Voucher</h4>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-body">--}}
                                                {{--<label for="input-voucher" class="col-sm-3 control-label">Enter gift voucher code</label>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">--}}
							  {{--<span class="input-group-btn">--}}
							  {{--<input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">--}}
							  {{--</span> </div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-12" id="checkout-shopping-cart">
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

                                    <td class="text-center"><a href="#">
                                    <img src="http://placehold.it/50x75" alt="{{$content->name}}"
                                    title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail"></a></td>
                                    <td class="text-left"><a href="#">{{$content->name}}</a></td>
                                    <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">

                                    <input type="text" name="quantity" data-id="{{$content->rowId}}" value="{{$content->qty}}" size="1" class="form-control qty">
                                    <span class="input-group-btn">
                                    <button data-toggle="tooltip" title="Update"  class="btn btn-primary update"><i class="fa fa-refresh"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger"
                                    onclick="cart.checkoutRemove('{{$content->rowId}}','{{$user_id}}');"><i class="fa fa-times-circle"></i>
                                    </button>
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
                                    {{--<h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>--}}
                                    </div>
                                    <div class="panel-body">
                                    {{--<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>--}}
                                    <br>
                                    <label class="control-label" for="confirm_agree">
                                    <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                    <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                                    <div class="buttons">
                                    <div class="pull-right">
                                    <input type="button" class="btn btn-primary" id="button-confirm" onclick="cart.confirmOrder('{{$user_id}}')" value="Confirm Order">
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    {{--@endif--}}
                                    </div>
                                    </div>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->

@endsection