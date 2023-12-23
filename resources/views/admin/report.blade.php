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
                        <!-- <button>Xác nhận</button> -->
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
                    <form action="" method="POST" class="search_product">
                        @csrf
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" id="datepicker1" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <label>Đến</label>
                        <input type="date" data-date="" id="datepicker2" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <label>Thể loại</label>
                        <select name="name_category">
                            <option value="">Tất cả</option>
                            @foreach($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name_category}}</option>
                            @endforeach
                        </select>
                        <button type="submit" id="btn-submit-datepicker">Xác nhận</button>
                    </form>

                    <table class="content_report">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Số lượng</th>
                                <th>Ngày cập nhật</th>
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
                                <td>{{ $item->productItems->sum('quantity') }} Product Item</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                    <div style ="margin:0 auto">{{ $products->links() }}</div>
                </div>

                
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
    $(document).ready(function() {
       

        $('#btn-submit-datepicker').click(function(e) {
            e.preventDefault();

            // Lấy dữ liệu từ form
            var formData = {
                _token: $('input[name="_token"]').val(),
                start_date: $('#datepicker1').val(),
                end_date: $('#datepicker2').val(),
            };

            // Thực hiện AJAX request
            $.ajax({
                url: '/report-product-by-date',
                type: 'POST', // Sử dụng phương thức POST nếu bạn đang gửi dữ liệu đến server
                dataType: 'json',
                data: formData,
                success: function(data) {
                    alert(data);
                    console.log(data);
                    // Xử lý dữ liệu trả về từ server nếu cần
                },
                error: function(error) {
                    console.log('Lỗi:', error);
                    // Xử lý lỗi nếu có
                }
            });

            // Thêm alert sau AJAX request để đảm bảo rằng mã chạy đến cuối cùng
            alert("Đã chạy đến cuối hàm");
        });
    });
</script>

@endsection
