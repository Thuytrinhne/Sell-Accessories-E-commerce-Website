@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/history-orders.css')}}">
@endsection
@section('content')
<div class="body-user-display-myaccount">
                <div class="body-user-display-header">
                    <a href="{{ route('.front.customer.history-orders')}}" class="body-footer-seemore body-footer-seemore-Active">Tất cả</a>
                    <a href="{{ route('filter.history-order', 1) }}" class="body-footer-seemore">Mới đặt</a>
                    <a href="{{ route('filter.history-order', 2) }}" class="body-footer-seemore">Đã xử lý</a>
                    <a href="{{ route('filter.history-order', 3) }}" class="body-footer-seemore">Đã thanh toán</a>
                    <a href="{{ route('filter.history-order', 4) }}" class="body-footer-seemore">Đã hủy</a>

                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container">
                    <div class="item_order grid">
                      @foreach($user_order as $key => $item)
                        <div class="item_order-title">
                        <a class="item_order-title-link" href="">
                          
                          <div>
                            Mã đơn hàng: 
                            <span>{{ $item[0]->id }}</span> | Đặt ngày: 
                            <span>{{ $item[0]->date_order }}</span>
                            | Thanh toán:
                            <span>{{ $item[0]->name_method }}</span>
                           
                          </div>
                          <div class="item_order-status">
                            <span class="item_order-status">@switch($item[0]->status)
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
                            <a style="" href="{{ route('front.order_detail',$item[0]->id)}}">Xem chi tiết</a>
                          </div>
                          
                        </a>
                  
                        </div>
                        <div class="item_order-list">
                            @foreach($item as $product)
                            <div class="item_order-detail">
                              <div class="item_order-infor">
                                <img src="{{ $product->image }}" alt="">
                                <div>
                                    <strong class="item_order-infor-name">{{ $product->name_product}}</strong>
                                    <div class="item_order-infor-sort">Phân loại hàng:
                                      @if($product->variation_id == 1)
                                      
                                        {{$product->name_color }}
                                      
                                      @else 
                                        {{$product->variation_name }}
                                      
                                      @endif
                                    </div>
                                    <div class="item_order-infor-sort" >x{{ $product->quantity }}</div>
                                </div>
                              </div>
                                <div class="item_order-price">
                                  {{ $product->price}}đ
                                </div>
                            </div>
                           @endforeach
                        </div>

                        <div class="item_order-btn">
                          @if($item[0]->status == 1)
                          <a href="{{ route('admin.order.destroy',[$item[0]->id])}}" class="body-footer-seemore body-footer-delete">Hủy đơn</a>
                          @endif
                           <a href="{{ route('re-checkout',[$item[0]->cart_id])}}" class="body-footer-seemore body-footer-reorder">Mua lại</a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
@endsection