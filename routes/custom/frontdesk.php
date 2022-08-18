<?php


Route::prefix('frontdesk')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('frontdesk-pages.dashboard');
    })->name('frontdesk.dashboard');
});