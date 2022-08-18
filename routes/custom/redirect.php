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
            return redirect()->route('admin.dashboard');
            break;
          case Role::frontdesk():
            return redirect()->route('frontdesk.dashboard');
            break;
          case Role::kitchen():
            dd('kitchen');
            break;
          case Role::bellboy():
            dd('bellboy');
            break;
          case Role::housekeeping():
            dd('housekeeping');
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