@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')
<div class="content dashboard">
                <div class="dashboard_header">
                    <div class="header_title">
                        <span>Trang chính</span>
                        <h1>Bảng điều khiển</h1>
                    </div>
                    <div class="header_infor">
                        <div class="search_box">
                            <ion-icon name="search-outline"></ion-icon>
                            <input type="input" placeholder="Tìm kiếm">
                        </div>
                        <div class="user_infor">
                            <img src="/Assets/Images/user-icon.jpg" alt="Ảnh đại diện">
                            <div class="logout">
                                <ion-icon name="log-in"></ion-icon>
                                <label>Đăng xuất</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard_main">
                    <div class="dashboard_details">
                        <h1 class="header_title" style="font-size: 45px;">Thống kê hôm nay</h1>
                        <div class="detail_content">
                            <div class="detail_card">
                                <ion-icon name="cash-outline"></ion-icon>
                                <div class="amount">
                                    <span class="amount_title">Doanh thu hôm nay</span>
                                    <span class="amount_value">200000</span>
                                </div>
                            </div>
                            <div class="detail_card .">
                                <ion-icon name="gift" style="background-color: aqua;"></ion-icon>
                                <div class="amount">
                                    <span class="amount_title">Giao hàng thành công</span>
                                    <span class="amount_value">1555</span>
                                </div>
                            </div>
                            <div class="detail_card">
                                <ion-icon name="cart-outline" style="background-color: greenyellow;"></ion-icon>
                                <div class="amount">
                                    <span class="amount_title">Số lượng đặt hàng</span>
                                    <span class="amount_value">59</span>
                                </div>
                            </div>
                            <div class="detail_card">
                                <ion-icon name="subway-outline" style="background-color: pink;"></ion-icon>
                                <div class="amount">
                                    <span class="amount_title">Đơn đang vận chuyển</span>
                                    <span class="amount_value">10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection