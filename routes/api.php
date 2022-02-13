<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(["middleware" => ['api']] ,function(){
    // Route Auth Employees
    Route::post("employee/register", 'EmployeeAuthController@registerProcess')->name("employee.register");
    Route::post("employee/login", 'EmployeeAuthController@login')->name("employee.login");

    // Route Auth Customers
    Route::post("customer/register", 'CustomerAuthController@registerProcess')->name("customer.register");
    Route::post("customer/login", 'CustomerAuthController@login')->name("customer.login");

    //Route Categories
    Route::get('category' , 'ApiCategoryController@index')->name('category');
    Route::post('category/store' , 'ApiCategoryController@store')->name('category.store');
    Route::get('category/{id}/sub' , 'ApiCategoryController@subCategories')->name('category.sub');

    //Route Sub Categories
    Route::get('sub_category' , 'ApiSubCategoryController@index')->name('sub_category');
    Route::post('sub_category/store' , 'ApiSubCategoryController@store')->name('sub_category.store');
    Route::get('sub/{id}/plan' , 'ApiSubCategoryController@getPlans')->name('sub.plan');

    //Route Plans
    Route::get('plan' , 'ApiPlanController@index')->name('plan');
    Route::post('plan/store' , 'ApiPlanController@store')->name('plan.store');
    Route::get('plan/{id}/feature' , 'ApiPlanController@getFeature')->name('plan.feature');


    //Route Feature
    Route::get('feature' , 'ApiFeatureController@index')->name('feature');
    Route::post('feature/store' , 'ApiFeatureController@store')->name('feature.store');




    // Middleware Employee
    Route::group(["middleware" => ['auth.guard:api-employee']],function() {
        // Route Profile Employees
        Route::get('employee/profile' , 'EmployeeAuthController@profile')->name('employee.profile');
        Route::post('employee/logout' , 'EmployeeAuthController@logout')->name('employee.logout');
    });

    // Middleware Customer
    Route::group(["middleware" => ['auth.guard:api-customer']],function() {
        // Route Profile Customer
        Route::get('customer/profile' , 'CustomerAuthController@profile')->name('customer.profile');
        Route::post('customer/logout' , 'CustomerAuthController@logout')->name('customer.logout');

        // Carts Route
        Route::get('cart', 'ApiCartController@index')->name('cart');
        Route::post('cart/store', 'ApiCartController@store')->name('cart.store');
        Route::delete('cart/{id}/destroy', 'ApiCartController@destroy')->name('cart.destroy');

        // Deal Checkout Route

        Route::post('checkout', 'ApiDealController@store')->name('checkout');
    });


    /*******************************************************************/


    Route::post('pay' , 'MyFatoorahController@payOrder');


    Route::get('k' , function (){
        dd('hello');
    })->middleware('customer.employee');

});
