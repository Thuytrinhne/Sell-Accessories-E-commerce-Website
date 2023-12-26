<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\CartController;
use App\Service\OrderService;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\PaymentController;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return OrderService::index($request);
    }

    public function indexFilter($id) {
        return OrderService::indexFilter($id);
    }

    public function DetailOrder($id) {
        return OrderService::DetailOrder($id);
    }

    public function indexCheckout() {
      
        return OrderService::indexCheckout();
    }

    public function ReCheckout($id) {
        return OrderService::ReCheckout($id);
    }

    public function checkoutSuccess($id) {
        return OrderService::checkoutSuccess($id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        if($request->input('method_payment') == "Thanh toán tiền mặt"){
            return OrderService::store($request);
        }
        else {
            return PaymentController::vnpay_payment($request);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
