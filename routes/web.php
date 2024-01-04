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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('about-us', 'about');

Route::get('linkstorage', function () {
    Artisan::call('storage:link');
});