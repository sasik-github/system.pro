<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


    Route::get('/', 'NewsController@redirectToNews');

    Route::auth();

    Route::controller('news', 'NewsController');
    Route::controller('about', 'AboutController');
    Route::controller('children', 'ChildrenController');
    Route::controller('parents', 'ParentsController');
    Route::controller('tariffs', 'TariffsController');

    Route::get('profile', 'ParentProfileController@getIndex');
    Route::get('profile/events/{child}', 'ParentProfileController@getEvents');
    Route::get('profile/tariff', 'ParentProfileController@getChooseTariff');
    Route::post('profile/tariff-submission', 'ParentProfileController@postChooseTariff');
    Route::get('profile/tariff-fail', 'ParentProfileController@getBuyTariffFail');


    Route::get('payment', 'PaymentController@getIndex');
    Route::post('payment/success', 'PaymentController@postSuccess');
    Route::post('payment/fail', 'PaymentController@postFail');
    Route::post('payment/result', 'PaymentController@postResult');

    Route::get('admin/test-event', 'EventsController@getTestEvent');
    Route::post('admin/test-event', 'EventsController@postTestEvent');

});

Route::group(['prefix' => 'api/'], function () {

    Route::controller('auth', 'Api\AuthController');
    Route::resource('news', 'Api\NewsController');

    Route::get('events/stats', 'Api\EventsController@getStatsForMonth');
    Route::controller('events', 'Api\EventsController');


    Route::group(['middleware' => ['api'],], function() {
        Route::resource('token', 'Api\TokensController');
        Route::controller('users', 'Api\UsersController');
    });


});
