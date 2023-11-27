<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\CartController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_payment = DB::select("SELECT *
                                    FROM 
                                            `order`, payment
                                    WHERE 
                                            `order`.payment_id = payment.id
                                            and `order`.user_id = 1
                                            
                                            ");
        $user_order = DB::select ("SELECT cart_item.quantity,product.name_product,product_item.price
                                    FROM
                                            `order`, cart, cart_item, product_item, product
                                    WHERE
                                            `order`.cart_id = cart.id
                                            and cart_item.cart_id = cart.id
                                            and cart_item.product_item_id = product_item.id
                                            and product_item.product_id = product.id
                                            and `order`.user_id = 1
                ");  
        
        // $user_order = order::with('cart', 'cart.cartItems', 'cart.cartItems.productItems','cart.cartItems.productItems.product')->get();
        $product_item_cart = CartController::getCartitem();
       
       
        return view('.front.customer.history-orders',compact('user_payment', 'user_order', 'product_item_cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
