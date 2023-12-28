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
        $order->save();
        
        return $order->id;
    }
    
    

    public static function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
    }
}