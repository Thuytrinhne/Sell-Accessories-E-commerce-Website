<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table ='cart';

    public function cart_items()
    {
        return $this->hasMany(cart_item::class);
    }

    public function orders()
    {
        return $this->hasnMany(order::class);
    }

}
