<?php

use Illuminate\Support\Facades\Route;

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

Route::get("dashboard/login",'AdminAuthController@index')->name("dashboard.login");
Route::post("dashboard/login",'AdminAuthController@login');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth:admins')->group(function(){
        Route::get("home",'DashboardController@index')->name("home");
        Route::post('logout' , "AdminAuthController@logout")->name("logout");


        // Route Department
        Route::resource("department","DepartmentController");

        // Route Employees
        Route::resource("employee","EmployeesController");

        // Route Plans
        Route::resource("plan","PlansController");
        Route::get("plan/{id}/addFeatures",'PlansController@addFeatures')->name("plan.addFeatures");
        Route::post("plan/{id}/storeFeatures",'PlansController@storeFeatures')->name("plan.storeFeatures");
        Route::get("plan/{id}/editFeatures",'PlansController@editFeatures')->name("plan.editFeatures");
        Route::put("plan/{id}/updateFeatures",'PlansController@updateFeatures')->name("plan.updateFeatures");
        Route::get("plan/{id}/destroyFeatures",'PlansController@destroyFeatures')->name("plan.destroyFeatures");

        //Route Details


        //Route Customer
        Route::resource("customer" ,'CustomerController');
        Route::get("customer/{id}/active", 'CustomerController@active')->name("customer.active");

        //Route Deals
        Route::get('deals/index', 'DealController@index')->name('deals.index');
        Route::get('deals/new', 'DealController@new')->name('deals.new');
        Route::get('deals/underWork', 'DealController@underWork')->name('deals.underWork');
        Route::get('deals/done', 'DealController@done')->name('deals.done');

        Route::get('deal/{id}/complete', 'DealController@complete')->name('deal.complete');
        Route::get('deal/{id}/show' , 'DealController@show')->name("deal.show");
        Route::get('deal/{id}/accept' , 'DealController@accept')->name("deal.accept");
        Route::get('deal/{id}/refused' , 'DealController@refused')->name("deal.refused");

        // Route Category
        Route::resource("x", 'CategoryController');

        // Route SubCategory
        Route::resource("subCategory" , "SubCategoryController");



    });
});

