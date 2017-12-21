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

Route::get('/emptyCart', [
	'uses' => 'ProductController@getCartDelete',
	'as' => 'product.deleteCart'
]);

Route::post('/redirect', [
	'uses' => 'ProductController@postRedirect',
	'as' => 'redirect'
]);

Route::post('/notify', [
	'uses' => 'ProductController@postNotify',
	'as' => 'notify'
]);

Route::get('/pdf', [
	'uses' => 'ProductController@pdf',
	'as' => 'product.pdf'
]);

Route::get('/payment/success', function(){
	return view('payment.successpayment');
});

Route::get('/payment/failed', function(){
	return view('payment.failedpayment');
});

Route::get('/invoice', function(){
	return view('payment.invoice');
});

Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'
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
		Route::group(['middleware' => 'user'], function(){
			Route::get('profile', [
				'uses' => 'UserController@getProfile',
				'as' => 'profile'
			]);
			Route::get('setbio', [
				'uses' => 'UserController@setBio',
				'as' => 'setbio'
			]);
			Route::post('setbio', [
				'uses' => 'UserController@storeBio',
				'as' => 'setbio'
			]);
			Route::get('checkout', [
				'uses' => 'ProductController@getCheckout',
				'as' => 'checkout'
			]);
		});

		Route::group(['middleware' => 'admin'], function(){
			Route::get('admin', [
				'uses' => 'AdminController@getAdmin',
				'as' => 'admin'
			]);
			Route::get('admin/product-list', [
				'uses' => 'ProductController@getProduct',
				'as' => 'admin.product.view'
			]);
			
			Route::get('admin/manage-product',[
				'uses' => 'ProductController@create',
				'as' => 'admin.create'
			]);
			
			Route::post('admin/manage-product',[
				'uses' => 'ProductController@store',
				'as' => 'admin.store'
			]);

			Route::get('admin/edit-product/{id}',[
				'uses' => 'ProductController@edit',
				'as' => 'admin.edit'
			]);

			Route::post('admin/edit-product/{id}',[
				'uses' => 'ProductController@update',
				'as' => 'admin.update'
			]);

			Route::get('admin/delete-product/{id}',[
				'uses' => 'ProductController@delete',
				'as' => 'admin.delete'
			]);

			Route::get('admin/home', [
				'uses' => 'AdminController@home',
				'as' => 'admin.home'
			]);

			Route::get('admin/orders', [
				'uses' => 'AdminController@getOrders',
				'as' => 'admin.orders'
			]);

			Route::get('admin/users', [
				'uses' => 'UserController@getUsers',
				'as' => 'admin.users'
			]);

			Route::get('admin/edit-user/{id}',[
				'uses' => 'UserController@editUsers',
				'as' => 'admin.edit.user'
			]);

			Route::post('admin/update-user/{id}',[
				'uses' => 'UserController@updateUsers',
				'as' => 'admin.update.user'
			]);

			Route::get('admin/delete-user/{id}',[
				'uses' => 'UserController@deleteUsers',
				'as' => 'admin.delete.user'
			]);

		
		});

		Route::get('logout', [
			'uses' => 'UserController@getLogout',
			'as' => 'logout'
		]);
	});
});

// Route::get('/captcha-test', 'UserController@captcha');