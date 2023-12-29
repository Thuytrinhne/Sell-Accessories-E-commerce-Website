<?php

namespace App\Models\Respositories;

use App\Models\cart;
use Illuminate\Http\Request;
use Auth;

class CartRespository 
{
  // create new cart for user 
  public static function store()
  {
        $cart = new cart();
        $cart->user_id = Auth()->user()->id;
        $cart ->save();
        return $cart;
  }
}
