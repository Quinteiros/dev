<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes for the "Overview" module
|
*/

Route::group(['middleware' => ['language']], function () {
    
    Route::prefix('overview')->group(function() {
        /*
        |--------------------------------------------------------------------------
        | Overview Index Page
        |--------------------------------------------------------------------------
        |
        | This route is directly accessible as soon as the "Overview" module is created and active
        |
        */
        Route::get('/', 'OverviewController@index');


        /*
        |--------------------------------------------------------------------------
        | Overview Frontend ROUTES
        |--------------------------------------------------------------------------
        |
        | Routes for the module's authed, registered ... user 
        |
        */
        Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:frontend']], function () {

            Route::prefix('frontend')->group(function() {
                
                Route::get('/', 'OverviewController@frontend');
            
            });

        });

    });
});
