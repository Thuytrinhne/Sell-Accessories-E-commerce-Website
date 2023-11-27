@extends ('layouts.app')
@section('css')
      <link rel="stylesheet" href="{{asset('Assets/css/front/checkout.css')}}">
@endsection;
@section('body-main')
<div  class="checkout-main" >
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
                                    <strong></strong>
                                    -
                                    0961432414
                                </div>
                                <div class="area">
                                    Hội Sơn, An Hoà Hải, Tuy An, Phú Yên
                                </div>
                            </div>
                            <a href="add-location.html">Thay đổi</a>
                        </div>

                        <div class="info_input">
                            <label for="">GHI CHÚ ĐƠN HÀNG</label><br>
                            <textarea name="" id="" cols="30" rows="10" placeholder="Ghi chú vào đây..."></textarea>
                        </div>
                    </div>
                    
                    <!-- =============  end list  ============ -->
                </div>
            </div>

            <div class="payment_total">
                <div class="payment_total_container">
                    <div class="payment_preview">
                        <h3>Sản phẩm</h3>
                        <h3>Tạm tính</h3>
                        <!-- =================  product list  =================== -->
                        @foreach ($product_item_cart as $item)
                            
                        
                        <div class="product_list">
                            <div class="product_name_container">
                                <p class="product_name">{{ $item->name_product }} x {{ $item->quantity }}</p>
                                <dl class="variation" >
                                    <dt class="variation_color">Color: </dt>
                                    <dd class="variation_color">
                                        <p>Be</p>
                                    </dd>
                                </dl>
                            </div>

                            <p>{{ $item->quantity * $item->price}}</p>
                        @endforeach
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
<div>

    @endsection