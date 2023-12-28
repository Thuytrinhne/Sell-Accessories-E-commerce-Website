<?php

namespace App\Service;

use App\Models\order;
use Illuminate\Http\Request;
use App\Models\Respositories\OrderRespository;
use App\Http\Controllers\CartController;
use App\Http\Requests\OrderRequest;
use Auth;
use DB;
use App\Models\Respositories\CartRespository;
use  App\Models\Respositories\User_AddressRespository;

class OrderService {
    public static function index(Request $request)
    {
        $userId = Auth()->user()->id;
        $user_order = DB::select ("SELECT cart_item.quantity,product.name_product,product_item.price,cart_item.cart_id, `order`.id, payment.name_method, `order`.date_order,`order`.status,
                                        product_configuration.name_color,product_configuration.variation_value, product_configuration.variation_id 
                                    FROM
                                            `order`, cart_item, product_item, product,product_configuration, payment
                                    WHERE
                                            `order`.cart_id = cart_item.cart_id  
                                          
                                            and cart_item.product_item_id = product_item.id
                                            and product_item.product_id = product.id
                                            and `order`.user_id =$userId
                                            and `order`.payment_id = payment.id
                                            and product_configuration.product_item_id = product_item.id
                                        
                ");  
        
        // $user_order = order::with('cart', 'cart.cartItems', 'cart.cartItems.productItems','cart.cartItems.productItems.product')->get();
        $product_item_cart = CartController::getCartitem();
        return view('.front.customer.history-orders',compact('user_order', 'product_item_cart'));
    }

    public static function indexFilter($id)
    {

        $user_order = DB::select ("SELECT cart_item.quantity,product.name_product,product_item.price,cart_item.cart_id, `order`.id, payment.name_method, `order`.date_order,`order`.status,
        product_configuration.name_color,product_configuration.variation_value, product_configuration.variation_id 
    FROM
            `order`, cart_item, product_item, product,product_configuration, payment
    WHERE
            `order`.cart_id = cart_item.cart_id  
          
            and cart_item.product_item_id = product_item.id
            and product_item.product_id = product.id
            and `order`.user_id = 1
            and `order`.payment_id = payment.id
            and product_configuration.product_item_id = product_item.id
                                            and `order`.status = '$id'
                                        
                ");  
        
        // $user_order = order::with('cart', 'cart.cartItems', 'cart.cartItems.productItems','cart.cartItems.productItems.product')->get();
        $product_item_cart = CartController::getCartitem();
       
       
        return view('.front.customer.history-orders',compact( 'user_order', 'product_item_cart'));
    }

    public static function DetailOrder($id) {
        $id = $id;
        $product_item_cart = CartController::getCartitem();

        $user_order_infor = DB::select("
            SELECT distinct user.full_name, user.phone, detail_address, `order`.id, date_order
            FROM
                user_address, address, `order`,user
            WHERE
                user_address.address_id = address.id
                and `order`.id = '$id'
                and `order`.user_id = user.id
                and user_address.user_id = user.id
                
                
        ");
        
    

        $user_order = DB::select ("SELECT distinct cart_item.quantity,product.name_product,product_item.price, product.description
        
        FROM
                `order`, cart, cart_item, product_item, product, user
        WHERE
                `order`.cart_id = cart_item.cart_id
                and cart_item.product_item_id = product_item.id
                and product_item.product_id = product.id
                and `order`.user_id = user.id
                and `order`.id = '$id'
                ");  

            $total_price=0;
            foreach($user_order as $item) {
                $total_price += $item->price * $item->quantity;
            }
                    return view('front.customer.detail-order',compact('product_item_cart','user_order','total_price','user_order_infor'));
    }
    
    

    public static function indexCheckout() {
        // lấy địa chỉ mặc định 
        $defaultAddress = User_AddressRespository::getUserAddressDefault();
        
        $product_item_cart = CartController::getCartitem();
        //Lấy đặt hàng từ giỏ hàng ra checkout
       $total=0;
        foreach($product_item_cart as $item) {
            $total += $item->price * $item->quantity;   
        }
        
        return view('front.product-order-screens.checkout', compact('product_item_cart','total', 'defaultAddress'));
    }

    public static function ReCheckout($id) {
        $id = $id;
        $product_item_cart = DB::select("
        SELECT product.name_product,cart_item.quantity,product_item.price,cart_item.id,
        product_configuration.name_color,product_configuration.variation_value, product_configuration.variation_id 
                                    FROM cart_item, product_item, product, product_configuration
                                    WHERE
                                        cart_item.product_item_id = product_item.id
                                        and product_item.product_id = product.id
                                        and product_configuration.product_item_id = product_item.id
                                        and cart_item.cart_id = '$id'
        ");
        $total=0;
        foreach($product_item_cart as $item) {
            $total += $item->price * $item->quantity;   
        }
       
        return view('front.product-order-screens.checkout', compact('product_item_cart','total'));
    }

    public static function checkoutSuccess($id) {
        
    
        $user_infor = DB::select("
            SELECT user.full_name, user.phone, `order`.id, `order`.delivered_date
            FROM user,`order`
            WHERE
                user.id = `order`.user_id
                and `order`.id = '$id'
        ");


        return view('front.product-order-screens.checkout-success', compact('user_infor'));
    }

    public static  function store(Request $request)
    {
      
        $getIdOrder = OrderRespository::store($request);
        // sau khi tạo order xong thì cart đó hết giá trị
        //=> tạo cart mới cho người dùng 
        CartRespository::store();


        return redirect() -> route('front.checkout-success', ['id' => $getIdOrder]);
    }
    
    public static function destroy($id)
    {
        try
        {
            OrderRespository::destroy($id);
        }catch (\Exception  $exception) {
            return back()->withError('Category có ID = ' . $id . ' đã thuộc về 1 danh mục khác')->withInput();
        };
        
        return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }
}