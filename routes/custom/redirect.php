<?php

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role_id;
        switch ($role) {
          case  "1":
            return redirect()->route('re-admin.dashboard');
            break;
          case "2":
            return redirect()->route('re-frontdesk.dashboard');
            break;
          case "4":
            return redirect()->route('kitchen.dashboard');
            break;
          case "5":
           return redirect()->route('roomboy.home');
            break;
          case "6":
            return redirect()->route('house-keeping.dashboard');
            break;
          case "3":
            return redirect()->route('kiosk.transaction');
            break;
          default:
            # code...
            break;
        }
    })->name('dashboard');
});