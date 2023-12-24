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

    public function storefromproduct_item_id(Request $request, $product_item_id)
    {
        return WishlistService::storefromproduct_item_id($request, $product_item_id);
    }

    public function storefromproduct_id( Request $request)
    {
        // chuyển đến route post
        dd("Đã vào nè");
        return WishlistService::storefromproduct_id($request, $product_id);
    }
   

    public function destroy(string $wishlist_id, string $id)
    {
        return WishlistService::destroy();
    }
}
