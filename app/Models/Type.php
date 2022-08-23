<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_types');
    }
    public function roomtypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
