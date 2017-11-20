<?php
/**
 * Created by IntelliJ IDEA.
 * User: Freddy
 * Date: 11/18/2017
 * Time: 6:57 PM
 */

namespace App;


use App\Notifications\NewOrder;
use Illuminate\Support\Facades\Notification;
use Webpatser\Uuid\Uuid;

class ProductOrderFacade {

    public $productID = '';
    public $constructedOrderText='';
    public $user;
    public $shop;
    public $amount;
    public $qty;

    public function __construct($pID) {
        $this->productID = $pID;
        $this->user = \Auth::user();
        $this->amount = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
        $this->qty = \Gloudemans\Shoppingcart\Facades\Cart::count();
        $this->shop = Store::whereUserId($this->user->id)->first();
    }

    public function generateOrder() {

        if($this->qtyCheck()) {

            // Add Product to Cart
            $this->addToCart();

            // Calculate Shipping Charge
//            $this->calulateShipping();

            // Calculate Discount if any
//            $this->applyDiscount();

            // Place and confirm Order
            $this->placeOrder();

            //Notify Slack
            $this->notifySlack();

        }

    }

    private function addToCart () {
        /* .. add product to cart ..  */
    }

    private function qtyCheck() {

//        $qty = 'get product quantity from database';
//
//        if($qty > 0) {
//            return true;
//        } else {
//            return true;
//        }

        return true;
    }


    private function calulateShipping() {
        $shipping = new shippingCharge();
        $shipping->calculateCharge();
    }

    private function applyDiscount() {
        $discount = new discount();
        $discount->applyDiscount();
    }

    private function placeOrder() {
        $order_id = Uuid::generate();
        $order = new Order();
        $order->id = $order_id;
        $order->user_id = $this->user->id;
        $order->amount = $this->amount;
        $order->save();

        foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item) {

            $this->constructedOrderText .= "item :  $item->name => GHS $item->price * $item->qty \n";
            $orderItem = new OrderItem();
            $orderItem->id = Uuid::generate();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order_id;
            $orderItem->qty = $item->qty;
            $orderItem->save();

            $top_selling_product = TopSellingProduct::whereProductId($item->id)->whereUserId($this->user->id);

            if($top_selling_product->first()){
                $top_selling_product->update([
                    'count' => $top_selling_product->first()->count+1
                ]);
            }else {
                TopSellingProduct::create([
                    'id' => Uuid::generate(),
                    'user_id' => $this->user->id,
                    'store_id' => $this->shop->id,
                    'product_id' => $item->id,
                    'count' => 1
                ]);
            }
        }
    }

    public function qualifyForDiscount(){
        return true;
    }

    private function notifySlack(){
        Notification::send(Order::first(), new NewOrder($this->user,$this->shop,$this->constructedOrderText,$this->amount,$this->qty));
    }
}