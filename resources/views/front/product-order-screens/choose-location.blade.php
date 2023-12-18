@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/choose-location.css')}}">
@endsection;
@section('body-main')
<div class="checkout-main">
<div class="checkout">
        <div class="checkout_container">
            <div class="backhome" style="font-size: 12px;">
                <a href="">HOME</a>
                /
                <a href="">CHECKOUT</a>
            </div>
    
            <h1>CHECKOUT</h1>
        </div>
    </div>

    <div class="checkout_detail">
        <div class="payment_info">
            <div class="location-list_containerPlus">
                <div class="location-list_container">
                    <h1 style="margin-bottom: 24px;">Thông tin nhận hàng</h1>
                    <!-- =============  location list  ============ -->
                    <div class="location-list">
                        <div class="location-tick">
                            <input type="radio" name="location-info" id="location-info">
                        </div>
                        <div class="location-detailPlus">
                            <div class="location-detail">
                                <strong>Nguyễn Trung</strong>
                                -
                                0961432414
                            </div>
                            <div class="area">
                                Hội Sơn, An Hoà Hải, Tuy An, Phú Yên
                            </div>
                        </div>

                        <a href="">Sửa</a>
                    </div>
                    <!-- =============  end list  ============ -->
                    
                    <div class="location-list">
                        <div class="location-tick">
                            <input type="radio" name="location-info" id="location-info">
                        </div>
                        <div class="location-detailPlus">
                            <div class="location-detail">
                                <strong>Nguyễn Trung</strong>
                                -
                                0961432414
                            </div>
                            <div class="area">
                                Hội Sơn, An Hoà Hải, Tuy An, Phú Yên
                            </div>
                        </div>

                        <a href="checkout.html">Sửa</a>
                    </div>
                </div>

                <div class="location-add">
                    <div class="location-add_container">
                        <a href="/checkout/add-location">
                            <i class="fa-solid fa-circle-plus" style="margin-right: 2px;"></i>
                            Thêm địa chỉ
                        </a>
                    </div>
                </div>
            </div>

            <div class="payment_total">
                <div class="payment_total_container">
                    <div class="payment_preview">
                        <h3>Sản phẩm</h3>
                        <h3>Tạm tính</h3>
                        <!-- =================  product list  =================== -->
                        <div class="product_list">
                            <div class="product_name_container">
                                <p class="product_name">Tên sản phẩm x giá</p>
                                <dl class="variation" >
                                    <dt class="variation_color">Color: </dt>
                                    <dd class="variation_color">
                                        <p>Be</p>
                                    </dd>
                                </dl>
                            </div>

                            <p>130.000đ</p>
                        </div>
                            <div class="product_list">
                            <div class="product_name_container">
                                <p class="product_name">Tên sản phẩm x giá</p>
                                <dl class="variation" >
                                    <dt class="variation_color">Color: </dt>
                                    <dd class="variation_color">
                                        <p>Be</p>
                                    </dd>
                                </dl>
                            </div>

                            <p>130.000đ</p>
                        </div>
                        <!-- =================  product list  =================== -->

                        <h3>Tạm tính</h3>
                        <p>130.000đ</p>
                        <h3>Giao hàng</h3>
                        <p>ĐỒNG GIÁ: 35.000đ</p>
                        <h3>Tổng</h3>
                        <p style="font-size: 18px; font-weight: bold; color: black;">165.000đ</p>

                        <div class="payment_methods">
                            <h2>Phương thức thanh toán</h2>
                            <div class="methods">
                                <form action="">
                                    <div class="pick_methods">
                                        <input type="radio" name="" id="" > Chuyển khoản ngân hàng <br>
                                        <p>description</p>
                                    </div>
                                    
                                    <div class="pick_methods">
                                        <input type="radio" name="" id=""> Thanh toán tiền mặt
                                        <p>description</p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <p class="privacy">privacy</p>

                        <div class="order_btn">
                            <a>Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection