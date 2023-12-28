<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\wishlist_item;
use Illuminate\Http\Request;
use App\Service\WishlistService;

class WishlishController extends Controller
{
    public function index(Request $request)
    {
        return WishlistService::index();
    }

    public function storefromproduct_item_id(Request $request)
    {
        return WishlistService::storefromproduct_item_id($request);
    }

    public function storefromproduct_id( Request $request)
    {
        
        return WishlistService::storefromproduct_id($request);
    }
   

    public function destroy($id)
    {
        return WishlistService::destroy($id);
    }
}
