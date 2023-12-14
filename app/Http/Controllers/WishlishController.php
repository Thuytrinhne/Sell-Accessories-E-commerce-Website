<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\wishlist_item;
use Illuminate\Http\Request;
use App\Service\AccountService;



class WishlishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = AccountService::product();
        $wishlists = wishlist_item::all();
        return view("front.product-order-screens.wishlist", compact("wishlists", "product"));
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
        
    }

    /**
     * Display the specified resource.
     */
    // public function show(wishlist $wishlist)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(wishlist $wishlist)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, wishlist $wishlist)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $wishlist_id, string $id)
    {
        $product = product::find($id);
        $wishlists_id = wishlist_item::find($wishlist_id);
        $wishlists_id -> delete();
        return redirect()->route('front.product-order-screens.wishlist')-> compact('') -> with('thongbao','Xoá thông tin thành công');
    }
}
