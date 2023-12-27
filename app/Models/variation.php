<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;
    protected $table ='variation';

    public function product_configurations()
    {
        return $this->hasMany(product_configuration::class);
    }

}