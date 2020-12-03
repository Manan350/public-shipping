<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
//payment form
Route::post('/payment', 'PaymentController@index');

// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal')->name('paypal');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');


Route::get('/Registrationmail','mail.registrationmail@build');

Route::get('/ConfirmedOrder_traveller','mail.travellerordermail@build');

Route::get('/ConfirmedOrder_buyer','mail.buyerordermail@build');

Route::get('/', function () {
   // Artisan::call('config:cache');
 
    if(session()->has('name'))
    {
        return view('index');
    }
    else
    {
        session()->put('name',null);
        return view('index');
    }
      
});
Route::get('frontend',function(){
    return view('frontend');
});
Route::get('demo',function(){
    return "hello";
});

Route::get("him",function(){
    return view('frontend');
});
Route::get('/registration/getstate/{id}','registrationController@getstate');

Route::get('/registration/getcity/{id}','registrationController@getcity');

Route::resource('registration','registrationController');

Route::resource('traveller','travellerController');

Route::resource('host','hostController');

Route::post('Host','hostController@Indexs');

Route::post('cancle','requestController@cancle');

Route::get('about', function () {
    return view('about');
});

Route::post('hostbycountry','travellerController@hostByCountry');

Route::resource('profile','profileControler');

Route::post('editprofile','profileControler@edits');

Route::get('contact', function () {
    return view('contact');
});

Route::post('Login','loginController@Login');

Route::get('Logout','loginController@Logout');




//Admin
Route::get('admin',function(){
    return view('admin/adminLogin');
});

Route::get('adminRegister',function(){ 
    return view('admin/register');
} );

Route::get('admindashboard',function(){ 
    return view('admin/dashboard');
} );

Route::post('storequery','admindashboardController@storequery');

Route::get('showquery','admindashboardController@showquery');

Route::post('adminStore','adminLoginController@store');

Route::post('adminlogin','adminLoginController@Login');

Route::post('adminupdate','adminLoginController@update');

Route::get('adminprofile',function(){
    return view('admin/admin-profile');
});

Route::get('logout','adminLoginController@logout');

Route::get('/admindashboard/getdata','admindashboardController@getdata');

Route::post('userdata','admindashboardController@finddata');

Route::post('accept','admindashboardController@Accept');

Route::post('cancelreq','admindashboardController@cancelrequest');

Route::get('live_search', 'admindashboardController@index');

Route::get('live_search/action', 'admindashboardController@action')->name('SearchUsers.action');

Route::get('order_search', 'admindashboardController@index1');

Route::get('order_search/action', 'admindashboardController@action1')->name('SearchByOrderid.action');

Route::get('user_deatails','admindashboardController@viewuser');

Route::get('order_details','admindashboardController@vieworder');

Route::get('blockuser','admindashboardController@blockuser');

//AsTraveller

Route::get('astraveller','AsTravellerController@index');

Route::post('provide_price','AsTravellerController@bidprice');

Route::post('priceupdate','AsTravellerController@store');

Route::post('cancelrequest','AsTravellerController@cancel');


//AsRequester

Route::get('asrequester','AsRequesterController@index');

Route::post('cancel','AsRequesterController@cancle');

Route::post('/downloadPDF','AsRequesterController@downloadPDF');

Route::post('Cancle','AsRequesterController@cancel');

Route::post('Store','AsRequesterController@store');

Route::post('request','AsRequesterController@requeststore');


####################################33

Route::get('details','hostController@productDetail');

Route::post('querymail','admindashboardController@sendquerymail');

Route::post('querysendmail','admindashboardController@sendemail');

Route::post('querysendmail','admindashboardController@blockunblockuser');

 Route::post('generateOTP','AsRequesterController@generateOTP');
 Route::post('matchOTP','AsRequesterController@matchOTP');