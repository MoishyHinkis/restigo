<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
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

    public function draftAmount()
    {
        return $this->hasOne(Amount::class)->ofMany(['created_at'=>'max'], fn($amount) => $amount->whereHas('order',fn($order)=>$order->whereNull('sent_at')));
    }
}
