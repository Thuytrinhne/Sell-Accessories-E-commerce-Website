<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('Assets/css/front/checkout-success.css')}}">

</head>

<body>
    <div class="header">
        <div class="col logo">
            <img src="https://mossvn.com/images/logo-moss-remake1.png" alt="logo">
        </div>
        <div class="col process">
            <ol class="user-process">
                <li>Đăng nhập</li>
                <li>Thông tin nhận hàng</li>
                <li>Hình thức vận chuyển</li>
                <li>Thanh toán</li>
            </ol>
        </div>
    </div>
    <div class="row container">
        <div class="col icon-done">
            <li></li>
        </div>
        <div class="col message">
            <div class="row thanks-message">
            
                <p>Chào <span>{{ $user_infor[0]->full_name }}</span>, </p>
                <p>Cảm ơn bạn đã đặt hàng tại cửa hàng chúng tôi</p>
            </div>
            <div class="row order-id">
                <p>Mã đơn hàng của bạn là: <span>{{ $user_infor[0]->id }}</span> Bạn có thể xem chi tiết đơn hàng <a href="{{ route('front.order_detail',[$user_infor[0]->id])}}">tại
                        đây</a>
                </p>
            </div>
            <div class="row order-date">
                <p>Thời gian dự kiến giao hàng vào <span>{{ $user_infor[0]->delivered_date }}</span>(Không tính CN & ngày
                    lễ, không bao gồm sản phẩm đặt hàng trước)</p>

            </div>
            <div class="row order-user-contact">
                <p>Tin nhắn xác nhận đơn hàng đã được gửi vào số điện thoại: <span>{{ $user_infor[0]->phone }}</span></p>
            </div>
            <div class="row order-note">
                <p>Để việc xử lý đơn hàng nhanh chóng, Chúng tôi có thể không gọi điện xác nhận đơn hàng. Hệ thống tự
                    động xử lý và nhân viên giao hàng sẽ liên hệ trực tiếp với bạn</p>
            </div>
            <div class="row contact">
                <p>Mọi thắc mắc vui lòng liên hệ: <span>0948346245</span></p>

            </div>
        </div>

    </div>
    <div class="row button-next">
        <a href="/">
        <button>Tiếp tục mua hàng</button>
        </a>
    </div>


</body>

</html>
