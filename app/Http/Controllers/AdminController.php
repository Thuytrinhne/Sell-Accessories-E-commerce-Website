<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function OrderView() {
        $order_list = DB::select("
            SELECT *
            FROM `order`, user
            WHERE
                `order`.user_id = user.id
        ");

        return view('admin.order', compact('order_list'));
    }

    public function OrderView1(Request $request) {
        $filter_price = $request->input('price_filter');
        $order_list = DB::select("
            SELECT *
            FROM `order`, user
            WHERE
                `order`.user_id = user.id
                and total_price = '$filter_price'
        ");

        return view('admin.order', compact('order_list'));
    }
    public function DashboardView() {
        $report_today_price = DB::select("
            SELECT total_price
            FROM `order`
        ");
        $report_today_order = DB::select("
            SELECT *
            FROM `order`
        ");
        $report_today_onship = DB::select("
            SELECT status
            FROM `order`
            WHERE
                status = 3 
        ");
        $report_today_done = DB::select("
            SELECT status
            FROM `order`
            WHERE
                status = 4
        ");
        $count_ship = 0;
        foreach($report_today_onship as $item) {
            $count_ship += 1;
        }
        $count_report_done = 0;
        foreach($report_today_done as $item) {
            $count_report_done += 1;
        }
        $sum_total_price_today = 0;
        foreach($report_today_price as $item ) {
            $sum_total_price_today += $item->total_price;
        }
        $count_order = 0;
        foreach($report_today_order as $item) {
            $count_order++;
        }
        // dd($report_today_onship);
        
        //CURRENT_DATE() =  DATE(date_order) ['count' => $count[0]->count]

        return view('admin.dashboard', compact('sum_total_price_today','count_ship','count_report_done', 'count_order'));
    }

    public function ProductView() {
        $product_list = DB::select("
            SELECT *
            FROM product, product_item
            WHERE
                product_item.product_id = product.id

        ");

        return view('admin.product', compact('product_list'));
    }
}

    
