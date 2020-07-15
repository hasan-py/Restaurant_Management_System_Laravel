<?php

use Illuminate\Support\Facades\Route;
use App\Auth;

Route::group(['middleware'=>['logoutCheck']],function(){

	// Signup Routes
	Route::view('signup','signup')->name('signup');
	Route::post('signup','AuthController@postSignup');

	// Login Routes
	Route::view('login','login')->name('login');
	Route::post('login','AuthController@postLogin');

});


Route::group(['middleware'=>['loginCheck']],function(){

	// Dashboard & logout
	Route::get('', function () {
	    return redirect()->route('login');
	});
	Route::get('dashboard','AuthController@dashboard')->name('dashboard');
	Route::get('logout','AuthController@logout');

	// Profiles
	Route::get('profile/{username}','ProfileController@getProfile');
	Route::post('profile/edit-profile','ProfileController@editProfile');


	// Users Routes with Admin Protected
	Route::group(['middleware'=>['adminCheck']],function(){
		Route::view('user/add-user','users.add-user');
		Route::get('user/all-user','UserController@allUser')->name('all-user');
		Route::post('user/add-user','UserController@addUser');
		Route::get('user/edit-user/{id}','UserController@getEditUser');
		Route::post('user/edit-user','UserController@postEditUser');
		Route::get('user/delete-user/{id}','UserController@deleteUser');

		// All Employee
		Route::get('rms/all-employee','RoleController@allEmployee');
	});

	Route::group(['middleware'=>['employeeCheck']],function(){

		// Table_Service Routes
		Route::view('table-service/add-table','table_service.add-table')->name('add-table');
		Route::get('table-service/all-table','TableServiceController@tableList')->name('all-table');
		Route::post('table-service/add-table','TableServiceController@postAddTable');
		Route::get('table-service/edit-table/{id}','TableServiceController@getEditTable')->name('edit-table');
		Route::post('table-service/edit-table','TableServiceController@postEditTable');
		Route::get('table-service/delete-table/{id}','TableServiceController@deleteTable');

		// Foods Routes
		Route::view('/foods/add-food','foods.add-food');
		Route::get('foods/all-food','FoodController@allFood');
		Route::post('foods/add-food','FoodController@postAddFood');
		Route::get('foods/edit-food/{id}','FoodController@getEditFood');
		Route::post('foods/edit-food','FoodController@postEditFood');
		Route::get('foods/delete-food/{id}','FoodController@deleteFood');

		// Orders Routes
		Route::get('orders/all-orders','OrderController@allOrder');
		Route::get('orders/add-order','OrderController@getAddOrder');
		Route::post('orders/add-order','OrderController@postAddOrder');
		
		// All Customer
		Route::get('rms/all-customer','RoleController@allCustomer');
	});
	

	


});