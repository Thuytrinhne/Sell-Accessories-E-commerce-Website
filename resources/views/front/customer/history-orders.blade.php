@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/history-orders.css')}}">
@endsection
@section('content')
<div class="body-user-display-myaccount">
                <div class="body-user-display-header">
                    <a href="" class="body-footer-seemore body-footer-seemore-Active">Tất cả</a>
                    <a href="" class="body-footer-seemore">Mới đặt</a>
                    <a href="" class="body-footer-seemore">Đã xác nhận</a>
                    <a href="" class="body-footer-seemore">Đang giao hàng</a>
                    <a href="" class="body-footer-seemore">Thành công</a>
                    <a href="" class="body-footer-seemore">Đã hủy</a>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container">
                    <div class="item_order grid">
                      @foreach ( $user_payment as $key => $item)
                        <div class="item_order-title">
                        <a class="item_order-title-link" href="">
                          
                          <div>
                            Mã đơn hàng: 
                            <span>{{ $item->id }}</span> | Đặt ngày: 
                            <span>{{ $item->date_order }}</span>
                            | Thanh toán:
                            <span>{{ $item->name_method }}</span>
                           
                          </div>
                          <div>
                            <span class="item_order-status">Hoàn tất</span>
                            <strong>Xem chi tiết</strong>
                          </div>
                          
                        </a>
                  
                        </div>
                        <div class="item_order-list">
                          @foreach($user_order as $key => $item)
                            <div class="item_order-detail">
                              <div class="item_order-infor">
                                <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-llygp6dq2ean69_tn" alt="">
                                <div>
                                    <strong class="item_order-infor-name">{{ $item->name_product}}</strong>
                                    <div class="item_order-infor-sort">Phân loại hàng: Màu be</div>
                                    <div class="item_order-infor-sort" >x{{ $item->quantity }}</div>
                                </div>
                              </div>
                                <div class="item_order-price">
                                  {{ $item->price}}đ
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="item_order-btn">
                           <a href="{{ route('re-checkout',[$item->cart_id])}}" class="body-footer-seemore body-footer-reorder">Mua lại</a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
@endsection