<?php

namespace App\Http\Controllers;


use App\Models\user_address;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Service\User_AddressService;
use App\Http\Requests\User_AddressRequest;

class User_AddressController extends Controller
{
    // display page choose-address when check out 
    public function changeCheckoutAddress($id)
    {
        return User_AddressService::changeCheckoutAddress($id);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User_AddressService::index();
       
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
    public function store(User_AddressRequest $request)
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
    public function edit($id)
    {
        return User_AddressService::edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User_AddressRequest $request)
    {
        return User_AddressService::update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        return User_AddressService::destroy($id);

    }
    public function addCheckoutAddress()
    {
        return User_AddressService::addCheckoutAddress();
    }
}
