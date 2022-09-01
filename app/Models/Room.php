<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function room_status()
    {
        return $this->belongsTo(RoomStatus::class);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class, 'room_types');
    }

    public function check_in_details()
    {
        return $this->hasMany(CheckInDetail::class);
    }

    public function room_boys()
    {
        return $this->hasMany(RoomBoy::class);
    }
}
