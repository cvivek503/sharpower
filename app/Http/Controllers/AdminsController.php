<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Session;
use Redirect;
use App\User;
use App\Customer;
use App\City;
use App\Role;
use App\Transaction;
use App\State;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class AdminsController extends Controller{

    public function index(){
        $electricity_transactions = Transaction::where( "description", "like", "% electricity %")->count();
        $airtime_transactions = Transaction::where( "description", "like", "% airtime %")->count();
        $data_transactions = Transaction::where( "description", "like", "% data %")->count();
        $tv_transactions = Transaction::where( "description", "like", "% tv subscription %")->count();
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->orderBy("id", "DESC")->take(15)->get();
        return view('admin/index')->with(compact('electricity_transactions', 'airtime_transactions', 'data_transactions', 'tv_transactions', 'transactions'));
        
    }
    
    public function roles(){
        $roles = Role::orderBy("id", "DESC")->get();
        return view('admin/roles')->with(compact('roles'));
    }
    public function newRole(){
        return view('admin/new_role');
    }
    public function states(){
        $states = State::orderBy("name", "ASC")->get();
        return view('admin/states')->with(compact('states'));
    }
   
    public function newUser(){
        $roles = Role::orderBy("id", "DESC")->get();
        return view('admin/new_user')->with(compact('roles'));
    }

    public function editRole($id){
        $role = Role::where("id", $id)->first();
        return view('admin/edit_role')->with(compact('role'));
    }
    

    public function addRole(Request $request){

        
        if($request->input('manage_roles') == "Yes"){
            $manage_roles = "Yes";
        }else{
            $manage_roles= "No";
        }
        if($request->input('view_users') == "Yes"){
            $view_users = "Yes";
        }else{
            $view_users = "No";
        }
        if($request->input('manage_users') == "Yes"){
            $manage_users = "Yes";
        }else{
            $manage_users = "No";
        }
        if($request->input('view_customers') == "Yes"){
            $view_customers = "Yes";
        }else{
            $view_customers = "No";
        }
        if($request->input('view_all_transactions') == "Yes"){
            $view_all_transactions = "Yes";
        }else{
            $view_all_transactions = "No";
        }
        if($request->input('create_transactions') == "Yes"){
            $create_transactions = "Yes";
        }else{
            $create_transactions = "No";
        }
        if($request->input('view_electricity_transactions') == "Yes"){
            $view_electricity_transactions = "Yes";
        }else{
            $view_electricity_transactions = "No";
        }
        if($request->input('refund_electricity_transactions') == "Yes"){
            $refund_electricity_transactions = "Yes";
        }else{
            $refund_electricity_transactions = "No";
        }

        if($request->input('view_airtime_transactions') == "Yes"){
            $view_airtime_transactions = "Yes";
        }else{
            $view_airtime_transactions = "No";
        }
        if($request->input('refund_airtime_transactions') == "Yes"){
            $refund_airtime_transactions = "Yes";
        }else{
            $refund_airtime_transactions = "No";
        }

        if($request->input('view_data_transactions') == "Yes"){
            $view_data_transactions = "Yes";
        }else{
            $view_data_transactions = "No";
        }
        if($request->input('refund_data_transactions') == "Yes"){
            $refund_data_transactions = "Yes";
        }else{
            $refund_data_transactions = "No";
        }
        if($request->input('view_tv_transactions') == "Yes"){
            $view_tv_transactions = "Yes";
        }else{
            $view_tv_transactions = "No";
        }
        if($request->input('refund_tv_transactions') == "Yes"){
            $refund_tv_transactions = "Yes";
        }else{
            $refund_tv_transactions = "No";
        }
        

        $role = new Role;
        $role->name = $request->input('name'); 
        $role->manage_roles = $manage_roles; 
        $role->view_customers = $view_customers; 
        $role->view_users = $view_users; 
        $role->manage_users = $manage_users; 
        $role->view_all_transactions = $view_all_transactions; 
        $role->create_transactions = $create_transactions; 
        $role->view_electricity_transactions = $view_electricity_transactions;
        $role->refund_electricity_transactions = $refund_electricity_transactions;

        $role->view_airtime_transactions = $view_airtime_transactions;
        $role->refund_airtime_transactions = $refund_airtime_transactions;

        $role->view_data_transactions = $view_data_transactions;
        $role->refund_data_transactions = $refund_data_transactions;

        $role->view_tv_transactions = $view_tv_transactions;
        $role->refund_tv_transactions = $refund_tv_transactions;

        if($role->save()){
            Session::flash('success', 'Role was successfully saved');
            return redirect('admin/roles');
        }else{
            Session::flash('error', 'An unknown error occured');
            return back();
        }
    }

    public function updateRole(Request $request){

        
        if($request->input('manage_roles') == "Yes"){
            $manage_roles = "Yes";
        }else{
            $manage_roles= "No";
        }
        if($request->input('view_users') == "Yes"){
            $view_users = "Yes";
        }else{
            $view_users = "No";
        }
        if($request->input('manage_users') == "Yes"){
            $manage_users = "Yes";
        }else{
            $manage_users = "No";
        }
        if($request->input('view_customers') == "Yes"){
            $view_customers = "Yes";
        }else{
            $view_customers = "No";
        }
        if($request->input('view_all_transactions') == "Yes"){
            $view_all_transactions = "Yes";
        }else{
            $view_all_transactions = "No";
        }
        if($request->input('create_transactions') == "Yes"){
            $create_transactions = "Yes";
        }else{
            $create_transactions = "No";
        }
        if($request->input('view_electricity_transactions') == "Yes"){
            $view_electricity_transactions = "Yes";
        }else{
            $view_electricity_transactions = "No";
        }
        if($request->input('refund_electricity_transactions') == "Yes"){
            $refund_electricity_transactions = "Yes";
        }else{
            $refund_electricity_transactions = "No";
        }

        if($request->input('view_airtime_transactions') == "Yes"){
            $view_airtime_transactions = "Yes";
        }else{
            $view_airtime_transactions = "No";
        }
        if($request->input('refund_airtime_transactions') == "Yes"){
            $refund_airtime_transactions = "Yes";
        }else{
            $refund_airtime_transactions = "No";
        }

        if($request->input('view_data_transactions') == "Yes"){
            $view_data_transactions = "Yes";
        }else{
            $view_data_transactions = "No";
        }
        if($request->input('refund_data_transactions') == "Yes"){
            $refund_data_transactions = "Yes";
        }else{
            $refund_data_transactions = "No";
        }
        if($request->input('view_tv_transactions') == "Yes"){
            $view_tv_transactions = "Yes";
        }else{
            $view_tv_transactions = "No";
        }
        if($request->input('refund_tv_transactions') == "Yes"){
            $refund_tv_transactions = "Yes";
        }else{
            $refund_tv_transactions = "No";
        }

        $role = Role::where("id", $request->input('id'))->first();
        $role->name = $request->input('name'); 
        $role->manage_roles = $manage_roles; 
        $role->view_customers = $view_customers; 
        $role->view_users = $view_users; 
        $role->manage_users = $manage_users; 
        $role->view_all_transactions = $view_all_transactions; 
        $role->create_transactions = $create_transactions; 
        $role->view_electricity_transactions = $view_electricity_transactions;
        $role->refund_electricity_transactions = $refund_electricity_transactions;

        $role->view_airtime_transactions = $view_airtime_transactions;
        $role->refund_airtime_transactions = $refund_airtime_transactions;

        $role->view_data_transactions = $view_data_transactions;
        $role->refund_data_transactions = $refund_data_transactions;

        $role->view_tv_transactions = $view_tv_transactions;
        $role->refund_tv_transactions = $refund_tv_transactions;
        if($role->save()){
            Session::flash('success', 'Role was successfully updated');
            return redirect('admin/roles');
        }else{
            Session::flash('error', 'An unknown error occured');
            return back();
        }
    }

    public function transactions(){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->get();
        $credit = Transaction::where(["type"=>"Credit"])->sum('amount');
        $debit = Transaction::where(["type"=>"Debit"])->sum('amount');
        $balance = $credit - $debit;
        return view('admin/transactions')->with(compact('transactions', 'balance'));
        
    }
    public function electricityTransactions(){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->where( "transactions.description", "like", "% electricity %")
        ->get();
        return view('admin/electricity_transactions')->with(compact('transactions'));
    }
    public function airtimeTransactions(){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->where( "transactions.description", "like", "% airtime %")
        ->get();
        return view('admin/airtime_transactions')->with(compact('transactions'));
    }
    public function dataTransactions(){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->where( "transactions.description", "like", "% data %")
        ->get();
        return view('admin/data_transactions')->with(compact('transactions'));
    }
    public function tvTransactions(){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->where( "transactions.description", "like", "% tv subscription %")
        ->get();
        return view('admin/tv_transactions')->with(compact('transactions'));
    }

    public function customer($customer_id){
        $transactions = Transaction::join("users", "users.id", "transactions.user_id")
        ->select("transactions.*", "users.id as user_id", "users.name as user_name")
        ->where("transactions.user_id", $customer_id)
        ->get();
        $credit = Transaction::where(["type"=>"Credit", "user_id"=>$customer_id])->sum('amount');
        $debit = Transaction::where(["type"=>"Debit", "user_id"=>$customer_id])->sum('amount');
        $balance = $credit - $debit;
        $customer = User::where("id", $customer_id)->first();
        return view('admin/customer')->with(compact('transactions', 'customer', 'balance'));
        
    }

    public function getBalance ($user_id){
        $credit = Transaction::where(["transactions.user_id"=> $user_id, "type"=>"Credit"])
        ->sum("amount");
        $debit = Transaction::where(["transactions.user_id"=> $user_id, "type"=>"Debit"])
        ->sum("amount");
        $balance = $credit - $debit;
        return $balance;
    }

    

    public function execTransaction($trn_ref, $user_id, $amount, $type, $user_type){
        $transaction = new Transaction;
        $transaction->trn_ref = $trn_ref;
        $transaction->user_id = $user_id;
        $transaction->amount = $amount;
        $transaction->type = $type;
        $transaction->user_type = $user_type;
        $transaction->status = "Completed";
        $transaction->save();
        return true;
    }

    public function profile(){
        return view('admin/profile');
    }

    public function users(){
        $users = User::join("roles", "users.role_id", "roles.id")
        ->select("users.*", "roles.name as role_name")
        ->where(["users.status"=> "Active", "role"=>"Admin"])->get();
        return view('admin/users')->with(compact('users'));
    }

    public function customers(){
        $customers = User::where(["role"=>"Customer"])->get();
        return view('admin/customers')->with(compact('customers'));
    }

    public function addUser(Request $request){
        $admin = new User;
        $admin->name = $request->input("name");
        $admin->email = $request->input("email");
        $admin->phone = $request->input("phone");
        $admin->role_id = $request->input("role_id");
        $admin->password = bcrypt($request->input("password"));
        $admin->role = "Admin";
        if($admin->save()){
            Session::flash('success', "User saved succeessfully");
            return redirect('admin/users');
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
        }    
    }  
    
    public function updateProfile(Request $request){
        $admin = User::where("id", Auth::user()->id)->first();
        $admin->name = $request->input("name");
        $admin->phone1 = $request->input("phone");
        $admin->email = $request->input("email");
        if($admin->save()){
            Session::flash('success', "Profile updated succeessfully");
            return back();
        }else{
            Session::flash('error', 'An error occured while trying to update profile.');
            return back();
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
   


    public function sendResetMail($member, $token){
        $data = [
        'email'=> $member->email,
        'name'=> $member->first_name,
        'token'=> $token,
        'date'=>date('Y-m-d')
        ];
 
        Mail::send('reset-mail', $data, function($message) use($data){
            $message->from('info@yul.ng', 'Team YUL');
            $message->SMTPDebug = 4; 
            $message->to($data['email']);
            $message->subject('Password Recovery');
            
        });   
    }
}
