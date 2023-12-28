@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/checkout.css')}}">
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
            <div class="location-list_containerPlus">
                <div class="location-list_container">
                    <div class="order-info">
                        <h1>Thông tin nhận hàng</h1>
                        <!-- <a href="choose-location.html">Thay đổi</a> -->
                    </div>
                    <!-- =============  location list  ============ -->
                    <div class="location-list">
                        <div class="location-info">
                            <div class="location-tick">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="location-detailPlus">
                                <div class="location-detail">
                                    <div class="name_phone">
                                        <strong>Trung</strong>
                                        -
                                        0961432414
                                    </div>
                                    <a class="change" href="product-order-screens/choose-location">Thay đổi</a>

                                </div>
                                <div class="area">
                                    Hội Sơn, An Hoà Hải, Tuy An, Phú Yên
                                </div>
                            </div>
                            <!-- <a class="change" href="checkout/choose-location">Thay đổi</a> -->
                        </div>
                        <form action="{{ route('checkout-success') }}" method="POST">
                            @csrf
                            <div class="info_input">
                                <label for="">GHI CHÚ ĐƠN HÀNG</label><br>
                                <textarea name="order_note" id="" cols="30" rows="10" placeholder="Ghi chú vào đây..." value=""></textarea>
                            </div>
                    </div>

                    <!-- =============  end list  ============ -->
                </div>
            </div>

            <div class="payment_total">
                <div class="payment_total_container">
                    <div class="payment_preview">
                        <div class="product-cal">
                            <h3>Sản phẩm</h3>
                            <h3 class="tamtinh">Tạm tính</h3>
                        </div>
                        <!-- =================  product list  =================== -->
                        @foreach ($product_item_cart as $key => $item)
                        <input style="display: none" name="idOrder" value="{{ $item->id}}">

                        <div class="product_list">
                            <div class="product_name_container">

                                <label class="product_name">
                                    <input type="text" name="name_product" value="{{ $item->name_product }}" disabled>
                                    x
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" disabled>

                                </label>
                                <label class="variation">
                                    <span>Color:</span>
                                    <input type="text" name="variation_value" value="{{ $item->quantity }}" disabled>
                                    <p>{{ $item->quantity * $item->price}}</p>

                                </label>

                            </div>
                            @endforeach
                            <!-- =================  product list  =================== -->
                            <div class="total_cart">
                                <h3>Tạm tính</h3>
                                <input class="input-total" value="{{ $total }}" disabled>
                            </div>
                            <div class="deliver">
                                <h3>Giao hàng</h3>
                                <p>ĐỒNG GIÁ: 35.000đ</p>
                            </div>
                            <div for="total_price" class="total_price-container">
                                <h3>Tổng</h3>
                                <input class="total_price" name="total_price" value="{{ $total + 35000 }}" disabled>
                            </div>


                            <div class="payment_methods">
                                <h2>Phương thức thanh toán</h2>
                                <div class="methods">
                                    <label class="pick_methods">
                                        <input type="radio" name="method_payment" id="" value="Chuyển khoản ngân hàng"> Chuyển khoản ngân hàng <br>

                                    </label>

                                    <label class="pick_methods">
                                        <input type="radio" name="method_payment" value="Thanh toán tiền mặt"> Thanh toán tiền mặt

                                    </label>
                                </div>
                            </div>

                            <p class="privacy">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our chính sách riêng tư.</p>

                            <button type="summit" class="order_btn">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

            @endsection