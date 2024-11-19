<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
		return 'admin';
	});

\L::Panel(app('admin'));/// Set Lang redirect to admin
\L::LangNonymous();// Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {

		Route::get('theme/{id}', 'Admin\Dashboard@theme');
		Route::group(['middleware' => 'admin_guest'], function () {
				Route::get('login', 'Admin\AdminAuthenticated@login_page');
				Route::post('login', 'Admin\AdminAuthenticated@login_post');
				Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
				Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
				Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
			});
		/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

		Route::group(['middleware' => 'admin:admin'], function () {
				//////// Admin Routes /* Start */ //////////////
				Route::get('/', 'Admin\Dashboard@home');
				Route::any('logout', 'Admin\AdminAuthenticated@logout');

				Route::get('account', 'Admin\AdminAuthenticated@account');
                Route::post('account', 'Admin\AdminAuthenticated@account_post');

				Route::resource('settings', 'Admin\Settings');

				Route::resource('users', 'UserController');
				Route::post('users/multi_delete', 'UserController@multi_delete');
				Route::get('users/{id}/active', 'UserController@do_active');

				Route::resource('permission', 'AdminGroupController');
				Route::post('permission/multi_delete', 'AdminGroupController@multi_delete');
				Route::get('permission/{id}/active', 'AdminGroupController@do_active');

		        Route::resource('pages', 'Admin\Pages');
				Route::post('pages/multi_delete', 'Admin\Pages@multi_delete');
				Route::get('pages/{id}/active', 'Admin\Pages@do_active');

				Route::resource('links', 'Admin\Links');
				Route::post('links/multi_delete', 'Admin\Links@multi_delete');
				Route::get('links/{id}/active', 'Admin\Links@do_active');

				Route::resource('contactus', 'Admin\ContactUsController');
				Route::post('contactus/multi_delete', 'Admin\ContactUsController@multi_delete');
				Route::post('contactus/{id}', 'Admin\ContactUsController@replay');
				Route::get('contactus/move/to/{id}/{move_to}', 'Admin\ContactUsController@move_to');

				Route::resource('city', 'CityController');
				Route::post('city/multi_delete', 'CityController@multi_delete');
				Route::get('city/{id}/active', 'CityController@do_active');

				Route::resource('area', 'AreaController');
				Route::post('area/multi_delete', 'AreaController@multi_delete');
				Route::get('area/{id}/active', 'AreaController@do_active');

				Route::resource('admin', 'Admin\AdminController');
				Route::post('admin/multi_delete', 'Admin\AdminController@multi_delete');

				Route::resource('socials', 'Admin\SocialControllers');
				Route::post('socials/multi_delete', 'Admin\SocialControllers@multi_delete');
				Route::get('socials/{id}/active', 'Admin\SocialControllers@do_active');


				Route::resource('test','Admin\TestController');
				Route::post('test/multi_delete','Admin\TestController@multi_delete');
				Route::resource('itemtype','Admin\ItemTypeController');
Route::post('itemtype/multi_delete','Admin\ItemTypeController@multi_delete');
Route::resource('item','Admin\ItemController');
Route::get("getItem" ,"Admin\ItemController@getItem")->name("getItem");
Route::post('item/multi_delete','Admin\ItemController@multi_delete');
Route::get('item/{id}/active', 'Admin\ItemController@do_active');

Route::get('imageitem/destroy/{id}','Admin\imageItemController@destroy');

				Route::resource('imageitem','Admin\imageItemController');
Route::post('imageitem/multi_delete','Admin\imageItemController@multi_delete');
				Route::resource('bank','Admin\BankController');
Route::post('bank/multi_delete','Admin\BankController@multi_delete');
Route::get('reservation/{id}/active', 'Admin\ReservationController@do_active');
				Route::resource('reservation','Admin\ReservationController');
Route::post('reservation/multi_delete','Admin\ReservationController@multi_delete');
				//////// Admin Routes /* End */ //////////////
			});

	});
