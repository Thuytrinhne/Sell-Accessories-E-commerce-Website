<?php

namespace App\Service;

use App\Models\product;
use App\Models\product_item;
use Illuminate\Http\Request;
use App\Models\Respositories\WishlistRepository;

class WishlistService 
{
    public function product(Request $request){
        $product = product::find($request->product_id);
    }
}
