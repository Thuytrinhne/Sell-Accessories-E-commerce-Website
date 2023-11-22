<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product_item extends Model
{
    use HasFactory;
    protected $table ='product_item';

    public function cartItems()
    {
        return $this->hasMany(cart_item::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
