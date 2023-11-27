<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

     class cart extends Model
{
    use HasFactory;
    protected $table ='cart';

    public function order()
    {
        return $this->hasMany(order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(cart_item::class);
    }
}
