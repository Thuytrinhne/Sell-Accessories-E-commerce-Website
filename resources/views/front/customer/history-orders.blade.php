@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/history-orders.css')}}">
@endsection
@section('content')
<div class="body-user-display-myaccount">
                <div class="body-user-display-header">
                    <a href="{{ route('.front.customer.history-orders')}}" class="body-footer-seemore body-footer-seemore-Active">Tất cả</a>
                    <a href="{{ route('filter.history-order', 1) }}" class="body-footer-seemore">Mới đặt</a>
                    <a href="{{ route('filter.history-order', 2) }}" class="body-footer-seemore">Đã xác nhận</a>
                    <a href="{{ route('filter.history-order', 3) }}" class="body-footer-seemore">Đang giao hàng</a>
                    <a href="{{ route('filter.history-order', 4) }}" class="body-footer-seemore">Thành công</a>
                    <a href="{{ route('filter.history-order', 5) }}" class="body-footer-seemore">Đã hủy</a>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container">
                    <div class="item_order grid">
                      @foreach($user_order as $key => $item)
                        <div class="item_order-title">
                        <a class="item_order-title-link" href="">
                          
                          <div>
                            Mã đơn hàng: 
                            <span>{{ $item->id }}</span> | Đặt ngày: 
                            <span>{{ $item->date_order }}</span>
                            | Thanh toán:
                            <span>{{ $item->name_method }}</span>
                           
                          </div>
                          <div class="item_order-status">
                            <span class="item_order-status">@switch($item->status)
                              @case(1)
                                  Mới đặt
                                  @break
                              @case(2)
                                  Đã xác nhận
                                  @break
                              @case(3)
                                  Đang giao hàng
                                  @break
                              @case(4)
                                  Thành công
                                  @break
                              @case(5)
                                  Đã hủy
                                  @break
                                  
                          @endswitch</span>
                            <a style="" href="{{ route('front.order_detail',$item->id)}}">Xem chi tiết</a>
                          </div>
                          
                        </a>
                  
                        </div>
                        <div class="item_order-list">
                          
                            <div class="item_order-detail">
                              <div class="item_order-infor">
                                <img src="https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-llygp6dq2ean69_tn" alt="">
                                <div>
                                    <strong class="item_order-infor-name">{{ $item->name_product}}</strong>
                                    <div class="item_order-infor-sort">Phân loại hàng:
                                      @if($item->variation_id == 1)
                                      
                                        {{ $item->name_color }}
                                      
                                      @else 
                                        {{ $item->variation_name }}
                                      
                                      @endif
                                    </div>
                                    <div class="item_order-infor-sort" >x{{ $item->quantity }}</div>
                                </div>
                              </div>
                                <div class="item_order-price">
                                  {{ $item->price}}đ
                                </div>
                            </div>
                           
                        </div>
                        <div class="item_order-btn">
                          @if($item->status == 1)
                          <a href="{{ route('admin.order.destroy',[$item->id])}}" class="body-footer-seemore body-footer-delete">Hủy đơn</a>
                          @endif
                           <a href="{{ route('re-checkout',[$item->cart_id])}}" class="body-footer-seemore body-footer-reorder">Mua lại</a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
@endsection