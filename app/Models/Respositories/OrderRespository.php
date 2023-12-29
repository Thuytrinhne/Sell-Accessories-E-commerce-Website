<?php

namespace App\Models\Respositories;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\CartController;
use DB;
use Carbon\Carbon;
use Auth;
class OrderRespository 
{
    public static function store(Request $request) {
        $order = new Order();
        $data = $request->all();
        $order->total_price = $data['total_price'];
        
        $currentDateTime = Carbon::now('Asia/Ho_Chi_Minh');
        $deliveryTime = $currentDateTime->addDays(7);
        $order->delivered_date = $deliveryTime;
        $order->status = 1;
        $order->shipping_cost = 35000;
        $order->user_id = Auth()->user()->id;
        // $order->date_order = $currentDateTime;
        $order->cart_id = $data['idCart'];
        $order->note = $request->input('order_note');
        $order->payment_id = 1;  
        $order->address_shipping_id= $request->input('idUserAddress');               
        $order->save();
        
        return $order->id;
    }
    
    

    public static function destroy($id)
    {
        $order = order::find($id);
        $order->status = 4;
        $order->save();
    }
    public static function countOrderOfUser()
    {
       
        return order::select('id')->where('user_id',  Auth()->user()->id)
        ->orderByDesc('created_at')
        ->get();

    }
    public static function countOrderOfUserByStatus($id)
    {
       
        return order::select('id')->where('user_id',  Auth()->user()->id)
        ->where('status' ,'=', $id)
        ->orderByDesc('created_at')
        ->get();

    }
    public static function getInforOrderById($id)
    {
        return DB::select ("SELECT product_item.image,cart_item.quantity,product.name_product,product_item.price,cart_item.cart_id, `order`.id, payment.name_method, `order`.date_order,`order`.status,
                                        product_configuration.name_color,product_configuration.variation_value, product_configuration.variation_id 
                                    FROM
                                            `order`, cart_item, product_item, product,product_configuration, payment
                                    WHERE
                                            `order`.cart_id = cart_item.cart_id  
                                          
                                            and cart_item.product_item_id = product_item.id
                                            and product_item.product_id = product.id
                                            and `order`.id =$id
                                            and `order`.payment_id = payment.id
                                            and product_configuration.product_item_id = product_item.id
                                        
                ");  

    }
    public static function updateStatus($idOrder, $status)
    {
        $order = order::find($idOrder);
        $order->status = $status;
        $order->save();
    }
   
}