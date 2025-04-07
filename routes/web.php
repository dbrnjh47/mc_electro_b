<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmController;
use App\Http\Controllers\Auth\IndexController as AuthIndexController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\RestoreController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


// Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/?', [PageController::class, 'index'])->name('profile');
    Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');

    Route::get('/currency/set/{id}', [CurrencyController::class, 'set'])->name('currency.set');
    //
    Route::prefix('auth')->group(function () {
        Route::middleware(['guest'])->group(function () {
            // Route::get('/login', 'Auth\AuthController@show')->name('login');
            Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

            Route::prefix('signup')->group(function () {
                // Route::group(['middleware' => 'throttle:5,5'], function () {
                // Route::get('/', 'Auth\RegistrationController@show')->name('signup');
                Route::post('/', [RegistrationController::class, 'registration'])->name('registration');
                // });

                Route::group(['middleware' => 'throttle:5,5'], function () {
                    // Route::post('/repeat/email/send', 'Auth\RegistrationController@repeatEmailSend')->name('registration.repeat.email.send');
                    Route::get('/confirmation/{user_id}/{token}', [ConfirmController::class, 'index'])->name('signup.confirmation');
                });
            });

            Route::prefix('restore')->group(function () {
                Route::get('/', [RestoreController::class, 'show'])->name('restore');
                Route::post('/', [RestoreController::class, 'reset'])->name('restore.reset');

                //

                Route::prefix('password')->group(function () {
                    Route::get('/{user_id}&{token}', [UpdatePasswordController::class, 'show'])->name('restore.new.password');
                    Route::post('/', [UpdatePasswordController::class, 'update'])->name('restore.update.password');
                });
            });

            //

            // Route::prefix('social')->group(function () {
            //     Route::get('/{driver?}', 'Auth\SocialController@redirect')->name('auth.social');
            //     Route::get('/callback/{driver?}', 'Auth\SocialController@callback')->name('auth.social.callback');
            // });

        });

        Route::middleware(['auth'])->group(function () {
            Route::get('/logout', [AuthIndexController::class, 'logout'])->name('logout');
        });
    });
// });
