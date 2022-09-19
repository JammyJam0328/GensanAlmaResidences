<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

    protected function getOrders(): Attribute
    {
        return new Attribute(get: function($value){
            return $this->count();
        });
    }
}
