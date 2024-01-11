<?php

use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login-with-email-or-mobile-and-password', [ ApiController::class, 'login_with_email_or_mobile_and_password' ]);
Route::post('send-otp', [ ApiController::class, 'send_otp' ]);
Route::post('register', [ ApiController::class, 'register' ]);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('profile', [ ApiController::class, 'profile' ]);
    Route::get('dealers', [ ApiController::class, 'dealers' ]);
    Route::get('dealer/{id}', [ ApiController::class, 'dealer' ]);
    Route::get('customers', [ ApiController::class, 'customers' ]);
    Route::get('customer/{id}', [ ApiController::class, 'customer' ]);
    
});

