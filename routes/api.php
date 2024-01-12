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

Route::get('home', [ ApiController::class, 'home' ]);

Route::post('login', [ ApiController::class, 'login' ]);
Route::post('send-otp', [ ApiController::class, 'send_otp' ]);
Route::post('register', [ ApiController::class, 'register' ]);
Route::get('categories', [ ApiController::class, 'categories' ]);
Route::get('category/{id_or_slug}', [ ApiController::class, 'categories' ]);

Route::get('products', [ ApiController::class, 'products' ]);
Route::get('product/{id_or_slug}', [ ApiController::class, 'product' ]);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('profile', [ ApiController::class, 'profile' ]);
    Route::get('dealers', [ ApiController::class, 'dealers' ]);
    Route::get('dealer/{id}', [ ApiController::class, 'dealer' ]);
    Route::get('customers', [ ApiController::class, 'customers' ]);
    Route::get('customer/{id}', [ ApiController::class, 'customer' ]);
    
});

