<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table ='order';
    protected $casts = [
        'date_order' => 'datetime:d/m/Y',
    ];
}
