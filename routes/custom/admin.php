<?php

Route::prefix('admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
     Route::get('/dashboard', function () {
        return view('admin-pages.dashboard');
    })->name('admin.dashboard');
    Route::get('/manage-rooms', function () {
        return view('admin-pages.manage-rooms');
    })->name('admin.manage-rooms');
    Route::get('/manage-rates', function () {
        return view('admin-pages.manage-rates');
    })->name('admin.manage-rates');
    Route::get('/guests', function () {
        return view('admin-pages.guests');
    })->name('admin.guests');
});