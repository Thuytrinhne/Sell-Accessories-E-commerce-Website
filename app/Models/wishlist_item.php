<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist_item extends Model
{
    use HasFactory;
    protected $table ='wishlist_item';
    protected $fillable = [
        'wishlist_id'
    ];

}
