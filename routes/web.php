<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', function () {
    return view('admin/login');
});
Route::get('/forgot_password', function () {
    return view('customers/forgot_password');
});
Route::get('/admin/forgot_password', function () {
    return view('admin/forgot_password');
});
Route::get('storage/merchants/products/{filename}', function ($filename)
{
    $path = storage_path('app/public/merchants/products/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/merchants/categories/{filename}', function ($filename)
{
    $path = storage_path('app/public/merchants/categories/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/logout', 'LoginsController@logout');
Route::get('/members/logout', 'LoginsController@membersLogout');
Route::get('/admin/logout', 'LoginsController@adminLogout');

Route::get('/', 'CustomersController@index');
Route::get('/about', 'CustomersController@about');
Route::get('/services', 'CustomersController@services');
Route::get('/terms', 'CustomersController@terms');
Route::get('/faqs', 'CustomersController@faqs');
Route::get('/contact', 'CustomersController@contact');


Route::post('/authenticate', 'LoginsController@authenticate');

Route::post('/forgot_password_post', 'UsersController@forgotPasswordPost');

Route::post('/register_post', 'UsersController@customerRegister');



Route::get('/customers/login', 'CustomersController@login');
Route::get('/login', [ 'as' => 'login', 'uses' => 'CustomersController@login']);
Route::get('/customers/register', 'CustomersController@register');
Route::get('/register', 'CustomersController@register');

Route::get('/customers/dashboard', 'CustomersController@dashboard')->middleware('auth');
Route::get('/customers/transactions', 'CustomersController@transactions')->middleware('auth');
Route::get('/customers/profile', 'CustomersController@profile')->middleware('auth');
Route::post('/customers/update_profile', 'CustomersController@updateProfile');
Route::post('/customers/update_password', 'CustomersController@updatePassword');
Route::post('/save_customer', 'UsersController@customerRegister');

Route::get('/test', 'CustomersController@verifyMeterIkejaElectic');

Route::get('/electricity', 'CustomersController@electricity');
Route::post('/customers/verify_meter', 'CustomersController@verifyMeter');

Route::post('/customers/execute_electricity_purchase', 'CustomersController@executeElectricityPurchase');
Route::get('/customers/meter_verify', 'CustomersController@meterVerify');
Route::post('/customers/aitime_purchase', 'CustomersController@airtimePurchase');

Route::get('/airtime', 'CustomersController@airtime');
Route::post('/customers/execute_airtime_purchase', 'CustomersController@executeAirtimePurchase');

Route::get('/data', 'CustomersController@data');
Route::get('/get_data_variations/{serviceID}', 'CustomersController@getDataVariations');

Route::post('/customers/execute_data_purchase', 'CustomersController@executeDataPurchase');

Route::get('/tv', 'CustomersController@tv');
Route::get('/get_tv_variations/{serviceID}', 'CustomersController@getTVVariations');
Route::post('/customers/verify_tv_code', 'CustomersController@verifyTVCode');
Route::post('/customers/execute_tv_purchase', 'CustomersController@executeTVPurchase');






Route::post('/post_contact', 'UsersController@postContact');


Route::get('/admin/index', 'AdminsController@index')->middleware('auth');
Route::get('/admin/transactions', 'AdminsController@transactions')->middleware('auth');
Route::get('/admin/electricity_transactions', 'AdminsController@electricityTransactions')->middleware('auth');
Route::get('/admin/airtime_transactions', 'AdminsController@airtimeTransactions')->middleware('auth');
Route::get('/admin/data_transactions', 'AdminsController@dataTransactions')->middleware('auth');
Route::get('/admin/tv_transactions', 'AdminsController@tvTransactions')->middleware('auth');
Route::get('/admin/profile', 'AdminsController@profile')->middleware('auth');
Route::post('/admin/update_profile', 'AdminsController@updateProfile');
Route::post('/admin/update_password', 'AdminsController@updatePassword');
Route::post('/save_customer', 'UsersController@customerRegister');


Route::get('/admin/roles', 'AdminsController@roles')->middleware('auth');
Route::get('/admin/new_role', 'AdminsController@newRole')->middleware('auth');
Route::post('/admin/add_role', 'AdminsController@addRole');
Route::get('/admin/edit_role/{role_id}', 'AdminsController@editRole')->middleware('auth');
Route::post('/admin/update_role', 'AdminsController@updateRole');


Route::get('/admin/users', 'AdminsController@users')->middleware('auth');
Route::get('/admin/new_user', 'AdminsController@newUser')->middleware('auth');
Route::post('/admin/add_user', 'AdminsController@addUser');
Route::get('/admin/customers', 'AdminsController@customers')->middleware('auth');
Route::get('/admin/customer/{customer_id}', 'AdminsController@customer')->middleware('auth');



//mobile routes
Route::post('/mobile/register', 'UsersController@mobileRegister');
Route::post('/mobile/login', 'LoginsController@mobileAuthenticate');

Route::post('/mobile/update_profile', 'CustomersController@mobileUpdateProfile');
Route::post('/mobile/update_password', 'CustomersController@mobileUpdatePassword');
