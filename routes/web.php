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

// Auth::routes();
Route::get('login', ['uses' => 'Auth\AuthController@getLogin'])->name('login');
Route::post('login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['uses' => 'Auth\AuthController@getLogout']);
//route need permission
// Route::group(['prefix' => 'administrator', 'middleware' => 'authenticate'], function () {
Route::group(['prefix' => 'admin'], function () {
    //system route
    Route::resource('/', 'Admin\DashboardController');

    Route::resource('/dashboard', 'Admin\DashboardController');
    
    Route::get('/user/search', 'Admin\UserController@getSearch');
    Route::get('/user/search-data', 'Admin\UserController@getSearchData');
    Route::resource('/user', 'Admin\UserController');
    Route::get('/search', 'Admin\DashboardController@getSearch');

    // Manage location, city, district
    Route::get('/location', 'Admin\DashboardController@getLocation');
    Route::post('/location', 'Admin\DashboardController@postLocation');

    Route::resource('/pages', 'Admin\PageController');
});
/////////////////////////////////// END ADMIN PAGE ////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// START FRONTEND ///////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

/*
|-------------------------------------------
| ROUTE FOR USER IN FRONTEND
|-------------------------------------------
| @options register, login, edit profile
| @author tantan
 */
// Route::group(['prefix' => 'user'], function () {
//     // Route::get('/purchase', 'Frontends\Users\UsersController@getPurchase');
//     // Route::post('/purchase', 'Frontends\Users\UsersController@postPurchase');
//     Route::get('/', 'Frontends\Users\UsersController@getLoginForm')->name('frontend.user.register')->middleware('guest');

//     Route::get('/register', 'Frontends\Users\UsersController@getRegisterForm')->name('frontend.user.register')->middleware('guest');
//     Route::post('/register', 'Frontends\Users\UsersController@postRegisterForm')->name('frontend.user.store');
//     Route::post('/register-otp', 'Frontends\Users\UsersController@validateOTP');

//     Route::get('/login', 'Frontends\Users\UsersController@getLoginForm')->name('frontend.user.login')->middleware('guest');
//     Route::get('/logout', 'Frontends\Users\UsersController@logout')->name('frontend.user.logout')->middleware('auth');
//     Route::post('/login', 'Frontends\Users\UsersController@postloginForm')->name('frontend.user.dologin');

    
//     |-------------------------------------------
//     | EDIT PROFILE INFO OF AN USER
//     |-------------------------------------------
//     | @params user_id
//     | @method GET POST
//     | @author tantan
     
//     Route::get('/{user}/edit', 'Frontends\Users\UsersController@getProfileForm')->name('frontend.user.edit')->middleware('owner');
//     Route::post('/{user}/edit', 'Frontends\Users\UsersController@postProfileForm')->name('frontend.user.doedit')->middleware('owner');

//     //  Save list sercice to an user
//     Route::post('/{user}/edit/save-services', 'Frontends\Users\UsersController@postSaveService')->name('frontend.user.save_service')->middleware('owner');

//     //  Save list district to an user
//     Route::post('/{user}/edit/save-locations', 'Frontends\Users\UsersController@postSaveLocation')->name('frontend.user.save_location')->middleware('owner');

//     Route::post('/{user}/update-user-info-lender', 'Frontends\Users\UsersController@updateUserInfo')->name('frontend.user.update-user-info-lender')->middleware('owner');
//     Route::post('/uploadavatar', 'Frontends\Users\UsersController@uploadAvatar');
//     Route::post('/uploadimage', 'Frontends\Users\UsersController@uploadimgprofile');
// });