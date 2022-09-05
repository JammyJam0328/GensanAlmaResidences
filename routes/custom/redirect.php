<?php

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role_id;
        switch ($role) {
          case  Role::admin():
            return redirect()->route('re-admin.dashboard');
            break;
          case Role::frontdesk():
            return redirect()->route('frontdesk.dashboard');
            break;
          case Role::kitchen():
            return redirect()->route('kitchen.dashboard');
            break;
          case Role::bellboy():
           return redirect()->route('roomboy.home');
            break;
          case Role::housekeeping():
            return redirect()->route('house-keeping.dashboard');
            break;
          case Role::kiosk():
            return redirect()->route('kiosk.transaction');
            break;
          default:
            # code...
            break;
        }
    })->name('dashboard');
});