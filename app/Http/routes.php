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

Route::get('/', function () {
    return view('welcome');
});

//Register new subscriber

Route::post('v1/subscriber', 'SubscriberController@addSubscriber');

// list all subscriber
Route::get('v1/subscriber', 'SubscriberController@listSubscriber');

//get a subscriber
Route::get('v1/subscriber/{subscriber}', 'SubscriberController@getSubscriber');

//update subscriber
Route::patch('v1/subscriber/{subscriber}', 'SubscriberController@updateSubscriber');

//Delete subscriber
Route::delete('v1/subscriber/{subscriber}', 'SubscriberController@deleteSubscriber');


