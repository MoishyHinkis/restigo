<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supllier extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function draftOrder()
    {
        return $this->hasOne(Order::class)->ofMany(['created_at'=>'max'],fn($order) => $order->whereNull('sent_at'));
    }
}
