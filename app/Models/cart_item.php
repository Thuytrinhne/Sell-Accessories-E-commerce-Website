<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_item extends Model
{
    use HasFactory;
    protected $table ='cart_item';

    public function product_item()
    {
        return $this->belongsTo(product_item::class);
    }

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
}
