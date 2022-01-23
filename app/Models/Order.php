<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supllier()
    {
        return $this->belongsTo(Supllier::class);
    }

    public function amounts()
    {
        return $this->hasMany(Amount::class);
    }
    public function getWorthAttribute()
    {
        return $this->amounts->map(fn($amount) => $amount->amount * $amount->item->price)->reduce(fn($total,$worth) => $total +$worth);
    }
}
