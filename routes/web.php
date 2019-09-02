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

Route::get('/', function () { return view('welcome');});
Route::get('/about-us', 'UserController@aboutus')->name('about-us');
Route::get('/contact-us', 'UserController@contactus')->name('home');
Route::get('/findcar', 'UserController@findcar')->name('findcar');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	
	#ADMIN
	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
		Route::prefix('admin')->group(function() { 
			Route::get('/home', 'AdminController@index')->name('admin-home');
			Route::resource('/announcements','AdminAnnouncementController');
		});
	});

	#DRIVER
	Route::group(['middleware' => 'App\Http\Middleware\DriverMiddleware'], function () {
		Route::prefix('driver')->group(function() {
			Route::get('/home', 'DriverController@index')->name('driver-home');
			Route::resource('/insertlist','InsertListingsController');
			Route::resource('/insertcar','InsertCarController');
			Route::resource('/my-jobs','DriverJobsController');

			#Job Status
			Route::post('/my-jobs/approve/{id}', 'DriverJobsController@postApprove')->name('approvetxn');
			Route::post('/my-jobs/done/{id}', 'DriverJobsController@postDone')->name('donetxn');
			Route::post('/my-jobs/reject/{id}', 'DriverJobsController@postReject')->name('denytxn');
			Route::post('/my-jobs/cancel/{id}', 'DriverJobsController@postCancel')->name('canceltxn');

			#My Profile Routes
			Route::resource('/my-profile','DriverProfileController');
			Route::get('/my-transactions','TxnHistoryController@driver')->name('driver-txn');
			Route::get('/changepass','DriverProfileController@showChangePassword')->name('changepass');
			Route::post('/changePassword','DriverProfileController@changePassword')->name('changePassword');
			Route::post('/profilepic','ProfilePicController@updatepic')->name('updatepic');
			Route::get('/profilepic','ProfilePicController@driverShow')->name('dpage-show');

			Route::get('/my-profile/update/', [
        	'as' => 'my-profile/update',
      	  	'uses' => 'DriverProfileController@update']);
		});
	});
	
	#USER
	Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {
		Route::prefix('user')->group(function() {
			Route::get('/home', 'UserController@index')->name('user-home');
			Route::get('/about-us', 'UserController@aboutus')->name('about-us');
			Route::get('/contact-us', 'UserController@contactus')->name('contact-us');
			Route::resource('/findcar', 'ListingController');
			Route::get('/findcar/{id}','ListingController@show')->name('cardetails');
			Route::get('/my-transactions','TxnHistoryController@user')->name('user-txn');
			Route::resource('/search','UserSearchController');
			Route::get('/s-result','UserSearchController@search')->name('s-result');

			#My Profile Routes
			Route::resource('/my-profile','UserProfileController');
			Route::get('/changepass','UserProfileController@showChangePassword')->name('changepass');
			Route::post('/changePassword','UserProfileController@changePassword')->name('changePassword');
			Route::post('/profilepic','ProfilePicController@updatepic')->name('updatepic');
			Route::get('/profilepic','ProfilePicController@userShow')->name('upage-show');

			Route::get('/my-profile/update/{id}', [
       		'as' => 'my-profile/update',
       		'uses' => 'UserProfileController@update']);
		});
	});
});

		
