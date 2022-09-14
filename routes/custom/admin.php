<?php

// Route::prefix('admin')->middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//      Route::get('/dashboard', function () {
//         return view('admin-pages.dashboard');
//     })->name('admin.dashboard');
//     Route::get('/manage-rooms', function () {
//         return view('admin-pages.manage-rooms');
//     })->name('admin.manage-rooms');
//     Route::get('/manage-rates', function () {
//         return view('admin-pages.manage-rates');
//     })->name('admin.manage-rates');
//     Route::get('/guests', function () {
//         return view('admin-pages.guests');
//     })->name('admin.guests');
//     Route::get('/manage-users', function () {
//         return view('admin-pages.manage-users');
//     })->name('admin.manage-users');
// });


// redesign the admin dashboard
Route::prefix('re/admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
     Route::get('/dashboard', function () {
        return view('re-design.admin.dashboard');
    })->name('re-admin.dashboard');
    Route::get('/manage-rooms', function () {
        return view('re-design.admin.manage-rooms');
    })->name('re-admin.manage-rooms');
    Route::get('/manage-rates', function () {
        return view('re-design.admin.manage-rates');
    })->name('re-admin.manage-rates');
    Route::get('/guests', function () {
        return view('re-design.admin.manage-guests');
    })->name('re-admin.guests');
    Route::get('/manage-users', function () {
        return view('re-design.admin.manage-users');
    })->name('re-admin.manage-users');
});