<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/kiosk')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',function(){
        return view('kiosk-pages.select-transaction');
    })->name('kiosk.transaction');
    Route::get('/check-in',function(){
        return view('kiosk-pages.checkin');
    })->name('kiosk.checkin');
    Route::get('/check-out',function(){
        return view('kiosk-pages.checkout');
    })->name('kiosk.checkout');

    Route::get('/reports',function(){
        return view('kiosk.reports');
    })->name('kiosk.reports');
});


Route::prefix('/kitchen')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',function(){
        return view('kitchen-pages.dashboard');
    })->name('kitchen.dashboard');
    Route::get('/orders',function(){
        return view('kitchen-pages.order');
    })->name('kitchen.order');
   
    Route::get('/menu',function(){
        return view('kitchen-pages.menu');
    })->name('kitchen.menu');
    Route::get('/menu/{id}',function(){
        return view('kitchen-pages.manage-menu');
    })->name('kitchen.manage-menu');
    Route::get('/settings',function(){
        return view('kitchen-pages.settings');
    })->name('kitchen.settings');
   
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::fallback(function () {
    return view('404');
});