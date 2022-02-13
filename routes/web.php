<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('hh' , function (){
//    return "kkkkkkkkkkkkkkkkkkkkkkk";
//})->middleware('auth:employee');


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){
    Route::get('login' , function (){return view('front/login/login');})->middleware('guest');
    Route::post("employee/register", 'Front\EmployeeAuthController@registerProcess')->name("employee.register")->middleware('guest');
    Route::post('customer/register', 'Front\CustomerAuthController@registerProcess')->name("customer.register")->middleware('guest');
    Route::get('register_seller' , function (){return view('front/register/register_seller');})->middleware('guest');
    Route::get('register_customer' , function (){return view('front/register/register_customer');})->middleware('guest');
    Route::post('login/seller', 'Front\EmployeeAuthController@login')->name("user.login.employee")->middleware('guest');
    Route::post('login/customer', 'Front\CustomerAuthController@login')->name("user.login.customer")->middleware('guest');





    Route::get('categories/{id}/{sid}', 'Front\Categories\CategoryController@f')->middleware('auth.guard');

    Route::get('/plans/{sid}' , 'Front\Categories\CategoryController@showPlans')->name('get.plans');


    /********************* logout route ******************************/
    Route::get('logout' , function (){

        if(Auth::guard('employee')->id() > 0) {
            Auth::guard('employee')->logout();
            return redirect('login');

        }elseif(Auth::guard('customer')->id() > 0){
            Auth::guard('customer')->logout();
            return redirect('login');

        }else{
            dd(['false']);
        }


    });
    /****************************************************/





    /**************************************************/
    Route::group(['namespace'=>'Front'], function() {
        Route::get('index' , 'FirstPage\FirstPageController@index');




        Route::post('cart/add', 'Plan\AddToCartController@store')->name("site.cart.add");
        Route::post('delete_cart', 'Plan\AddToCartController@delete_cart')->name('delete.cart');



    });





    /****************************************************/
        Route::group(['namespace'=>'Front\Plan'], function() {
            Route::resource('plan', 'PlanController');
        });

















    Route::get('/a', function () {
        return dd( app()->getLocale());
    });

    Route::get('/l' , function (){
        dd('llllllllllll');
    })->middleware('customer.employee');

});


Route::get('/home', 'HomeController@index')->name('home');
