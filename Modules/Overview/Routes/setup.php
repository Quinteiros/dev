<?php

/*
|--------------------------------------------------------------------------
| Setup Routes
|--------------------------------------------------------------------------
|
| Routes for the "Overview" module
|
*/

Route::group(['middleware' => ['language']], function () {
    
    Route::prefix('overview')->group(function() {
        /*
        |--------------------------------------------------------------------------
        | Overview CONFIGURATION / SETUP ROUTES
        |--------------------------------------------------------------------------
        |
        | Routes for the module's superadministrator 
        |
        */        
        Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:admin']], function () {

            Route::prefix('setup')->group(function() {
                
                Route::get('/', 'OverviewController@setup');
            
            });

        });

    });
});
