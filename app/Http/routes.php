<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});
 Route::get('/home', function () {
    return view('home');
});



 Route::get('/weather', function () {
    return 'https://host/weather/v1/current/{location}';
});


/** 
* patterns
*/
Route::pattern('id', '[0-9]+');


/** 
* AUTH
*/
Route::get('/auth/register' , 'Auth\AuthController@getRegister');
Route::get('/auth/login' 	, 'Auth\AuthController@getLogin');
Route::get('/auth/logout' 	, 'Auth\AuthController@getLogout');
Route::post('/auth/register', 'Auth\AuthController@postRegister');
Route::post('/auth/login' 	, 'Auth\AuthController@postLogin');


//if Logged in
Route::group( ['middleware' => 'auth'] , function () 
{	 

	/*
	* CATEGORIES
	*/
	Route::get('/category', 'CategoryController@index' );
	//ajax
	Route::get('/api/v1/category', 'CategoryController@getList' );
	Route::get('/api/v1/category/{id}', 'CategoryController@show' );
	Route::post('/api/v1/category', 'CategoryController@store' ); 
	Route::put('/api/v1/category', 'CategoryController@update' ); 
	Route::delete('/api/v1/category/{id}', 'CategoryController@destroy' );

	/*
	* PRODUCTS
	*/
	Route::get('/product', 'ProductController@index' );
	//ajax
	Route::get('/api/v1/product', 'ProductController@getList' );
	Route::get('/api/v1/product/{id}', 'ProductController@show' );
	Route::post('/api/v1/product', 'ProductController@store' ); 
	Route::put('/api/v1/product', 'ProductController@update' ); 
	Route::delete('/api/v1/product/{id}', 'ProductController@destroy' );

	/*
	* KPIS
	*/
	Route::get('/kpi', 	'KpiController@index' );
	Route::get('/kpi/{id}', 'KpiController@show');
	//ajax
	Route::get('/api/v1/kpi', 'KpiController@getList' );
	Route::get('/api/v1/kpi/{id}', 'KpiController@show' );
	Route::post('/api/v1/kpi', 'KpiController@store' ); 
	Route::put('/api/v1/kpi', 'KpiController@update' ); 
	Route::delete('/api/v1/kpi/{id}', 'KpiController@destroy' );


	/*
	* USERS *
	*/
	Route::get('/user', 'UserController@index' );
	Route::get('/user/admin', 'UserController@index' );
	Route::get('/user/role', 'UserController@index' );
	Route::get('/user/create', 'UserController@create');
	Route::get('/user/{id}/{name}', 'UserController@show');	
	//ajax
	Route::get('/api/v1/user', 'UserController@index' );
	Route::post('/api/v1/user', 'UserController@store');
	Route::put('/api/v1/user/{id}', 'UserController@update');
	Route::delete('/api/v1/user/{id}', 'UserController@destroy');



});

