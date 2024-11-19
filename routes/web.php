<?php
// Route::get('lang/{lang}', function($lang) {
//     session()->has('lang') ? session()->forget('lang') : "";
//     $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
//     return back();
// });


 Route::get('/sdd', function (){
     echo "kareem";
 });
// Route::get('/', 'FrontController@home');
Route::get('/', 'FrontController@defaultIndex')->name('defaultIndex');

Route::get('test', function() {
    dd(config('mail'));

});
Route::get('/user/verify/{token}', 'FrontController@verifyUser');


Route::get('maintenance', 'FrontController@maintenance')->name('maintenance');

//site_status
Route::view('404', 'website.notfoundpage');

Route::group(['middleware' => 'status'], function () {


    // Route::get('/', 'FrontController@home');
    Route::get('/profile/{id}', 'FrontController@profile');
    Route::get('page/{id}', 'FrontController@page');
    Route::get('/chalets', 'FrontController@chalets')->name("chalets");
    Route::get('/contectus', 'FrontController@contectus')->name("contectus");
    Route::post('/contectus_post', 'FrontController@contactus_post')->name("contactus_post");
    Route::get('/singleChalet/{id}', 'FrontController@singleChalet')->name("singleChalet");
    Route::post('/profile_edit_post', 'FrontController@profile_edit_post')->name("profile_edit_post");



    Route::post('/Login_by_phone', 'Api\AuthController@Login')->name("Login_by_phone");

    Route::post('/register_post', 'Api\AuthController@register')->name("register");

    Route::post('/otp_post', 'Api\AuthController@otp')->name("otp_post");
    Route::get('/otp', 'FrontController@otp')->name("otp");
    Route::get('/login_name', 'Api\AuthController@login_name')->name("login_name");
    Route::get('/convent', 'FrontController@convent')->name("convent");




    Route::middleware('auth')->group(function () {
        Route::get('/myprofile', 'FrontController@myprofile')->name("myprofile");
        Route::post('/reservation', 'FrontController@reservation')->name("reservation");

        Route::get('/Myreservations', 'FrontController@Myreservations')->name("Myreservations");

        //myprofile

    });
});


Route::any('/logout', function () {
    auth::logout();
    return back();
})->name('logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
