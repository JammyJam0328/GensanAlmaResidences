<?php


Route::prefix('dummy-kiosk')->middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {

  Route::get('/kiosk/jam', function () {
    $types = \App\Models\Type::whereHas('rooms', function ($query) {
      $query->where('room_status_id', 1);
    })->with('rooms')->get();
    return view('dev.dummy-kiosk', [
      'types' => $types
    ]);
  });
});
