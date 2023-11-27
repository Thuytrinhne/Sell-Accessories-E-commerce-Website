<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use DB;

class CheckoutController extends Controller
{
    public function index() {
        $product_item_cart = CartController::getCartitem();
        //Lấy đặt hàng từ giỏ hàng ra checkout


        return view('front.product-order-screens.checkout', compact('product_item_cart'));
    }
}
