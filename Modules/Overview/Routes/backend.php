<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Routes for the "Overview" module
|
*/

Route::group(['middleware' => ['language']], function () {
    
    Route::prefix('overview')->group(function() {

        /*
        |--------------------------------------------------------------------------
        | Overview BACKEND ROUTES
        |--------------------------------------------------------------------------
        |
        | Routes for the module's administrators 
        |
        */
        Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:backend']], function () {

            Route::prefix('backend')->group(function() {
                
                Route::get('/', 'OverviewController@backend');
            
            });

        });

    });
});
