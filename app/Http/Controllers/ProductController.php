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


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::get();
        $products = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->join('variation','variation_option.variation_id','=','variation.id')
        ->select(
            'product.name_product', 'product.id',
            'product_item.price', 'product_item.discount_price','product_item.SKU','product_item.image',
            'variation_option.value',
            'variation.name',
            'category.name_category',
        )
        ->get();
        
        // dd($products);
        return(view('admin.product',compact('products','category')));
    }

    // public function indexItem($product) 
    // {
    //     $items = product_item::join('product', 'product.id', '=', 'product_item.product_id')
    //     ->where('product.id','=',$product)
    //     ->get();

    //     return(view('admin.add-item', compact('items','product')));
    // }

    public function filter(Request $request)
    {

        // Lọc theo giá nếu giá được chỉ định trong request
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = product_item::when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->get();

        // $variation = variation_option::join('variation', 'variation.id', '=', 'variation_option.id_Variation')
        //     ->select('variation_option.value')
        //     ->get();
            
            $variation = variation::with('varitationOptions')->get();

        return view('front.product-order-screens.filter', compact('products','variation'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

  

    // public function storeItem(Request $request,$product)
    // {
    //     $productI = new product_item();
        
    //     $productI->price = $request->input('price');
    //     $productI->quantity = $request->input('quantity');
    //     $productI->product_id = $product;
    //     $productI->SKU = $request->input('SKU');
    //     $productI->discount_price = $request->input('discount_price');

    //     // Lưu dữ liệu vào bảng products
    //     $productI->save();
        
    //     return redirect('admin/product')->with('addsuccess','Thêm thành công');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = new product;
        
        $product->name_product = $request->input('name_product');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');

        $product->save();

        // dd($request);
        
        return redirect()->back()->with('addsuccess');
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
        ->join('variation','variation_option.variation_id','=','variation.id')
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

    // public function editItem($product,$item)
    // {
        
    //     $item = product_item::where('product_item.product_id', '=', $product)->get();
      
    //     return view('admin.edit-item-product',compact('product'))->with(['product' => $product, 'item' => $item]);;
    // }


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
    public function destroy($id)
    {
        try
        {
            $product= product::find($id);
            $product->delete();

        }catch (\Exception  $exception) {
            return back()->withError('Có lỗi xảy ra. Thử lại')->withInput();
        };
        
        return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }
    

    public function getProduct()
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
    // Các hàm xử lí cho product_item
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

    public function updateItem(Request $request, $item) 
    {

        return ProductService::updateItem($request,$item);
    }

    public function destroyItem($item)
    {
        return ProductService::destroyItem($item);
    }

}
