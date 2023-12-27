@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/add-location.css')}}"> 
@endsection
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
            <div class="info">
                <h1>Thêm địa chỉ mới</h1>
                <form class="form_info" action="">
                    <div class="info_input">
                        <label for="">Họ và tên</label><br>
                        <input type="text">
                    </div>

                    <div class="info_input">
                        <label for="">Số điện thoại <span style="color: red;">*</span></label><br>
                        <input type="tel" required>
                    </div>

                    <div class="info_input">
                        <label for="">Địa chỉ email</label><br>
                        <input type="email">
                    </div>

                    <div class="Location">
                        <div class="info_input">
                            <label for="">Vui lòng chọn khu vực <span style="color: red;">*</span></label><br>
                            <select name="area" id="area" required>
                                <option value="">Chọn khu vực</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                        </div>

                        <div class="info_input">
                            <label for="">Phường xã <span style="color: red;">*</span></label><br>
                            <select name="area" id="area" required>
                                <option value="">Chọn phường xã</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="info_input">
                        <label for="">Số nhà, tên đường <span style="color: red;">*</span></label><br>
                        <input type="text" required>
                    </div>

                    <div class="info_input default-address" >
                        <input type="radio" required >
                        <label for="">Đặt làm địa chỉ mặc định</label><br>
                    </div>

                    <button type="submit" class="addLocation-btn">
                        Thêm địa chỉ 
                    </button>
                </form>

                


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