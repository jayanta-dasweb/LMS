<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Error\ErrorController;
use App\Http\Controllers\Dashboard\Masters\Agent\AgentController;
use App\Http\Controllers\Dashboard\Masters\CostingCharges\CostingChargesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('error')->group(function () {
    Route::controller(ErrorController::class)->group(function () { 
        Route::get('/invalid-token', 'showInvalidToken')->name('error.invalid-token');
        Route::get('/token-expired', 'showTokenExpired')->name('error.token-expired');
     });
 });


Route::middleware(['auth'])->group(function () {
    Route::get('/sign-out', [SignOutController::class, 'process'])->name('signout.process');

    Route::get('/', function () {
        return 'Hello World';
    })->name('dashboard');

    Route::prefix('master')->group(function () { 
        Route::prefix('agent')->group(function () { 
            Route::controller(AgentController::class)->group(function () {
                Route::get('/create', 'showAgentCreation')->name('master.agent.create.show');
                Route::post('/create', 'processAgentCreation')->name('master.agent.create.process');
            });
        });
    });

    Route::prefix('master')->group(function () { 
        Route::prefix('costing-charges')->group(function () { 
            Route::controller(CostingChargesController::class)->group(function () {
                Route::get('/create', 'showCostingChargesCreation')->name('master.costing-charges.create.show');
                Route::post('/create', 'processCostingChargesCreation')->name('master.costing-charges.create.process');
            });
        });
    });
});


Route::prefix('auth')->group(function () {
    // Common routes for SignInController
    Route::controller(SignInController::class)->middleware('guest')->group(function () {
        Route::get('/sign-in', 'show')->name('auth.sign-in.show');
        Route::post('/sign-in', 'process')->name('auth.sign-in.process');
    });

    // Common routes for ForgetPasswordController
    Route::controller(ForgetPasswordController::class)->middleware('guest')->group(function () {
        Route::get('/forget-password', 'show')->name('auth.forget-password.show');
        Route::post('/forget-password', 'process')->name('auth.forget-password.process');
    });

    // Common routes for ResetPasswordController
    Route::controller(ResetPasswordController::class)->middleware('guest')->group(function () {
        Route::get('/reset-password/{token}', 'show')->middleware('password.reset.token')->name('auth.reset-password.show');
        Route::post('/reset-password', 'process')->name('auth.reset-password.process');

        Route::fallback(function () {
            abort(404);
        });
    });
});
