<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmController;
use App\Http\Controllers\Auth\IndexController as AuthIndexController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\RestoreController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Category\IndexController as CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Product\IndexController;
use App\Http\Controllers\Profile\CompanyController as ProfileCompanyController;
use App\Http\Controllers\Profile\OrderController as ProfileOrderController;
use App\Http\Controllers\Profile\WishlistController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Text\AgreementController;
use App\Http\Controllers\Text\PolicyController;
use App\Http\Controllers\СontactController;
use Illuminate\Support\Facades\Route;


// Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/currency/set/{id}', [CurrencyController::class, 'set'])->name('currency.set');
//
Route::prefix('profile')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [ProfileOrderController::class, 'all'])->name('profile');
        Route::prefix('orders')->group(function () {
            Route::get('/', [ProfileOrderController::class, 'all'])->name('profile.orders');
        });
        Route::prefix('order')->group(function () {
            Route::get('/{id}', [ProfileOrderController::class, 'show'])->name('profile.order');
        });
        Route::get('/companies', [ProfileCompanyController::class, 'all'])->name('profile.companies');
    });
    Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');
});

//

Route::prefix('promotions')->group(function () {
    Route::get('/', [PromotionController::class, 'all'])->name('promotions');
});
Route::prefix('promotion')->group(function () {
    Route::get('/{id}', [PromotionController::class, 'show'])->name('promotion');
});

//

Route::prefix('contacts')->group(function () {
    Route::get('/{page?}', [СontactController::class, 'all'])->where('page', '\d+')->name('contacts');
    Route::post('/', [СontactController::class, 'block'])->name('contacts.block');
});
Route::prefix('contact')->group(function () {
    Route::get('/{id}', [СontactController::class, 'show'])->name('contact');
});

//

Route::prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'all'])->name('companies');
});
Route::prefix('company')->group(function () {
    Route::get('/{id}', [CompanyController::class, 'show'])->name('company');
});

//

//
Route::get('/categories', [CategoryController::class, 'all'])->name('categories');
Route::prefix('category')->group(function () {
    Route::get('/{slugs}', [CategoryController::class, 'show'])->where('slugs', '.*')->name('category');
});
Route::get('/product/{slug}', [IndexController::class, 'show'])->name('product');
//

Route::prefix('auth')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AuthController::class, 'show'])->name('login');
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

//

Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback');
Route::get('/about', [AboutController::class, 'show'])->name('about');

// txt
Route::get('/agreement', [AgreementController::class, 'show'])->name('agreement');
Route::get('/policy', [PolicyController::class, 'show'])->name('policy');
// });
