<?php


Route::prefix('frontdesk')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'frontdesk'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('frontdesk-pages.dashboard');
    })->name('frontdesk.dashboard');
    Route::get('/check-in', function () {
        return view('frontdesk-pages.check-in');
    })->name('frontdesk.check-in');
    Route::get('/check-out', function () {
        return view('frontdesk-pages.check-out');
    })->name('frontdesk.check-out');
    Route::get('/guests', function () {
        return view('frontdesk-pages.guests');
    })->name('frontdesk.guests');
    Route::get('/transactions', function () {
        return view('frontdesk-pages.transactions');
    })->name('frontdesk.transactions');
    Route::get('/rooms', function () {
        return view('frontdesk-pages.rooms');
    })->name('frontdesk.rooms');
});

Route::prefix('re/frontdesk')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'frontdesk'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('re-design.frontdesk.dashboard');
    })->name('re-frontdesk.dashboard');
    Route::get('/check-in', function () {
        return view('re-design.frontdesk.check-in');
    })->name('re-frontdesk.check-in');
    Route::get('/check-out', function () {
        return view('re-design.frontdesk.check-out');
    })->name('re-frontdesk.check-out');
    Route::get('/guests', function () {
        return view('re-design.frontdesk.guests');
    })->name('re-frontdesk.guests');
    Route::get('/room-monitoring', function () {
        return view('re-design.frontdesk.room-monitoring');
    })->name('re-frontdesk.room-monitoring');
});