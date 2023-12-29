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
                    <div>
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
                            <div>
                            <select class="filter-sort__select" id="sortOptions" >
                          <option class="filter-sort__option" value="">Sort by</option>
                          <option class="filter-sort__option" value="1">Đơn hàng chưa xử lý</option>
                          <option class="filter-sort__option" value="2">Đơn hàng đã xử lý</option>
                          <option class="filter-sort__option" value="3">Đơn hàng đã thanh toán</option>
                        </select>
                        </div>
                    
                    
                </div>
                
               
                <div class="order_list">
                    <table class="content_order">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>

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
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->date_order }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>@switch($item->status)
                                    @case(1)
                                        Chưa xử lý
                                        @break
                                    @case(2)
                                        Đã xử lý
                                        @break
                                    @case(3)
                                        Đã thanh toán
                                        @break
                                       
                                @endswitch</td>
                                <td><a href="{{ route('admin.detailOrder',[$item->id])}}"><button>Chi tiết</button></a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{$order_list->links()}}     

                </div>
</div>
<script>
        $('#sortOptions').on('change', function() {
                    selectedValue = $(this).val();
                    alert( selectedValue );
        });
</script>
@endsection('content')
