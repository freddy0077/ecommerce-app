<?php

namespace App\Http\Controllers;

use App\MpowerPayment;
use App\Package;
use App\PackageSignup;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class AdminController extends Controller
{
    //

    public function getDashboard(){
        return view('admin.admin_dashboard');
    }

    public function getPaymentsData(){

        return view('admin.payments');
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
            PackageSignup::create([
                'id' => Uuid::generate(),
                'user_id' => Auth::user()->id,
                'package_id' => $complete->package_id
            ]);
        }

        return $results;
    }

    public function getUsers(){
        $users = User::paginate();
        return view('admin.users',compact('users'));
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
}
