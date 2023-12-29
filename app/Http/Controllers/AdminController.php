<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Service\AdminService ;
use  App\Models\order;

class AdminController extends Controller
{
    public function OrderView() {
       
        $order_list = $orders = order::select('order.*', 'user.full_name', 'user.email', 'user.phone')
        ->join('user', 'order.user_id', '=', 'user.id')
        ->paginate(8);
    
        return view('admin.order', compact('order_list'));
    }
    // public function OrderView1(Request $request)
    // {
    //     $filter_price = $request->input('price_filter');
    //     $startDate = $request->input('start-date');
    //     $endDate = $request->input('end-date');
    //     $status = $request->input('sortStatus');
    //     $order_list=null;
    //     if(!( $filter_price == 0 &&  $startDate  ==null && $endDate ==null &&  $status ==null)){
    //     $order_list = Order::query()
    //         ->join('user', 'order.user_id', '=', 'user.id')
    //         ->when($filter_price != 0, function ($query) use ($filter_price) {
    //             return $query->where('total_price', $filter_price);
    //         })
    //         ->when($status != null, function ($query) use ($status) {
    //             return $query->where('status', $status);
    //         })
    //         ->when(($startDate != null && $endDate != null), function ($query) use ($startDate, $endDate) {
    //             return $query->whereBetween('date_order', [$startDate, $endDate]);
    //         })
    //         ->select('order.*', 'user.full_name', 'user.email', 'user.phone')
    //         ->paginate(8);
    //     }
    //     return view('admin.order', compact('order_list'));
    // }
    // public function OrderView1(Request $request) {
    //     $filter_price = $request->input('price_filter');
    //     $startDate = $request->input('start-date');
    //     $endDate = $request->input('end-date');
    //     $status = $request->input('sortStatus');

    //     $priceCondition = ($filter_price != 0) ? "AND total_price = '$filter_price'" : "";
    //     $statusCondition = ($status != null) ? "AND status = '$status'" : "";
    //     $dayCondition = "";
    //     if ($startDate != null && $endDate != null) {
    //         $dayCondition = "AND date_order BETWEEN '$startDate' AND '$endDate'";
    //     }

    //     if(!( $filter_price == 0 &&  $startDate  ==null && $endDate ==null &&  $status ==null)){
    //     $order_list = DB::select("
    //         SELECT *
    //         FROM `order`, user
    //         WHERE
    //             `order`.user_id = user.id
    //              $priceCondition
    //              $statusCondition
    //              $dayCondition
    //     ");
    //     }
    //     $order_list = null;

    //     return view('admin.order', compact('order_list'));

    // }
    public function OrderView1(Request $request)
    {
        $filter_price = $request->input('price_filter');
        $startDate = $request->input('start-date');
        $endDate = $request->input('end-date');
        $status = $request->input('sortStatus');

        $orderQuery = Order::query()
            ->join('user', 'order.user_id', '=', 'user.id')
            ->when($filter_price != null, function ($query) use ($filter_price) {
                return $query->where('total_price', $filter_price);
            })
            ->when($status != null, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($startDate != null && $endDate != null, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('date_order', [$startDate, $endDate]);
            })
            ->select('order.*', 'user.full_name', 'user.email', 'user.phone');

        $order_list = null;

        if ($filter_price != null || ($startDate != null && $endDate != null) || $status != null) {
            $order_list = $orderQuery ->paginate(8);
        }

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
    public static function  login()
    {
        return AdminService::login();
    }
    public static function postLoginAdmin(Request $request)
    {
       return  AdminService::postLoginAdmin($request);
    
    }
}

    

