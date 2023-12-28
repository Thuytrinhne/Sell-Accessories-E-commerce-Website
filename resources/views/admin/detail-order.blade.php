@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->

@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/details_order.css')}}">
<link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-detail-order.css')}}">

@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session ('updateStatusSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('updateStatusSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif
<div class="container containerDetail">
        <div class="row title">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        <div class="container_all">
                <div  class="container_all-item1">
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
                                <button>
                                @switch($user_order_infor[0]->status)
                                                @case(1)
                                                    Chưa xử lý
                                                    @break
                                                @case(2)
                                                    Đã xử lý
                                                    @break
                                                @case(3)
                                                    Đã thanh toán
                                                    @break
                                                
                                            @endswitch
                                </button>
                            </div>
                        </div>
                        <div class="col location_delivery">
                            <span>Địa chỉ người nhận</span>
                            <p>{{ $user_order_infor[0]->full_name }}</p>
                            <p>Điện thoại: {{ $user_order_infor[0]->phone }}</p>
                            <p>{{ $user_order_infor[0]->city }}, {{ $user_order_infor[0]->district }}, {{ $user_order_infor[0]->village }}, {{ $user_order_infor[0]->detail_address }}
                            </p>
                        </div>
                        <div class="col infor_payment">
                            <span>Phương thức thanh toán</span>
                            <p>{{$user_order_infor[0]->name_method}}</p>
                            <span>Thông tin vận chuyển</span>
                            <p>Hasaki: OTK223391</p>
                            <span>Phương thức giao hàng</span>
                            <p>Giao hàng nhanh</p>
                        </div>
                    </div>

                    <div class="row progress">
                        <ul class="progress-lists">
                            @if($user_order_infor[0]->status ==1)
                            <li class="active">Chưa xử lý</li>
                            <li>Đã xử lý</li>
                            <li>Đã thanh toán</li>
                            @elseif ($user_order_infor[0]->status ==2)
                            <li class="active">Chưa xử lý</li>
                            <li class="active">Đã xử lý</li>
                            <li>Đã thanh toán</li>
                            @else
                            <li class="active">Chưa xử lý</li>
                            <li class="active">Đã xử lý</li>
                            <li class="active">Đã thanh toán</li>
                            @endif
                        </ul>
                    </div>
               
                </div>
                <div  class="container_all-item2">
                    <div class="change_status">
                        <h3>Order Action</h3>
                        <form action="{{route('admin.order.updateStatus')}}" method="POST">
                            @csrf
                            <input hidden type="text" name="idOrder" value="{{ $user_order_infor[0]->id}}">
                        <select id="district-select" class="body-user-display-input" name="status" >
                                <option value="">Choose an action</option>
                                <option value="2">Đã xử lý</option>
                                <option value="3">Đã thanh toán</option>


                            </select>
                            <button type="submit" class="body-footer-seemore btn-red btn-bottom" href="">Cập nhật</button>
                            </form>
                    </div>
                    <div class="note-order">
                    <h3>Order Note</h3>
                    <textarea name="" id="" cols="30" rows="10">  {{$user_order_infor[0]->note}}</textarea>
                    </div>
                </div>
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
                                        src="https://media.hcdn.vn/catalog/product/p/r/promotions-auto--205100146-8681-nuoc-tay-trang-l-oreal-3-in-1-lam-sach-sau-400ml_KH4pAbQauf5vGiUY_img_358x358_843626_fit_center.png">
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
          
