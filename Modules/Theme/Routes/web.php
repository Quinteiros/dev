<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes for the "Theme" module
|
*/

Route::group(['middleware' => ['language']], function () {
    
    Route::prefix('theme')->group(function() {
        /*
        |--------------------------------------------------------------------------
        | Theme Index Page
        |--------------------------------------------------------------------------
        |
        | This route is directly accessible as soon as the "Theme" module is created and active
        |
        */
        Route::get('/', 'ThemeController@index');


        /*
        |--------------------------------------------------------------------------
        | Theme BACKEND ROUTES
        |--------------------------------------------------------------------------
        |
        | Routes for the module's administrators 
        |
        */
        Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:admin']], function () {

            Route::prefix('backend')->group(function() {
                
                Route::get('/', 'ThemeController@backend');
            
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Theme CONFIGURATION / SETUP ROUTES
        |--------------------------------------------------------------------------
        |
        | Routes for the module's superadministrator 
        |
        */        
        Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:admin']], function () {

            Route::prefix('setup')->group(function() {
                
                Route::get('/', 'ThemeController@setup');
            
            });

        });

    });
});
