<?php
Route::group([
    'namespace' => '\Haruncpi\LaravelUserActivity\Controllers',
    'middleware' => config('user-activity.middleware'),
   
    ], function () {
    
    Route::get(config('user-activity.route_path'), 'ActivityController@getIndex')->middleware('can:Ver lista de eq');
    Route::post(config('user-activity.route_path'), 'ActivityController@handlePostRequest')->middleware('can:Ver lista de eq');
});