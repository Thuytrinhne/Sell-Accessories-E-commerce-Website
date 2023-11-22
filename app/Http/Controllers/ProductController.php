<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->select(
            'product.name_product','product.id',
            'product_item.price', 'product_item.discount_price','product_item.image',
        )
        ->get();    
        // Pass the data to the view
        return view('homepage',compact('products'));
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
    public function show($id)
    {

        $products = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->join('variation','variation_option.id_Variation','=','variation.id')
        ->select(
            'product.name_product', 'product.id',
            'product_item.price', 'product_item.discount_price','product_item.SKU','product_item.image',
            'variation_option.value',
            'variation.name',
            'category.name_category',
        )
        ->where('product.id', '=', $id )
        ->first(); 


        return view('front.product-order-screens.detail-product',['product' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
