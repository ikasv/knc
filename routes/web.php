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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product', [HomeController::class, 'product'])->name('product');
// Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
// Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
// Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank-you');

Route::view('about-us', 'about');
Route::view('contact-us', 'contact');
Route::view('thank-you', 'thank-you');
Route::view('generate-qrcode', 'qr-code-view');

Route::get('linkstorage', function () {
    Artisan::call('storage:link');
});