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


Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout'
]);

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
	Route::group(['middleware' => 'guest'], function() {
		Route::get('signup', [
			'uses' => 'UserController@getSignup',
			'as' => 'signup'
		]);
		
		Route::post('signup', [
			'uses' => 'UserController@postSignup',
			'as' => 'signup'
			]);
			
		Route::get('askverification', [
			'uses' => 'UserController@askVerification',
			'as' => 'askVerification'
		]);

		Route::post('resendverificationtoken', [
			'uses' => 'UserController@resendVerificationToken',
			'as' => 'resendVerificationToken'
		]);
			
		Route::get('verifyuser/{id}/{token}', [
			'uses' => 'UserController@verifyUser',
			'as' => 'verifyUser'
		]);

		Route::get('signin', [
			'uses' => 'UserController@getSignin',
			'as' => 'signin'
		]);

		Route::post('signin', [
			'uses' => 'UserController@postSignin',
			'as' => 'signin'
		]);
	});

	Route::group(['middleware' => 'auth'], function() {
		Route::get('profile', [
			'uses' => 'UserController@getProfile',
			'as' => 'profile'
		]);

		Route::get('logout', [
			'uses' => 'UserController@getLogout',
			'as' => 'logout'
		]);
	});
});

// Route::get('/captcha-test', 'UserController@captcha');