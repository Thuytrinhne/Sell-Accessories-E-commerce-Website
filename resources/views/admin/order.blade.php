@extends ('layouts.admin')
@section('content')
<div class="content order">
                <div class="order_header">
                    <div class="header_title">
                        <span>Trang chính</span>
                        <h1>Đơn hàng</h1>
                    </div>

                </div>
                <div class="filter_list">
                    <label>Bắt đầu</label>
                    <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                    <label>Đến</label>
                    <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                    <button>Tìm kiếm</button>
                    <form action="{{ route('admin.order.filter') }}" method="GET" >
                    <div class="rangeCost">
                        <div class="sliderValue">
                            <span>Giá đơn hàng:</span>
                            <input type="number" name="price_filter" id="span_sliderValue" value="0">
                            <span>₫</span>
                        </div>
                        
                    
                    </div>
                    <button type="submit" style="display:none">
                </form>
                </div>
                <div class="order_list">
                    <table class="content_order">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order_list as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->date_order }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>@switch($item->status)
                                    @case(1)
                                        Chờ xác nhận
                                        @break
                                    @case(2)
                                        Đang xử lý
                                        @break
                                    @case(3)
                                        Đang vận chuyển
                                        @break
                                    @case(4)
                                        Thành công
                                        @break
                                    @case(5)
                                        Đã hủy
                                        @break
                                        
                                @endswitch</td>
                                <td><a href="{{ route('front.order_detail',[$key])}}"><button>Chi tiết</button></a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
</div>
@endsection('content')
