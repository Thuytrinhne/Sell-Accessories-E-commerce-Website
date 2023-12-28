<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table ='product';
    protected $fillable = [
        'name_product', // Thêm trường _token vào fillable
        // ...Thêm các trường khác nếu cần
    ];

    public function productItems()
    {
        return $this->hasMany(product_item::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function product_images()
    {
        return $this->hasMany(product_images::class);
    }

    

}
