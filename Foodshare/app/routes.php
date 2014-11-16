<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
| Authentication filter
*/
Route::group(array('before' => 'auth' ), function() {
	/*
	| sign out (GET)
	*/
	
	Route::get('/signout',array(
		'as' => 'signout',
		'uses' => 'AuthController@getSignout'
	));
	/*
	| home
	*/
	Route::get('/', array(
	'as' => 'home', 
	'uses' => 'HomeController@home'
	));
	
	/*
	|  Profile
	*/
	Route::get('/user/{email}', array (
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
	));
	/*
	| Edit password
	*/
	Route::get('/centraledit', function(){
	return View::make('edit.edit');
	});
	Route::get('/edit',array(
	'as' => 'edit-get',
	'uses' => 'EditController@getedit'
	));
	Route::post('/edit',array(
	'as' => 'edit-post',
	'uses' => 'EditController@postedit'
	));
	/*
	| Create shop
	*/
	Route::get('/createshop',array(
	'as' => 'createshop-get',
	'uses' => 'ShopController@getcreateshop'
	));
	Route::post('/createshop',array(
	'as' => 'createshop-post',
	'uses' => 'ShopController@postcreateshop'
	));
	/*
	| shop profile
	*/
	Route::get('/shop/{name}', array (
	'as' => 'shop-user',
	'uses' => 'ShopController@shopprofile'
	));
	/*
	Search system
	*/
	Route::get('/centralsearch', function(){
	return View::make('search.centralsearch');
	});
	Route::get('/search/user', array (
	'as' => 'searchuser-get',
	'uses' => 'SearchController@searchUserget'
	));
	Route::get('/search/shop', array (
	'as' => 'searchshop-get',
	'uses' => 'SearchController@searchShopget'
	));
	Route::post('/search/user', array (
	'as' => 'searchuser-post',
	'uses' => 'SearchController@searchUserpost'
	));
	Route::post('/search/shop', array (
	'as' => 'searchshop-post',
	'uses' => 'SearchController@searchShoppost'
	));
	/*
	Edit Profile image
	*/
	Route::get('/image', array (
	'as' => 'image-get',
	'uses' => 'ImageController@home'
	));

	Route::post('/image', array (
	'as' => 'image-post',
	'uses' => 'ImageController@uploadimage'
	));
	/*
	Share image Food Share
	*/
	Route::get('/photo', array (
	'as' => 'Photo-set',
	'uses' => 'PhotoController@setPhoto'
	));

	Route::post('/photo', array (
	'as' => 'Photo-add',
	'uses' => 'PhotoController@addPhoto'
	));
});
/*
Unauthentication group
*/
Route::group(array('before' => 'guest'), function(){
	
	/*
	| CSRF Protection group
	*/
	Route::group(array('before' => 'csrf' ), function(){
		/*
		| Create account(POST)
		*/
		Route::post('/register', array(
		'as' => 'register-post', 
		'uses' => 'AuthController@postRegister'
		));
		
		/*
		| Signin (POST)
		*/
		Route::post('/signin', array(
		'as' => 'signin-post', 
		'uses' => 'AuthController@postSignin'
		));
	});
	
	/*
	| Sign in (GET)
	*/
	Route::get('/signin', array(
	'as' => 'signin-get', 
	'uses' => 'AuthController@getSignin'
	));
	
	/*
	| Create account (GET)
	*/
	Route::get('/register', array(
	'as' => 'register-get', 
	'uses' => 'AuthController@getRegister'
	));
	
	/*
	| Detail of this server
	*/
	Route::get('/detail', function(){
	return View::make('detail');
	});
	
});
/////Order to shop//////
Route::get('/Order', array(
	'as' => 'Order-get', 
	'uses' => 'OrderController@getOrder'
));

Route::post('/Order', array(
		'as' => 'Order-post', 
		'uses' => 'OrderController@postOrder'
));


////Reserve By user//////
Route::get('/Reserv', array(
	'as' => 'Reserve-get', 
	'uses' => 'ReserveController@getReserve'
));
Route::post('/Reserv', array(
	'as' => 'Reserve-post', 
	'uses' => 'ReserveController@postReserve'
));
////Status for reserve //////
Route::get('/Reservestatus', array(
	'as' => 'Reserve-status', 
	'uses' => 'ReserveController@statusReserve'
));
///For shop to set the Reserve///
Route::post('/setReserve',array(
	'as' => 'Reserve-set',
	'uses' => 'ReserveController@setReserve'
));
///Show Form to set Reserv////
Route::get('/setReserve',array(
	'as' => 'Reserve-show',
	'uses' => 'ReserveController@showReserve'
));

////Review for shop////
Route::get('/Review',array(
	'as' => 'Review-get',
	'uses' => 'ReviewController@getReview'
));
Route::post('/Review',array(
	'as' => 'Review-post',
	'uses' => 'ReviewController@postReview'
));

////To make menu for shop//
Route::get('/Menu',array(
	'as' => 'Menu-get',
	'uses' => 'MenuController@getMenu'

));
Route::post('/Menu',array(
	'as'=>'Menu-add',
	'uses'=>'MenuController@addMenu'
));

//Comment in User ///
Route::post('/comment',array(
	'as' => 'Comment-set',
	'uses' => 'CommentController@postComment'
));

//To display all shop//
Route::get('/allshop', array(
	'as' => 'Shop-show',
	'uses' =>'ShopController@getallShop'
));

Route::get('/shopuser', function(){
	return View::make('profile.ShopProfile');
});
