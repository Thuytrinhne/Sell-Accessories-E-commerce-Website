<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomepageController extends Controller
{
    public function index() {
        $product_item_cart = CartController::getCartitem();
        //Lấy thông tin sản phẩm từ giỏ hàng
        

        return view('homepage', compact('product_item_cart'));
    }
}
