<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
    public function check_in_detail()
    {
        return $this->hasOne(CheckInDetail::class);
    }
}
