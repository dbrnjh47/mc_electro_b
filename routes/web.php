<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');

//
Route::prefix('auth')->group(function () {
    Route::middleware(['guest'])->group(function () {
        // Route::get('/login', 'Auth\AuthController@show')->name('login');
        // Route::post('/auth', 'Auth\AuthController@auth')->name('auth');

        Route::prefix('signup')->group(function () {
            // Route::group(['middleware' => 'throttle:5,5'], function () {
                // Route::get('/', 'Auth\RegistrationController@show')->name('signup');
                Route::post('/', 'Auth\RegistrationController@registration')->name('registration');
            // });

            Route::group(['middleware' => 'throttle:5,5'], function () {
                Route::post('/repeat/email/send', 'Auth\RegistrationController@repeatEmailSend')->name('registration.repeat.email.send');
                Route::get('/confirmation/{user_id}/{token}', 'Auth\ConfirmController@registration')->name('signup.confirmation');
            });
        });

        Route::prefix('restore')->group(function () {
            Route::get('/', 'Auth\RestoreController@show')->name('restore');
            Route::post('/', 'Auth\RestoreController@reset')->name('reset.password');

            //

            Route::prefix('password')->group(function () {
                Route::get('/{user_id}&{token}', 'Auth\UpdatePasswordController@show')->name('restore.new.password');
                Route::post('/', 'Auth\UpdatePasswordController@update')->name('restore.update.password');
            });
        });

         //

        // Route::prefix('social')->group(function () {
        //     Route::get('/{driver?}', 'Auth\SocialController@redirect')->name('auth.social');
        //     Route::get('/callback/{driver?}', 'Auth\SocialController@callback')->name('auth.social.callback');
        // });

    });

    Route::middleware(['auth'])->group(function () {
        // Route::get('/logout', 'Auth\IndexController@logout')->name('logout');
    });
});
