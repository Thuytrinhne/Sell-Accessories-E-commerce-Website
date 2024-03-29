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
                    </div>
                    <!-- =============  location list  ============ -->
                    <div class="location-list">
                        <div class="location-info">
                            <div class="location-tick">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="location-detailPlus">
                                <div class="location-detail">
                                    <strong>{{$defaultAddress->full_name}} </strong>
                                    - {{$defaultAddress->phone}}
                                </div>
                                <div class="area">
                                {{$defaultAddress->city}}, {{$defaultAddress->district}}, {{$defaultAddress->village}}, {{$defaultAddress->detail_address}}
                                </div>
                            </div>
                            <a href="{{ route('choose-location-checkout', ['id' => $defaultAddress->id]) }}">Thay đổi</a>                        </div>
                            <form action="{{ route('checkout-success') }}" method="POST" >
                            @csrf
                        <input style="display: none" name="idUserAddress" value="{{$defaultAddress->id}}">
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
                        <h3>Sản phẩm</h3>
                        <h3>Tạm tính</h3>
                        <!-- =================  product list  =================== -->
                        
                           
                                    @foreach ($product_item_cart as $key => $item)
                                    <input style="display: none" name="idCart" value="{{$item->cart_id}}">
                                    
                                        <div class="product_list">
                                            <div class="product_name_container">
                                            
                                                <label class="product_name">
                                                    <input type="text" name="name_product" value="{{ $item->name_product }}" disabled>
                                                    <span>x</span>
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" disabled>
                                                </label>
                                                <label class="variation">
                                                    <span>Color:
                                                    </span>
                                                    
                                                    <input type="text" name="variation_value" value=" "  disabled>
                                                </label>
                                            
                                        </div>
                                        <p>@if($item->variation_id == 1)
                                                
                                            {{ $item->name_color }}
                                        
                                        @else 
                                            {{ $item->variation_value }}
                                        
                                        @endif
                                        </p>
                                    @endforeach
                        <!-- =================  product list  =================== -->
                        <label class="total_cart">
                        <h3>Tạm tính</h3>
                        <input  value="{{ $total }}" disabled>
                    </label>
                        <h3>Giao hàng</h3>
                        <p>ĐỒNG GIÁ: 35.000đ</p>
                        <label for="total_price" style="display: flex">
                            <h3>Tổng</h3>
                        <input class="total_price" type="text" name="total_price" value="{{ $total + 35000 }}" style="background-color: transparent" readonly>
                        </label>
                        

                        <label class="payment_methods">
                            <h2>Phương thức thanh toán</h2>
                            <label class="methods">
                                    <label class="pick_methods">
                                        <input type="radio" name="method_payment" id="" value="Chuyển khoản ngân hàng" > Chuyển khoản ngân hàng <br>
                                        <p>description</p>
                                    </label>
                                    
                                    <label class="pick_methods">
                                        <input type="radio" name="method_payment" value="Thanh toán tiền mặt"> Thanh toán tiền mặt
                                        <p>description</p>
                                    </label>  
                            </label>
                        </label>

                        <p class="privacy">privacy</p>

                        <button type="summit" class="order_btn" name="redirect" >Đặt hàng</button>
                        {{-- <button type="submit" name="redirect">Thanh toán bằng thẻ</button> --}}
            </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>

    @endsection