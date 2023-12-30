<?php

namespace App\Http\Controllers;

use App\Service\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ItemRequest;
use App\Models\product;
use App\Models\category;
use App\Models\product_item;
use App\Models\variation_option;
use App\Models\variation;   
use App\Models\product_images;   
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ItemUpdateRequest;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ProductService::index();
    }


    public function filter(Request $request)
    {
        return ProductService::filter($request);
    }

    public function getModalProduct($product)
    {
        return ProductService::getModalProduct($product);
    }

    public function getProductsByValue(Request $request)
    {
        return ProductService::getProductsByValue($request);
    }

    public function getImagesByValue($value)
    {
        return ProductService::getImagesByValue($value);
    }

    // public function reportProductByDate(Request $request)
    // {
    //     return ProductService::reportProductByDate($request);
    // }

    public function filterReport(Request $request)
    {
        return ProductService::filterReport($request);
    }
    
    public function descProductsByPrice()
    {
        return ProductService::descProductsByPrice();
    }

    public function ascProductsByPrice()
    {
        return ProductService::ascProductsByPrice();
    }

    public function latestProductsByPrice()
    {
        return ProductService::latestProductsByPrice();
    }

    public function search(Request $request)
    {
        return ProductService::search($request);
    }

    public function searchProduct(Request $request)
    {
        return ProductService::searchProduct($request);
    }

    public function report(Request $request)
    {
        return ProductService::report($request);
    }

    public function create()
    {

    }


    public function store(ProductRequest $request)
    {
        return ProductService::store($request);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ProductService::show($id);
    }

    public function edit($id)
    {
        return ProductService::edit($id);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        return ProductService::update($request,$id);

    }

    public function destroy($id)
    {
        return ProductService::destroy($id);
    }
    

    public function getProduct()
    {
        return ProductService::getProduct();
    }

    public function getProductsByCategory($category)
    {
        return ProductService::getProductsByCategory($category);
    }


    //
    // Các hàm xử lí cho product_item
    //
    public function indexItem($product) 
    {
        return ProductService::indexItem($product);
    }

    public function createItem($product)
    {
        return ProductService::createItem($product);
    }

    public function storeItem(ItemRequest $request,$product)
    {
        return ProductService::storeItem($request,$product);
    }

    public function editItem($itemID)
    {

        return ProductService::editItem($itemID);
    }

    public function updateItem(ItemUpdateRequest $request, $item) 
    {

        return ProductService::updateItem($request,$item);
    }

    public function destroyItem($item)
    {
        return ProductService::destroyItem($item);
    }
    

   



    //
    // Các hàm xử lí cho product_item
    //
   

   
   


   

   

}
