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

Route::get('/', function () {
    return view('welcome');

});

//Auth routes
Auth::routes();
Route::get('/redirect/{provider}', 'SocialAuthController@redirect')->name('redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback')->name('callback');
Route::get('user/activation/{token}', 'ActivateRegisterController@activateUser')->name('user.activate');

Route::group(['middleware' => ['auth']], function () {

	//Page routes
	Route::get('/home', 'PageController@index')->name('homePage');
	Route::get('/newItem', 'PageController@showNweItemPage')->name('newItemPage');
	Route::get('/packages', 'PageController@showPackagesPage')->name('packegesPage');

	//BlogPost routes
	Route::post('/api/blog', 'BlogPostController@addNewItem');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
