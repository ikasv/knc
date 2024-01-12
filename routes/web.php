<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('clearCache', function() {
    Artisan::call('view:clear');
       Artisan::call('route:clear');
       Artisan::call('config:clear');
       return 'Cache Cleared';
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/thank_you', [HomeController::class, 'thank_you'])->name('thank_you');

Route::view('about-us', 'about');

Route::get('linkstorage', function () {
    Artisan::call('storage:link');
});