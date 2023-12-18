<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\wishlist_item;
class wishlist extends Model
{
    use HasFactory;
    protected $table ='wishlist';
    public function items()
    {
        return $this->hasMany(wishlist_item::class, 'wishlist_id');
    }
}
