<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cart_item;
use Illuminate\Http\Request;

use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function getCartitem() {
        $id = 1;
        $product_item = DB::select("SELECT product.name_product,cart_item.quantity,product_item.price,cart_item.id
                                    FROM cart_item, product_item, product
                                    WHERE
                                        cart_item.product_item_id = product_item.id
                                        and product_item.product_id = product.id
                                        and cart_item.cart_id = '$id'
                                    
            ");
        return $product_item;

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyItem($id)
    {   
        $item = cart_item::find($id);
        $item->delete();

        return redirect()->back();
    }
}
