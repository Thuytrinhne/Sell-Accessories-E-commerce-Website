<?php

namespace App\Http\Controllers;

use App\Models\product_item;
use App\Models\cart;
use App\Models\cart_item;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Respositories\CartRespository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function getCartitemJSon() {
    
            // trinh get card id mới nhất
            $id = cart::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->first()
            ->id;
          
            // code Phong 
            $product_item_cart = DB::select("SELECT product.name_product,cart_item.quantity,product_item.price,cart_item.id, product_item.image
            FROM cart_item, product_item, product
            WHERE
                cart_item.product_item_id = product_item.id
                and product_item.product_id = product.id
                and cart_item.cart_id = '$id'
            
                            ");
                            
            return response()->json($product_item_cart, 200);

    }
    public static function getCartitem() {
      
          // trinh get card id mới nhất
          $id = cart::where('user_id', Auth::user()->id)
          ->orderBy('created_at', 'desc')
          ->first()
          ->id;
        $product_item = DB::select("SELECT product.name_product,cart_item.quantity,product_item.price,cart_item.id,cart_item.cart_id,
        product_configuration.name_color,product_configuration.variation_value, product_configuration.variation_id
                                    FROM cart_item, product_item, product,product_configuration
                                    WHERE
                                        cart_item.product_item_id = product_item.id
                                        and product_item.product_id = product.id
                                        and product_configuration.product_item_id = product_item.id
                                        and cart_item.cart_id = '$id'
                                    
            ");
            
        return $product_item;

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

    public function store(Request $request,$item)
    {
        
        //Lấy ra cart mới nhất;
        $cart = cart::where('user_id', '=', Auth()->user()->id)->latest('created_at')->select('cart.id')->first();
        if ($cart== null) // nếu chưa có cart (user mới)
        {
            $cart = CartRespository::store();

        }
        $product_item = product_item::find($item);
       
        $item_in_cart = cart_item::with('cart')->where('cart_item.product_item_id','=',$item)->where('cart_item.cart_id', '=',$cart->id )
        ->latest('created_at')->first();
        
        // Nếu đã có tăng số lượng
        if($item_in_cart)
        {
            $item_in_cart->quantity += $request->quantity;
            $item_in_cart->save();
        } else // Nếu không thêm mới
        {
            $cartItem = new cart_item;
            $cartItem->quantity = $request->quantity;
            $cartItem->product_item_id = $item;
            if( $product_item->discount_price != null)
            $cartItem->price = $product_item->price;
            else
            $cartItem->price = $product_item->price;

            $cartItem->total_money = $cartItem->quantity * $cartItem->price;
            $cartItem->cart_id =  $cart->id;
            $cartItem->save(); 
        }
        
        return response()->json($item_in_cart);
    }
    public static function storeNotAjax(Request $request)
    {
       
         //Lấy ra cart mới nhất;
         $cart = cart::where('user_id', '=', Auth()->user()->id)->latest('created_at')->select('cart.id')->first();
         if ($cart== null) // nếu chưa có cart (user mới)
         {
             $cart = CartRespository::store();
 
         }
         $product_item = product_item::find($request->product_item_id);
        
         $item_in_cart = cart_item::with('cart')->where('cart_item.product_item_id','=',$request->product_item_id)->where('cart_item.cart_id', '=',$cart->id )
         ->latest('created_at')->first();
         
         // Nếu đã có tăng số lượng
         if($item_in_cart)
         {
             $item_in_cart->quantity += 1;
             $item_in_cart->save();
         } else // Nếu không thêm mới
         {
             $cartItem = new cart_item;
             $cartItem->quantity = 1;
             $cartItem->product_item_id = $item;
             if( $product_item->discount_price != null)
             $cartItem->price = $product_item->discount_price;
             else
             $cartItem->price = $product_item->price;
 
             $cartItem->total_money = $cartItem->quantity * $cartItem->price;
             $cartItem->cart_id =  $cart->id;
             $cartItem->save(); 
         }
         return redirect()->back();


    }
    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyItem($id)
    {   
        $item = cart_item::find($id);
        $item->delete();

        return redirect()->back();
    }
}
