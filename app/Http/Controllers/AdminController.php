<?php

namespace App\Http\Controllers;

use App\MpowerPayment;
use App\Order;
use App\Package;
use App\PackageSignup;
use App\Payment;
use App\ProductCategory;
use App\Store;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class AdminController extends Controller
{
    //

    public function getDashboard(){
        $orders = Order::count();
        $users  = User::count();
        return view('admin.admin_dashboard',compact('orders','users'));
    }

    public function getPaymentsData(){

        return view('admin.payments');
    }

    public function getAllOrders(){
        $orders = Order::leftJoin('users','users.id','=','orders.user_id')
            ->selectRaw('orders.*,users.name')
            ->paginate();

        return view('admin.orders',compact('orders'));
    }

    public function getOrderItems($order_id){
        $order = Order::with(['items','user' =>function($query){}])
            ->whereId($order_id)
            ->first();
//        return OrderItem::with('order','product')->get();

        return view('admin.order-items',compact('order'));
    }

    public function postMpowerDirectPay(Request $request,$amount)
    {
        $mpowerpayment = new MpowerPayment();
//        $results = $mpowerpayment->MobilePayment('Frederick','0241715148','frederickankamah988@gmail.com',1);
        $name = $request->name;
        $phone_number = $request->phone_number;
        $email =        Auth::user()->email;
        $results = $mpowerpayment->MobilePayment($name,$phone_number,$email,$amount);
        Payment::create([
            'id' =>Uuid::generate(),
            'response_code' => $results['response_code'],
            'response_text' => $results['response_text'],
            'description' =>   $results['description'],
            'transaction_id' => $results['transaction_id'],
            'token'         => $results['token'],
            'mobile_invoice_no' => $results['mobile_invoice_no'],
            'user_id'           => Auth::user()->id,
            'amount'            => $amount
        ]);

        return $results;

    }


    public function postConfirmToken($token)
    {
        $mpowerpayment = new MpowerPayment();
        $results = $mpowerpayment->CheckStatus($token);
        $builder =Payment::whereToken($token);

            $builder->first()->update([
            'response_code' => $results['response_code'],
            'response_text' => $results['response_text'],
            'description' =>   $results['description'],
            'transaction_id' => $results['transaction_id'],
            'tx_status'         => $results['tx_status'],
            'mobile_invoice_no' => $results['mobile_invoice_no'],
            'cancel_reason'     => $results['cancel_reason']
        ]);

        if($complete = $builder->where('tx_status','complete')->first()){

            $user = Auth::user();
            if(PackageSignup::whereUserId($user->id)->first() && Package::getUserPackage($user->id) != $complete->package_id){
                PackageSignup::whereUserId($user->id)->first()->update([
                    'package_id'  => $complete->package_id
                ]);
            }else{
                PackageSignup::create([
                    'id' => Uuid::generate(),
                    'user_id' => $user->id,
                    'package_id' => $complete->package_id,
                    'store_id'  => Store::whereUserId($user->id)->first()->id
                ]);

            }

        }

        return $results;
    }

    public function getUsers(){
        $builder = User::leftJoin('stores','stores.user_id','=','users.id');

            $users = $builder->selectRaw('users.*,stores.id as store_id')
            ->paginate();
        return view('admin.users',compact('users'));
    }

    public function getStore(){

    }

    public function getPackages(){
        $packages = Package::paginate();
        return view('admin.packages',compact('packages'));
    }


    public function postAddNewPackage(Request $request){
        Package::create([
            'id' => Uuid::generate(),
            'name' => $request->name,
            'charge' => $request->charge,
            'description' => $request->description,
            'number_of_products' => $request->number_of_products,
            'duration' => $request->duration,
            'payment_link' => $request->payment_link,
            'type'         => $request->type
        ]);
    }

    public function getProductCategories(){
        $categories = ProductCategory::with('subcategories')->orderBy('enable','desc')->paginate();
        return view('admin.product_categories',compact('categories'));
    }

    public function postAddNewProductCategory(Request $request){
        ProductCategory::create([
            'id' => Uuid::generate(),
            'name' => $request->name,
            'user_id' =>Auth::user()->id
        ]);
    }

    public function postUpdateCategory(Request $request){
        ProductCategory::find($request->edit_category_id)->update([
            'name' => $request->edit_category_name,
            'enable' => $request->enable == "on"?true : false
        ]);
    }


    public function postAddSubCategories(Request $request){
//        return $request;
        $names = $request->get('name');
        $category = $request->category;

        foreach($names as $name){
            SubCategory::create([
                'id' => Uuid::generate(),
                'name' => $name,
                'product_category_id' => $category
            ]);
        }
    }
}
