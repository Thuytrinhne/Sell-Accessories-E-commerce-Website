@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/details_order.css')}}">
@endsection
@section('content')
<div class="container">
        <div class="row title">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        
        <div class="row infor">
            <div class="col infor_order">
                <div class="row order_key">
                    <span>Đơn hàng:</span>
                    <span> #{{ $user_order_infor[0]->id }}</span>
                </div>
                <div class="row order_date">
                    <span>Ngày đặt: </span>
                    <span>{{ $user_order_infor[0]->date_order }}</span>
                </div>
                <div class="row order_confirm">
                    <button>Hoàn tất</button>
                </div>
            </div>
            <div class="col location_delivery">
                <span>Địa chỉ người nhận</span>
                <p>{{ $user_order_infor[0]->full_name }}</p>
                <p>Điện thoại: {{ $user_order_infor[0]->phone }}</p>
                <p>{{ $user_order_infor[0]->detail_address }}
                </p>
            </div>
            <div class="col infor_payment">
                <span>Phương thức thanh toán</span>
                <p>Thanh toán khi nhận hàng(COD)</p>
                <span>Thông tin vận chuyển</span>
                <p>Hasaki: OTK223391</p>
                <span>Phương thức giao hàng</span>
                <p>Giao hàng nhanh</p>
            </div>
        </div>

        <div class="row progress">
            <ul class="progress-lists">
                <li class="active"> Đặt hàng thành công</li>
                <li class="active">Kiểm hàng và đóng gói</li>
                <li class="active">Chuyển hàng cho shiper</li>
                <li>Nhận hàng thành công</li>
            </ul>
        </div>
        
        <div class="row details_product">
            <div class="row details_header">
                
                <div class="col name_product">
                    <span>Sản phẩm</span>
                </div>
                <div class="col cost_product">
                    <span>Đơn giá</span>
                </div>
                <div class="col count_product">
                    <span>Số lượng</span>
                </div>
                <div class="col totals_product">
                    <span>Tạm tính</span>
                </div>
            </div>
            @foreach($user_order as $item)
            <div class="row infor_product">
                <div class="col infor_details_product">
                    <div class="col image_product">
                        <img
                            src="{{ $item->image }}">
                    </div>
                    <div class="col name_product">
                        <div class="row brand_product">
                            <span>{{ $item->name_product }}</span>
                        </div>
                        <div class="row name_brand_product">
                            <span>{{ $item->description }}</span>
                        </div>
                    </div>
                </div>
                <div class="col cost_product">
                    <span>{{ $item->price }}</span>
                </div>
                <div class="col count_product">
                    <span>{{ $item->quantity }}</span>
                </div>
                <div class="col totals_product">
                    <span>{{ $item->price * $item->quantity}}</span>
                </div>
            </div>
            @endforeach
            

            <div class="row totals_order">
                <div class="order_temporary">
                    <span>Tạm tính</span>
                    <span>{{ $total_price }}đ</span>
                </div>
                <div class="order_delivery">
                    <span>Phí vận chuyển</span>
                    <span>0đ</span>
                </div>
                <div class="order_prices">
                    <span>Tổng cộng</span>
                    <span class="order_prices_text">{{ $total_price }}đ</span>
                </div>
            </div>
        </div>
    </div>
@endsection
             