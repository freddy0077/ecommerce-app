<?php

namespace App\Http\Controllers;

use App\MpowerPayment;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function getDashboard(){
        return view('admin.admin_dashboard');
    }

    public function getPaymentsData(){

        return view('admin.payments');
    }

    public function postMpowerDirectPay($name,$phone_number,$email,$amount)
    {
        $mpowerpayment = new MpowerPayment();
//        $results = $mpowerpayment->MobilePayment('Frederick','0241715148','frederickankamah988@gmail.com',1);
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
        Payment::whereToken($token)->first()->update([
            'response_code' => $results['response_code'],
            'response_text' => $results['response_text'],
            'description' =>   $results['description'],
            'transaction_id' => $results['transaction_id'],
            'tx_status'         => $results['tx_status'],
            'mobile_invoice_no' => $results['mobile_invoice_no'],
            'cancel_reason'     => $results['cancel_reason']
        ]);
        return $results;
    }

    public function getUsers(){
        $users = User::paginate();
        return view('admin.users',compact('users'));
    }
}
