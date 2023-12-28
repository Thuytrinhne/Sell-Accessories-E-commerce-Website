<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Respositories\CartRespository;
use Auth;
class PaymentController extends Controller
{
    public static function vnpay_payment(Request $request) {
        $data = $request->all();
        $order = new Order();
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
        $order->payment_id = 2;     
        $order->address_shipping_id= $request->input('idUserAddress');               
            
        $order->save(); 
        // tạo order xong thì tạo cart mới 
        CartRespository::store();
        // thanh toán VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/checkout-success/".$order->id;
        $vnp_TmnCode = "1VONXYET";//Mã website tại VNPAY 
        $vnp_HashSecret = "LSEXPOKTASYMIDNFZXJDCDTOMHAJQMPC"; //Chuỗi bí mật
        $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn";
        $vnp_OrderType = "Hippo Shop";
        $vnp_Amount = $data['total_price'] * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


//Add Params of 2.0.1 Version

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,

);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
	// vui lòng tham khảo thêm tại code demo
    }
}
