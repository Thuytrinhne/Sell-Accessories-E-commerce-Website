<?php

namespace App\Service;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ItemRequest;
use App\Models\product;
use App\Models\category;
use App\Models\product_item;
use App\Models\product_configuration;
use App\Models\variation;
use App\Models\order; 
use App\Models\cart_item; 
use App\Models\cart; 
use DB;

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
            ->paginate(10);
             $variation = variation::with('product_configurations')->get();
        
            $category = "Lọc theo giá ";

        return view('front.product-order-screens.filter', compact('products','variation','category'));
    }

    public static function create()
    {

    }


    public static function store(ProductRequest $request)
    {
        
            $image = time() . '.' . $request->default_image->extension();
            $request->default_image->move(public_path('Product_images'), $image);
            $imageName = 'http://127.0.0.1:8000/Product_images/'.$image;


        

        $product = new product;
        
        $product->name_product = $request->input('name_product');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->default_image = $imageName;

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
        ->join('variation','variation.id','=','product_configuration.variation_id')
        ->select( 
           
            'product.name_product', 'product.id', 'product.default_image','product.description',
            'product_item.price', 'product_item.discount_price','product_item.SKU',
            'product_configuration.variation_value',
            'variation.name',
            'category.name_category',
        )
        ->where('product.id', '=', $id )
        ->first();
        
        $variation_value = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation','product_configuration.variation_id','=','variation.id')
        ->select( 
            'product_configuration.variation_value',
            'product_item.id',
        )
        ->where('product.id', '=', $id )
        ->get();

        $category = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->select( 
            'category.id','category.name_category'
        )
        ->where('product.id', '=', $id )
        ->first();

        $relatedProduct = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->select( 
            'product.name_product', 'product.id', 'product.default_image','product_item.discount_price',
        )
        ->where('product.category_id', '=', $category->id )
        ->take(5)
        ->get();

        return view('front.product-order-screens.detail-product',['product' => $products,'category' => $products],compact('variation_value','relatedProduct'));
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
        // Lấy 10 sản phẩm mới tạo gần đấy nhất hiện thị trong sản phẩm mới
        $products= product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->orderBy('product.created_at','desc')
        ->select(
            'product.name_product','product.id', 'product.default_image',
            'product_item.price', 'product_item.discount_price',
        )
        ->take(32)
        ->get();   

        $categories = category::get();

        return view('homepage',compact('products','categories'));
    }


    public static function getProductsByCategory($category)
    {
       
        
        $products = Product::join('category', 'category.id', '=', 'product.category_id')
            ->join('product_item', 'product.id', '=', 'product_item.product_id')
            ->where('category.id', '=', $category)
            ->paginate(10);

        if ($products->isEmpty()) {
            return response()->view('front.product-order-screens.not-found', [], 404);
        }

        $variation = Variation::with('product_configurations')->get();

        $category = Category::where('id', '=', $category)->first();
        $category_id = $category->id;
        $category = $category->name_category;
        


        return view('front.product-order-screens.filter', compact('products', 'variation','category','category_id'));
    }


    public static function getProductsByValue(Request $request)
    {   
        $products = Product::join('product_item', 'product.id', '=', 'product_item.product_id')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
            ->join('variation', 'product_configuration.variation_id', '=', 'variation.id')
            ->select(
                'product.name_product', 'product.id',
                'product_item.price', 'product_item.discount_price', 'product_item.SKU',
                'product.default_image',
                'variation.name as variation_name',
                'category.name_category',
            );

        //Kiểm tra xem có lọc theo danh mục 
        if($request->category){
            $products = $products
            ->where('category.id','=',$request->category);
        }else{
            $products = $products;
        }

        //Kiểm tra có lọc giá không
        if($request->minPrice || $request->maxPrice){
            $minPrice =$request->minPrice;
            $maxPrice = $request->maxPrice;
            
            $products = $products
            ->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            });
        }

        //Kiểm tra có filter theo variation
        if ($request->variation != null) {
            $products = $products->where('product_configuration.variation_value', '=', $request->variation);
        }

        //Kiểm tra có sortBy
        switch ($request->orderby) {
            case 'asc':
                $products = $products->orderBy('product_item.price', 'asc');
                break;

            case 'desc':
                $products = $products->orderBy('product_item.price', 'desc');
                break;

            case 'latest':
                $products = $products->orderBy('product.created_at', 'desc');
                break;

            default:
                $products = $products->orderBy('product.created_at', 'asc');
                break;
        }

        $products = $products->paginate(10);

        return $products;
    }

    // public static function reportProductByDate(Request $request)
    // {   
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     $products = Product::whereBetween('created_at', [$startDate, $endDate])
    //         ->orWhereBetween('updated_at', [$startDate, $endDate])
    //         ->get();
        
        

    //     return $products;   
    // }

    public static function filterReport(Request $request)
    {
      
        $display = 1;
      
        $startDate = $request->input('start_date')." 00:00:00";
        $endDate = $request->input('end_date')." 23:59:59";
      
        $category = $request->input('name_category');
        if(!$category)
        {   
            $categories = category::get();
           // use store procdedure
           
            


            return(view('admin.report',[$display],compact('products','categories','display'))->with('product_report',1));
        }
        dd("hi");
        $products = Product::leftJoin('category', 'category.id', '=', 'product.category_id')
        ->where(function ($query) use ($startDate, $endDate, $category) {
            $query->whereBetween('product.created_at', [$startDate, $endDate])
                ->orWhereBetween('product.updated_at', [$startDate, $endDate]);
        })
        ->where('product.category_id', '=', $category)
        ->paginate(10);

        if($products->isEmpty())
        {
            return redirect()->back()->with('Notfound', 'Không có sản phẩm nào phù hợp!!!');
        }

        return(view('admin.report',compact('products','categories','display'))->with('product_report',1));
    }

    // public static function reportProductByDate(Request $request)
    // {   
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     $products = Product::whereBetween('created_at', [$startDate, $endDate])
    //         ->orWhereBetween('updated_at', [$startDate, $endDate])
    //         ->get();
        
        

    //     return $products;   
    // }

    // public static function filterReport(Request $request)
    // {
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     $categories = category::get();
    //     $category = $request->input('name_category');

    //     if(!$category)
    //     {   
    //         $categories = category::get();

    //         $products = Product::join('category','category.id','=','product.category_id')->whereBetween('product.created_at', [$startDate, $endDate])
    //         ->orWhereBetween('product.updated_at', [$startDate, $endDate])
    //         ->paginate(10);

    //         return(view('admin.report',compact('products','categories')));
    //     }

    //     $products = Product::leftJoin('category', 'category.id', '=', 'product.category_id')
    //     ->where(function ($query) use ($startDate, $endDate, $category) {
    //         $query->whereBetween('product.created_at', [$startDate, $endDate])
    //             ->orWhereBetween('product.updated_at', [$startDate, $endDate]);
    //     })
    //     ->where('product.category_id', '=', $category)
    //     ->paginate(10);

    //     if($products->isEmpty())
    //     {
    //         return redirect()->back()->with('Notfound', 'Không có sản phẩm nào phù hợp!!!');
    //     }
        
    //     return(view('admin.report',compact('products','categories')));
    // }

    public static function getModalProduct($product)
    {

        $products = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation','variation.id','=','product_configuration.variation_id')
        ->select( 
            'product.name_product', 'product.id', 'product.default_image',
            'product_item.price', 'product_item.discount_price','product_item.SKU',
            'product_configuration.variation_value',
            'variation.name',
            'category.name_category',
        )
        ->where('product.id', '=', $product )
        ->first();
        

        $variation_value = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation','product_configuration.variation_id','=','variation.id')
        ->select( 
            'product_configuration.variation_value',
            'product_item.id',
            'variation.name',
        )
        ->where('product.id', '=', $product )
        ->get();

        return response()->json([$products,$variation_value]);
    }

    public static function getImagesByValue($value)
    {
        $products = product::join('product_item', 'product.id', '=', 'product_item.product_id')
        ->join('category','product.category_id','=','category.id')
        ->join('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->join('variation','product_configuration.variation_id','=','variation.id')
        ->select(
            'product_item.id',
            'product.name_product', 
            'product_item.price', 'product_item.discount_price','product_item.SKU','product_item.image',
            'product_configuration.variation_value',
            'variation.name',
            'category.name_category',
        )
        ->where('product_item.id', '=', $value )->get();
       
        return $products;
    }

    public static function searchProduct(Request $request)
    {
        $search = $request->input('searchProduct');

        $products = product_item::join('product', 'product.id', '=', 'product_item.product_id')
        ->where('name_product','like','%'. $search . '%')->paginate(10);

        $variation = variation::with('product_configurations')->get();

        if($products->isEmpty())
        {
            return view('front.product-order-screens.not-found', compact('products','variation','search' ));
        }

        return view('front.product-order-screens.search', compact('products','variation', 'search'));    
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
        $display = 0;
        $categories = category::get();
        $category = $request->input('name_category');

        $products = product::leftjoin('product_item','product.id','=','product_item.product_id')
        ->leftjoin('category','category.id','=','product.category_id')
        ->leftjoin('cart_item','product_item.id','=','cart_item.product_item_id')
        ->leftjoin('cart','cart.id','=','cart_item.cart_id')
        ->leftjoin('order','order.cart_id','=','cart.id')
        ->select('category.name_category',
                 'product.*')
        ->distinct()
        ->paginate(10);

        return(view('admin.report',compact('products','categories','display')));
    }

    // Xử lí item_product
    public static function indexItem($product) 
    {
        $items = product_item::join('product', 'product.id', '=', 'product_item.product_id')
        ->leftjoin('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->leftjoin('variation','product_configuration.variation_id','=','variation.id')
        ->where('product_item.product_id','=',$product)
        ->select('product_item.id','product_item.price','product_item.discount_price','product_item.quantity','product_item.SKU','variation.name',
                'product_configuration.variation_value')
        ->get();

        return(view('admin.add-item', compact('items','product')));
    }

    public static function createItem($product)
    {
        return(view('admin.create-product-item',compact('product')));
    }

    public static function storeItem(ItemRequest $request,$product)
    {   

        if($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Product_item_images'), $imageName);
        }

       
        $productI = new product_item();
        $variation = new variation();
        
        
        $variation->name =$request->input('name');
        $productI->image = $imageName;
        $productI->price = $request->input('price');
        $productI->quantity = $request->input('quantity');
        $productI->product_id = $product;
        $productI->SKU = $request->input('SKU');
        $productI->discount_price = $request->input('discount_price');

        // Lưu dữ liệu vào bảng product_item; variation
        $productI->save();
        $variation->save();
        
        // Create a new ProductConfiguration and associate it with Variation and ProductItem
        $product_configuration = new product_configuration();
        $product_configuration->variation_value = $request->input('value');
        // Associate with Variation (n-1 relationship)
        $product_configuration->variation()->associate($variation);
        // Associate with ProductItem (1-1 relationship)
        $product_configuration->productItem()->associate($productI);
        $product_configuration->save();

        
        return redirect('admin/product')->with('success','Thêm thành công');
    }

    public static function editItem($itemID)
    {
        $item = product_item::leftjoin('product_configuration', 'product_item.id', '=', 'product_configuration.product_item_id')
        ->leftjoin('variation','product_configuration.variation_id','=','variation.id')
        ->where('product_item.id','=',$itemID)
        ->get();

        $variation = variation::with('product_configurations')->get();

        return view('admin.edit-item-product',compact('item','itemID','variation'));
    }

    public static function updateItem(Request $request, $item) 
    {
        
        if($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Assets/Images'), $imageName);
        }

        $items = product_item::find($item);

        $product_configuration = product_configuration::where('product_configuration.id','=',$item)
        ->first();
    
        $items->price = $request->input('price');
        $items->quantity = $request->input('quantity');
        $items->SKU = $request->input('SKU');
        $items->discount_price = $request->input('discount_price');
        $items->image = $imageName;

        $product_configuration->variation_value = $request->input('variation_value');

        // Lưu dữ liệu vào bảng products
        $items->save();
        $product_configuration->save();
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
