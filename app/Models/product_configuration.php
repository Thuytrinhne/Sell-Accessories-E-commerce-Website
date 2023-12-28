<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_configuration extends Model
{
    use HasFactory;
    protected $table ='product_configuration';

    public function productItem()
    {
        return $this->belongsTo(product_item::class);
    }

    public function variation()
    {
        return $this->belongsTo(variation::class);
    }

}
