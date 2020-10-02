<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\City;
use App\Transaction;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class CustomersController extends Controller{

    public function index(){
        return view('customers/index');
    }
    public function about(){
        return view('customers/about');
    }

    public function services(){
        return view('customers/services');
    }
    public function contact(){
        return view('customers/contact');
    }
    public function login(){
        return view('customers/login');
    }
    public function register(){
        return view('customers/register');
    }
    public function faqs(){
        return view('customers/faqs');
    }
    public function dashboard(){
        $user = Auth::user();
        $completed_dispatches = DispatchOrder::where(["user_id"=>$user->id, "status"=>"Delivered"])->count();
        $awaiting_payment_dispatches = DispatchOrder::where(["user_id"=>$user->id, "payment_status"=>"Pending"])->count();
        $transit_dispatches = DispatchOrder::where(["user_id"=>$user->id, "status"=>"In transit"])->count();
        $recent_dispatches = DispatchOrder::orderBy("id", "DESC")->where(["user_id"=>$user->id])->take(10)->get();
        return view('customers/dashboard')->with(compact('completed_dispatches', 'awaiting_payment_dispatches', 'transit_dispatches', 'recent_dispatches'));
        
    }

    public function electricity(){
        return view('customers/electricity');
    }
    public function airtime(){
        return view('customers/airtime');
    }

    public function data(){
        return view('customers/data');
    }
    public function tv(){
        return view('customers/tv');
    }

    public function getDataVariations($serviceID){
        $variations = $this->getVariations($serviceID);
        //var_dump($variations);
        if($variations->response_description == "000"){
            $variations = $variations->content;
            return view('customers/data_variations')->with(compact('variations'));
        }else{
            Session::flash('error', 'Unable to fetch data. Kindly retry.');
            return back();
        }
    }
    public function getTVVariations($serviceID){
        $variations = $this->getVariations($serviceID);
        //var_dump($variations);
        if($variations->response_description == "000"){
            $variations = $variations->content;
            return view('customers/tv_variations')->with(compact('variations'));
        }else{
            Session::flash('error', 'Unable to fetch data. Kindly retry.');
            return back();
        }
    }

    public function verifyMeter(Request $request){
        $meter_number = $request->input('meter_number');
        $price = $request->input('price');
        $disco = $request->input('disco');
        $type = $request->input('type');
        $verify = $this->verifyMeterVtPass($meter_number, $disco, $type);
        
        if(!isset($verify->content->error)){
            return view('customers/meter_verify')->with(compact('verify', 'price', 'disco', 'type'));
        }else{
            Session::flash('error', 'Meter number not found for disco '.$disco. '. Kindly check the provided meter number and try again');
            return back();
        }
        
    }

    public function verifyTVCode(Request $request){
        $billersCode = $request->input('billersCode');
        $price = $request->input('price');
        $variation_code = $request->input('variation_code');
        $variation_name = $request->input('variation_name');
        $serviceID = $request->input('serviceID');
        $verify = $this->verifyTVVtPass($billersCode, $serviceID);
        //var_dump($verify);
        
        if(!isset($verify->content->error)){
            return view('customers/tv_verify')->with(compact('verify', 'price', 'variation_name', 'variation_code', 'serviceID'));
        }else{
            Session::flash('error', 'Smartcard/IUC number not found for '.$serviceID. '. Kindly check the provided number and try again');
            return back();
        }
        
    }

    public function executeTVPurchase(Request $request){
        $password = time();
        $password_message = "";
        if(Auth::user() != null){
            $user = Auth::user();
        }else{
            $user = User::where("email",$request->input('email'))->first();  
            if($user == null){ 
                $user = new User;
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->role = "Customer";
                $user->password = bcrypt($password);
                $user->save();
                Auth::loginUsingId($user->id);
                $password_message = "You are automatically logged in. Your password id is ".$password.". Endeavour to change it by clicking profile";
            }
        }
        if($request->input('payment_method') == "Pay with card"){
            $this->executeTransaction($request->input('price'), $request->input('trn_ref'), "Credit", $user->id, "Customer", "Payment with card (paystack)" );
        }elseif($request->input('payment_method') == "Pay with wallet"){

        }else {
            Session::flash('error', 'Payment method not captured. Kindly contact administrator');
            return back();
        }
        $billersCode = $request->input('billersCode');
        $price = $request->input('price');
        $serviceID = $request->input('serviceID');
        $variation_code = $request->input('variation_code');
        $phone = $request->input('phone');
        $trn_ref = time();
        $verify = $this->payTVVtPass($trn_ref, $serviceID, $billersCode, $variation_code, $price, $phone);
        if(isset($verify->response_description)){
            if($verify->response_description == "TRANSACTION SUCCESSFUL"){
                $this->executeTransaction($request->input('price'), $trn_ref, "Debit", $user->id, "Customer", "Debit for customer tv subscription. Smartcard/IUC no: ".$billersCode );
                Session::flash('success', 'Transaction was successfull. '.$password_message);
                return redirect('customers/transactions');
            }else{
                Session::flash('error', 'Unable to load your meter at this moment.');
                return back();
            }
        }   else{
            Session::flash('error', 'Unable to load your meter at this moment.');
            return back();
        }
    }

    public function executeElectricityPurchase(Request $request){
        $password = time();
        $password_message = "";
        if(Auth::user() != null){
            $user = Auth::user();
        }else{
            $user = User::where("email",$request->input('email'))->first();  
            if($user == null){ 
                $user = new User;
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->role = "Customer";
                $user->password = bcrypt($password);
                $user->save();
                Auth::loginUsingId($user->id);
                $password_message = "You are automatically logged in. Your password id is ".$password.". Endeavour to change it by clicking profile";
            }
        }
        if($request->input('payment_method') == "Pay with card"){
            $this->executeTransaction($request->input('price'), $request->input('trn_ref'), "Credit", $user->id, "Customer", "Payment with card (paystack)" );
        }elseif($request->input('payment_method') == "Pay with wallet"){

        }else {
            Session::flash('error', 'Payment method not captured. Kindly contact administrator');
            return back();
        }
        $meter_number = $request->input('billersCode');
        $price = $request->input('price');
        $disco = $request->input('serviceID');
        $type = $request->input('variation_code');
        $phone = $request->input('phone');
        $trn_ref = time();
        $verify = $this->payMeterVtPass($trn_ref, $disco, $meter_number, $type, $price, $phone);
        if(isset($verify->response_description)){
            if($verify->response_description == "TRANSACTION SUCCESSFUL"){
                $this->executeTransaction($request->input('price'), $trn_ref, "Debit", $user->id, "Customer", "Debit for customer electricity purchase. Meter no: ".$meter_number );
                Session::flash('success', 'Transaction was successfull. '.$password_message);
                return redirect('customers/transactions');
            }else{
                Session::flash('error', 'Unable to load your meter at this moment.');
                return back();
            }
        }   else{
            Session::flash('error', 'Unable to load your meter at this moment.');
            return back();
        }
    }

    public function executeAirtimePurchase(Request $request){
        $password = time();
        $password_message = "";
        if(Auth::user() != null){
            $user = Auth::user();
        }else{
            $user = User::where("email",$request->input('email'))->first();  
            if($user == null){ 
                $user = new User;
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->role = "Customer";
                $user->password = bcrypt($password);
                $user->save();
                Auth::loginUsingId($user->id);
                $password_message = "You are automatically logged in. Your password id is ".$password.". Endeavour to change it by clicking profile";
            }
        }
        if($request->input('payment_method') == "Pay with card"){
            $this->executeTransaction($request->input('price'), $request->input('trn_ref'), "Credit", $user->id, "Customer", "Payment with card (paystack)" );
        }elseif($request->input('payment_method') == "Pay with wallet"){

        }else {
            Session::flash('error', 'Payment method not captured. Kindly contact administrator');
            return back();
        }
        $serviceID = $request->input('serviceID');
        $price = $request->input('price');
        $phone = $request->input('phone');
        $trn_ref = time();
        $verify = $this->payAirtimeVtPass($trn_ref, $serviceID, $price, $phone);
        if(isset($verify->response_description)){
            if($verify->response_description == "TRANSACTION SUCCESSFUL"){
                $this->executeTransaction($request->input('price'), $trn_ref, "Debit", $user->id, "Customer", "Debit for customer airtime purchase. Phone no: ".$phone );
                Session::flash('success', 'Transaction was successfull. '.$password_message);
                return redirect('customers/transactions');
            }else{
                Session::flash('error', 'Unable to recharge your number at this moment.');
                return back();
            }
        }   else{
            Session::flash('error', 'Unable to recharge your number at this moment.');
            return back();
        }
        
    }

    public function executeDataPurchase(Request $request){
        $password = time();
        $password_message = "";
        if(Auth::user() != null){
            $user = Auth::user();
        }else{
            $user = User::where("email",$request->input('email'))->first();  
            if($user == null){ 
                $user = new User;
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');
                $user->role = "Customer";
                $user->password = bcrypt($password);
                $user->save();
                Auth::loginUsingId($user->id);
                $password_message = "You are automatically logged in. Your password id is ".$password.". Endeavour to change it by clicking profile";
            }
        }
        if($request->input('payment_method') == "Pay with card"){
            $this->executeTransaction($request->input('price'), $request->input('trn_ref'), "Credit", $user->id, "Customer", "Payment with card (paystack)" );
        }elseif($request->input('payment_method') == "Pay with wallet"){

        }else {
            Session::flash('error', 'Payment method not captured. Kindly contact administrator');
            return back();
        }
        $serviceID = $request->input('serviceID');
        $variation_code = $request->input('variation_code');
        $price = $request->input('price');
        $phone = $request->input('phone');
        $trn_ref = time();
        $verify = $this->payDataVtPass($trn_ref, $variation_code, $serviceID, $price, $phone);
        if(isset($verify->response_description)){
            if($verify->response_description == "TRANSACTION SUCCESSFUL"){
                $this->executeTransaction($request->input('price'), $trn_ref, "Debit", $user->id, "Customer", "Debit for customer data purchase. Phone no: ".$phone );
                Session::flash('success', 'Transaction was successfull. '.$password_message);
                return redirect('customers/transactions');
            }else{
                Session::flash('error', 'Unable to recharge your number at this moment.');
                return back();
            }
        }   else{
            Session::flash('error', 'Unable to recharge your number at this moment.');
            return back();
        }
        
    }

    public function payDataVtPass($trn_ref, $variation_code, $serviceID, $price, $phone){
        $url = "https://sandbox.vtpass.com/api/pay";
        $postdata = array(
                'request_id'=>$trn_ref,
                'serviceID' => $serviceID,
                'variation_code'=>  $variation_code,
                'billersCode'=>  $phone,
                'phone'=>  $phone,
                "amount"=>$price,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }

    public function payAirtimeVtPass($trn_ref, $serviceID, $price, $phone){
        $url = "https://sandbox.vtpass.com/api/pay";
        $postdata = array(
                'request_id'=>$trn_ref,
                'serviceID' => $serviceID,
                'phone'=>  $phone,
                "amount"=>$price,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }

    public function getVariations($serviceID){
        $url = "https://sandbox.vtpass.com/api/service-variations?serviceID=".$serviceID;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }

    public function payTVVtPass($trn_ref, $serviceID, $billersCode, $variation_code, $price, $phone){
        $url = "https://sandbox.vtpass.com/api/pay";
        $postdata = array(
                'request_id'=>$trn_ref,
                'billersCode'=>  $billersCode,
                'serviceID' => $serviceID,
                "variation_code"=>$variation_code,
                "amount"=>$price,
                "phone"=>$phone,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }
    public function payMeterVtPass($trn_ref, $disco, $meter_number, $type, $price, $phone){
        $url = "https://sandbox.vtpass.com/api/pay";
        $postdata = array(
                'request_id'=>$trn_ref,
                'billersCode'=>  $meter_number,
                'serviceID' => $disco,
                "variation_code"=>$type,
                "amount"=>$price,
                "phone"=>$phone,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }

    public function executeTransaction($amount, $trn_ref, $type, $user_id, $user_type, $desc){
        $transaction = new Transaction;
        $transaction->trn_ref = $trn_ref;
        $transaction->user_id = $user_id;
        $transaction->amount = $amount;
        $transaction->type = $type;
        $transaction->user_type = $user_type;
        $transaction->status = "Completed";
        $transaction->description = $desc;
        $transaction->save();
        return true;
    }

    public function verifyTVVtPass($billersCode, $serviceID){
        $url = "https://sandbox.vtpass.com/api/merchant-verify";
        $postdata = array(
                'billersCode'=>  $billersCode,
                'serviceID' => $serviceID,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }

    public function verifyMeterVtPass($meter_number, $disco, $type){
        $url = "https://sandbox.vtpass.com/api/merchant-verify";
        $postdata = array(
                'billersCode'=>  $meter_number,
                'serviceID' => $disco,
                'type' => $type,
        );
        
        $postdata = $postdata;
        $username = env("VT_PASS_USERNAME", null);
        $password = env("VT_PASS_PASSWORD", null);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 42);
        curl_setopt($ch, CURLOPT_TIMEOUT, 42);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        $data = curl_exec($ch);
        return json_decode($data);
        //var_dump($data);
    
    }
    
    public function transactions(){
        $user = Auth::user();
        $transactions = Transaction::orderBy("id", "DESC")->where(["user_id"=>$user->id])->paginate(15);
        $credit = Transaction::where(["user_id"=>$user->id, "type"=>"Credit"])->sum('amount');
        $debit = Transaction::where(["user_id"=>$user->id, "type"=>"Debit"])->sum('amount');
        $balance = $credit - $debit;
        return view('customers/transactions')->with(compact('transactions', 'balance'));
        
    }
    
   
    public function profile(){
        
    return view('customers/profile');
    }

    public function updateProfile(Request $request){
    
        
        $customer = User::where("id", Auth::user()->id)->first();
        $customer->name = $request->input("name");
        $customer->phone= $request->input("phone");
        $customer->email = $request->input("email");
        if($customer->save()){
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  

    public function mobileUpdateProfile(Request $request){
    
        
        $customer = User::where("id", $request->input('id'))->first();
        $customer->first_name = $request->input("firstName");
        $customer->last_name = $request->input("lastName");
        $customer->email = $request->input("email");
        $customer->phone1 = $request->input("phone");
        if($customer->save()){
            return response()->json(["success"=>  "Profile updated succeessfully", "customer"=>$customer]);
        }else{
            return response()->json(['error'=> 'Sorry! An error occured while trying to update your information. Kindly contact administrator']);
        }    
    }  
    public function updatePassword(Request $request){

        if($request->input("password") != $request->input("cpassword")){
            Session::flash('error', 'Sorry!, The two passwords provided must match');
            return back();
        }
        $user = Auth::user();
        
        $user = User::where("id", $user->id)->first();

        $user->password = bcrypt($request->input("password"));

        $user->save();

        Session::flash('success', 'Thank you, your password has been updated successfully');
        return back();
    }
    public function mobileUpdatePassword(Request $request){

        
        $user = User::where("id", $request->input('user_id'))->first();

        $user->password = bcrypt($request->input("password"));

        $user->save();

        return response()->json(["success"=>  "Profile updated succeessfully"]);
    }

    
}
