<?php

Route::prefix('room-boy')->middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
  'roomboy'
])->group(function () {
  Route::get('/home', function () {
    return view('roomboy-pages.home');
  })->name('roomboy.home');
});
