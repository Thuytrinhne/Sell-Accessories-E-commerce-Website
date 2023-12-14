<?php

namespace App\Models\Respositories;

use App\Models\product;
use App\Models\product_item;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\WishlistRequest;

class CategoryRespository 
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
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
        
    }
}
