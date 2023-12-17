<?php

namespace App\Http\Controllers;


use App\Models\user_address;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Service\User_AddressService;
class User_AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_AddressService::index();
        // $product_item_cart = CartController::getCartitem();
        // return view('front.product-order-screens.choose-location', compact('product_item_cart'));
    }

    public function addAddress() {
        $product_item_cart = CartController::getCartitem();
        return view('front.product-order-screens.add-location',compact('product_item_cart'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return User_AddressService::create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return User_AddressService::store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(user_address $user_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_address $user_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user_address $user_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_address $user_address)
    {
        //
    }
}
