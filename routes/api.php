<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', function () {
    return "test";
});

Route::post('/insertIssue', 'api\GuideController@insertIssue')->name('insertIssue');
Route::group(['prefix' => 'provider'], function () {
    Route::post('/login', 'api\providerController@login')->name('provider-login');
    Route::post('/logout', 'api\providerController@logout')->name('provider-logout');
    Route::post('/register', 'api\providerController@register')->name('provider-register');
    Route::post('/forgetpassword', 'api\providerController@forgetPassword')->name('provider-forget-password');
    Route::post('/getforgetcode', 'api\providerController@getForgetCode')->name('provider-forget-code');
    Route::post('/updateLatLng', 'api\providerController@updateLatLng')->name('provider-updateLatLng');
    Route::post('/updateWorkStatus', 'api\providerController@updateWorkStatus')->name('provider-updateWorkStatus');
    Route::post('/socialLogin', 'api\providerController@socialLogin')->name('provider-socialLogin');
    Route::post('/updateProfile', 'api\providerController@updateProfile')->name('provider-updateProfile');
    Route::post('/updatePassword', 'api\providerController@updatePassword')->name('provider-updatePassword');
    Route::post('/getNearByProviders', 'api\providerController@getNearByProviders')->name('provider-getNearByProviders');
    Route::post('/requestJobApproval', 'api\providerController@requestJobApproval')->name('provider-requestJobApproval');
    Route::post('/rating', 'api\providerController@rating')->name('provider-rating');
    Route::get('/checkPendingJob', 'api\providerController@checkPendingJob')->name('api-pending-job');
    Route::post('/checkRating', 'api\providerController@checkRating')->name('provider-check-rating');
    Route::post('/earning', 'api\providerController@earning')->name('provider-earning');
    Route::get('/bankinfo', 'api\providerController@bankInfo')->name('provider-bankinfo');
    Route::post('/bankinfo', 'api\providerController@bankInfo')->name('provider-bankinfo');
    Route::post('/weeklyearning', 'api\providerController@weeklyEarning')->name('provider-weeklyearning');
});
    
Route::group(['prefix' => 'customer'], function () {
    Route::post('/login', 'api\customerController@login')->name('customer-login');
    Route::post('/logout', 'api\customerController@logout')->name('customer-logout');
    Route::post('/register', 'api\customerController@register')->name('customer-register');
    Route::post('/forgetpassword', 'api\customerController@forgetPassword')->name('customer-forget-password');
    Route::post('/getforgetcode', 'api\customerController@getForgetCode')->name('customer-forget-code');
    Route::post('/updateLatLng', 'api\customerController@updateLatLng')->name('customer-updateLatLng');
    Route::post('/socialLogin', 'api\customerController@socialLogin')->name('customer-socialLogin');
    Route::post('/updateProfile', 'api\customerController@updateProfile')->name('customer-updateProfile');
    Route::post('/updatePassword', 'api\customerController@updatePassword')->name('customer-updatePassword');

    
    Route::post('/validateCoupons', 'api\DiscountController@validateCoupons')->name('validate-coupon');
    Route::post('/nearByProviders', 'api\customerController@nearByProviders')->name('api-near-by-providers');
    Route::post('/addCard', 'api\customerController@addCard')->name('api-add-card');
    Route::post('/getUserStripDetails', 'api\customerController@getUserStripDetails')->name('api-get-user-strip-details');
    Route::post('/setDefaultStripCard', 'api\customerController@setDefaultStripCard')->name('api-set-default-strip-card');
    Route::post('/removeStripCard', 'api\customerController@removeStripCard')->name('api-remove-strip-card');
    Route::post('/checkRating', 'api\customerController@checkRating')->name('customer-check-rating');
});

Route::group(['prefix' => 'user'], function () {
    Route::post('/enable', 'api\UserController@enable')->name('user-enable');
});

Route::group(['prefix' => 'general'], function () {
    Route::get('/services', 'api\serviceController@services')->name('api-services');
    Route::post('/serviceDetailByName', 'api\serviceController@serviceDetailByName')->name('api-service-detail-by-name');
    Route::get('/limitations', 'api\serviceController@limitations')->name('api-limitations');
    Route::post('/get-users-by-id', 'api\customerController@getUserDetailById')->name('api-get-users-by-id');
    Route::get('/dispatch-job', 'api\jobController@jobDispatch')->name('api-job-dispatch');
    Route::get('/timeout-job', 'api\jobController@timeout')->name('api-job-timeout');
    Route::get('/getNotifications', 'api\notificationController@getNotifications')->name('api-get-notifications');
    Route::get('/getBookings', 'api\jobController@getBookings')->name('api-get-bookings');
    Route::get('/getDrivers', 'api\jobController@getDrivers')->name('api-get-drivers');
    Route::post('/set-notification-marked', 'api\notificationController@setNotificationMarked');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::post('/store', 'api\jobController@storeJob')->name('api-store-job');
    Route::post('/checkJobById', 'api\jobController@checkJobById')->name('api-check-job-by-id');
    Route::post('/acceptJob', 'api\jobController@acceptJob')->name('api-accept-job');
    Route::post('/rejectJob', 'api\jobController@rejectJob')->name('api-reject-job');
    Route::post('/checkCurrentJob', 'api\jobController@checkCurrentJob')->name('api-current-job');
    Route::post('/checkPendingJob', 'api\jobController@checkPendingJob')->name('api-pending-job');
    Route::post('/checkPreviousJob', 'api\jobController@checkPreviousJob')->name('api-previous-job');
    Route::post('/leftJob', 'api\jobController@cancelJob')->name('api-cancel-job');
    Route::post('/customerApprove', 'api\jobController@customerApprove')->name('api-customer-approve-job');
    Route::post('/updateStatus', 'api\jobController@updateStatus')->name('api-update-job-status');
    Route::post('/jobEditRequest', 'api\jobController@jobEditRequest')->name('api-job-edit-request');
    Route::post('/editRequestStatus', 'api\jobController@editRequestStatus')->name('api-job-edit-request-status');
});

Route::group(['prefix' => 'chat'], function () {
    Route::post('/send', 'api\ChatController@sendMessage')->name('api-send-chat-message');
    Route::post('/get', 'api\ChatController@getMessages')->name('api-get-chat-messages');
});
