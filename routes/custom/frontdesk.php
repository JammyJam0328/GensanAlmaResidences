<?php


Route::prefix('frontdesk')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
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