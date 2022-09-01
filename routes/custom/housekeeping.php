<?php


Route::prefix('house-keeping')->middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('housekeeping-pages.dashboard');
  })->name('house-keeping.dashboard');
  Route::get('/designations', function () {
    return view('housekeeping-pages.designations');
  })->name('house-keeping.designations');
  Route::get('/room-boy', function () {
    return view('housekeeping-pages.room-boy');
  })->name('house-keeping.room-boy');
  Route::get('/rooms-monitoring', function () {
    return view('housekeeping-pages.rooms-monitoring');
  })->name('house-keeping.rooms-monitoring');
});