<?php

namespace App\Models\Respositories;

use  App\Models\wishlist_item;
use  App\Models\wishlist;
use App\Models\product;
use App\Models\product_item;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\WishlistRequest;

use DB;
use Auth;

class Wishlist_ItemRespository 
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public static function product()
    {
        $id =  Auth::user()->id;
       return  $wishlistItems=  DB::select
       ("select wishlist_item.id, product.name_product, product_item.price, product_item.quantity, wishlist_item.product_id, wishlist_item.product_item_id from wishlist join wishlist_item 
       on wishlist.id = wishlist_item.wishlist_id 
       left join product_item on product_item.id = wishlist_item.product_item_id 
       left join product 
       on product.id = wishlist_item.product_id or product.id = product_item.product_id
       where wishlist.user_id = '$id'");
    }
    public static function store($product)
    {
        $product = product_item::join('product', 'product_item.product_id', '=', 'product.id')->get();
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy($id)
    {
        $wishlist_item = wishlist_item::find($id);
        $wishlist_item->delete();
    }
}
