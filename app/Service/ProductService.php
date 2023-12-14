<?php

namespace App\Service;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ItemRequest;
use App\Models\product;
use App\Models\category;
use App\Models\product_item;
use App\Models\variation_option;
use App\Models\variation;
use App\Models\order; 
use App\Models\cart_item; 
use App\Models\cart; 


use Illuminate\Http\Request;

class ProductService
{
    public static function index()
    {
        $category = category::get();
        $products = product::paginate(10);
        
        return(view('admin.product',compact('products','category')));
    }


    public static function filter(Request $request)
    {
        // Lọc theo giá nếu giá được chỉ định trong request
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = product_item::join('product', 'product.id', '=', 'product_item.product_id')->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->get();
            $variation = variation::with('varitationOptions')->get();

        return view('front.product-order-screens.filter', compact('products','variation'));
    }

    public static function create()
    {

    }


    public static function store(ProductRequest $request)
    {
        $product = new product;
        
        $product->name_product = $request->input('name_product');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');

        $product->save();
        
        return redirect()->back()->with('success', 'Thêm thành công');
    }
    /**
     * Display the specified resource.
     */
    public static function show($id)
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
        

        $variation_value = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->join('variation','variation_option.variation_id','=','variation.id')
        ->select( 
            'variation_option.value',
            'product_item.id'
        )
        ->where('product.id', '=', $id )
        ->get();
        return view('front.product-order-screens.detail-product',['product' => $products],compact('variation_value'));
    }

    public static function edit($id)
    {
        $category = category::get();
        $products = product::where('product.id','=',$id)->get();
        return(view('admin.edit-product',compact('products','category','id')));
    }


    public static function update(Request $request, $id)
    {
        $product =product::find($id);

        $product->name_product = $request->input('name_product');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');

        $product->save();
    
        return redirect('admin/product')->with('success','Sửa danh mục thành công');

    }

    public static function destroy($id)
    {
        try
        {
            $product= product::find($id);
            $product->delete();

        }catch (\Exception  $exception) {
            return back()->withError('Sản phẩm có ID = ' . $id . ' đã thuộc về 1 sản phẩm chi tiết')->withInput();
        };
        
        return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }
    

    public static function getProduct()
    {
        $products= product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->select(
            'product.name_product','product.id',
            'product_item.price', 'product_item.discount_price','product_item.image',
        )
        ->get();    

        return view('homepage',compact('products'));
    }

    public static function getProductsByValue($value)
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
        ->where('variation_option.value', '=', $value )->get();

        return $products;
    }

    public static function getImagesByValue($value)
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
        ->where('product_item.id', '=', $value )->get();

        return $products;
    }


    public static function descProductsByPrice()
    {
       
        $products = product_item::join('product', 'product.id', '=', 'product_item.product_id')->orderBy('price', 'desc')->get();

        $variation = variation::with('varitationOptions')->get();

        return view('front.product-order-screens.filter', compact('products','variation'));
        
    }

    public static function ascProductsByPrice()
    {
       
        $products = product_item::join('product', 'product.id', '=', 'product_item.product_id')->orderBy('price', 'asc')->get();

        $variation = variation::with('varitationOptions')->get();

        return view('front.product-order-screens.filter', compact('products','variation'));
        
    }

    public static function latestProductsByPrice()
    {       
        $products = product_item::join('product', 'product.id', '=', 'product_item.product_id')->orderBy('product.created_at', 'asc')->get();

        $variation = variation::with('varitationOptions')->get();

        return view('front.product-order-screens.filter', compact('products','variation'));      
    }

    public static function search(Request $request)
    {
        $search = $request->input('search');

        $category = category::get();
        $products = product::where('name_product','like','%'. $search . '%')->paginate(10);

        return(view('admin.product',compact('products','category')));
    }

    public static function report(Request $request)
    {
        $categories = category::get();
        $category = $request->input('name_category');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $products = product::leftjoin('product_item','product.id','=','product_item.product_id')
        ->leftjoin('category','category.id','=','product.category_id')
        ->leftjoin('cart_item','product_item.id','=','cart_item.product_item_id')
        ->leftjoin('cart','cart.id','=','cart_item.cart_id')
        ->leftjoin('order','order.cart_id','=','cart.id')
        ->select('category.name_category',
                 'product.*')
        ->distinct()
        ->paginate(10);

        return(view('admin.report',compact('products','categories')));
    }

    // Xử lí item_product
    public static function indexItem($product) 
    {
        $items = product_item::join('product', 'product.id', '=', 'product_item.product_id')
        ->leftjoin('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->leftjoin('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->leftjoin('variation','variation_option.variation_id','=','variation.id')
        ->where('product_item.product_id','=',$product)
        ->select('product_item.id','product_item.price','product_item.discount_price','product_item.quantity','product_item.SKU','variation.name','variation_option.value')
        ->get();


        return(view('admin.add-item', compact('items','product')));
    }

    public static function createItem($product)
    {
        return(view('admin.create-product-item',compact('product')));
    }

    public static function storeItem(ItemRequest $request,$product)
    {
        $productI = new product_item();
        $variation = new variation();
        $variation_option = new variation_option();
        
        $variation_option->value = $request->input('value');
        $variation->name =$request->input('name');
        $productI->price = $request->input('price');
        $productI->quantity = $request->input('quantity');
        $productI->product_id = $product;
        $productI->SKU = $request->input('SKU');
        $productI->discount_price = $request->input('discount_price');

        // Lưu dữ liệu vào bảng products
        $productI->save();
        $variation->save();
        $variation_option->save();
        
        return redirect('admin/product')->with('success','Thêm thành công');
    }

    public static function editItem($itemID)
    {

        $item = product_item::leftjoin('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->leftjoin('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->leftjoin('variation','variation_option.variation_id','=','variation.id')
        ->where('product_item.id','=',$itemID)
        ->get();

        return view('admin.edit-item-product',compact('item','itemID'));
    }

    public static function updateItem(Request $request, $item) 
    {

        $items = product_item::join('product', 'product.id', '=', 'product_item.product_id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation_option', 'product_configuration.variation_option_id', '=', 'variation_option.id')
        ->join('variation','variation_option.variation_id','=','variation.id')
        ->find($item);

        $items->name = $request->input('name');
        $items->value = $request-input('value');
        $items->price = $request->input('price');
        $items->quantity = $request->input('quantity');
        $items->SKU = $request->input('SKU');
        $items->discount_price = $request->input('discount_price');

        // Lưu dữ liệu vào bảng products
        $items->save();

        return redirect('admin/product')->with('success','Sửa thành công');
    }

    public static function destroyItem($item)
    {
        try
        {
            $item = product_item::find($item); 
            $item->delete();
        }catch (\Exception  $exception) {
            return back()->withError('Sản phẩm chi tiết có ID = ' . $item->id . ' đã thuộc về 1 bảng khác!')->withInput();
        };
        
        return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }

}
