<?php

namespace App\Models\Respositories;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\CartController;
use DB;
use Carbon\Carbon;

class OrderRespository 
{
    public static function store(Request $request) {
        $order = new Order();
        $product_item_cart = CartController::getCartitem();
        $total_price=0;
        foreach($product_item_cart as $item) {
            $total_price += $item->price;
        }
        $order->total_price = $total_price;
        
        $currentDateTime = Carbon::now('Asia/Ho_Chi_Minh');
        $deliveryTime = $currentDateTime->addDays(7);
        $order->delivered_date = $deliveryTime;
        $order->status = 1;
        $order->shipping_cost = 35000;
        $order->user_id = 1;
        $order->date_order = $currentDateTime;
        $order->cart_id = $product_item_cart[0]->cart_id;
        $order->note = $request->input('order_note');

        switch($request->input('method_payment')) {
            case "Thanh toán tiền mặt":
                $order->payment_id = 1;
                break;
            case "Chuyển khoản ngân hàng":
                $order->payment_id = 2;
                break;
            
        }
        $order->save(); 

        return $order->id;
    }

   
}