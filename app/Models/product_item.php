<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product_item extends Model
{
    use HasFactory;
    protected $table ='product_item';
    protected $fillable = [
        'id',
        'product_id',
        'price' ,
        'quantity',
        'SKU',
        'image',
        'discount_price',
    ] ;

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function cart_items()
    {
        return $this->hasMany(cart_item::class);
    }

}
