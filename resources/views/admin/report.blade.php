@extends ('layouts.admin')
@section ('content')
@php
 $stt=0;
@endphp
<div class="content report">
                <div class="title_report">
                    <h1>Thống kê</h1>
                </div>
                <div class="select_report">
                    <button href="#" class="report_order" onclick="showContent('selection_order')">Thống kê đơn
                        hàng</button>
                    <button href="#" class="report_product" onclick="showContent('selection_product')">Thống kê sản
                        phẩm</button>

                </div>
                <div class="selection_order">
                    <div class="search_order">
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <label>Đến</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <button>Xác nhận</button>
                    </div>
                    <table class="content_report">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Số đơn hàng</th>
                                <th>Số đơn hủy</th>
                                <th>Doanh thu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>23</td>
                                <td>30</td>
                                <td>2</td>
                                <td>3000000</td>
                                <td><button>Chi tiết</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="selection_product">
                    <form action=" {{route('admin.report')}} " method="GET" class="search_product">
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09" name="start_date">
                        <label>Đến</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09" name="end_date">
                        <label>Thể loại</label>
                        <select name="name_category">
                            @foreach($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name_products}}</option>
                            @endforeach
                        </select>
                        <button type="submit">Xác nhận</button>
                    </form>

                    <table class="content_report">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Loại</th>
                                <th>Được mua</th>
                                <th>Tổng tiền thu được</th>
                            </tr>
                        </thead>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach($products as $item)
                        <tbody>
                            <tr>
                                <td>{{++$stt}}</td>
                                <td>{{ $item->name_product }}</td>
                                <td>{{ $item->name_category }}</td>
                                <td>Hok có ý tưởng</td>
                                <td>Hok có ý tưởng</td>
                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                    <div style ="margin:0 auto">{{ $products->links() }}</div>
                </div>

                
</div>
@endsection