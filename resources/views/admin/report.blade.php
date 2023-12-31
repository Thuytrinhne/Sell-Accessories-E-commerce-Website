@extends ('layouts.admin')
@section ('content')
@php
 $stt=0;
@endphp

<div class="content report">
                @if (session('Notfound'))
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Kết quả: ',
                        text: '{{ session('Notfound') }}',
                        })

                    </script>
                @endif   

                @if($display == 1)
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        
                            showContent('selection_product');
                    });
                </script>
                @endif

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
                <!-- <form action="{{ route('admin.filterReport') }}" method="POST" class="search_product">
                        @csrf
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" name="start_date"  data-date-format="DD MMMM YYYY" value="2022-08-09">
                        <label>Đến</label>
                        <input type="date" data-date="" name="end_date"  data-date-format="DD MMMM YYYY" value="2023-08-09">
                        <label>Thể loại</label>
                        <select name="name_category">
                            <option value="">Tất cả</option>
                            @foreach($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name_category}}</option>
                            @endforeach
                        </select>
                        <button type="submit" id="btn-submit-datepicker">Xác nhận</button>
                    </form> -->
                    <table class="content_report">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Tổng đơn hàng</th>
                                <th>Đã hủy</th>
                                <th>Đã thanh toán</th>
                                <th>Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($display != 1)
                        @foreach($ordersStatistics as $stats)
                            <tr>
                                <td>{{ $stats->date }}</td>
                                <td>{{ $stats->total_orders }}</td>
                                <td>{{ $stats->cancelled_orders }}</td>
                                <td>{{ $stats->paid_orders }}</td>
                                <td>{{ $stats->total_revenue }}</td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="selection_product">
                    <form action="{{ route('admin.filterReport') }}" method="POST" class="search_product">
                        @csrf
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" name="start_date"  data-date-format="DD MMMM YYYY" value="2022-08-09">
                        <label>Đến</label>
                        <input type="date" data-date="" name="end_date"  data-date-format="DD MMMM YYYY" value="2023-08-09">
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
                                <th>Mã sản phẩm</th>

                                <th>Tên Sản phẩm</th>
                                <th>Thuộc Danh mục</th>
                                <th>Tổng số orders</th>
                                <th>Tổng số lượng đã bán</th>
                                <th>Tổng danh thu</th>
                            </tr>
                        </thead>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach($products as $item)
                        <tbody>
                            <tr>
                                <td>{{++$stt}}</td>
                                <td>{{ $item->idProduct }}</td>

                                <td>{{ $item->name_product }}</td>
                                <td>{{ $item->name_category }}</td>
                                <td>{{ $item->sl }}</td>

                                <td>{{ $item->total_quantity }}</td>
                                <td>{{ $item->total_revenue }}</td>


                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                    
                </div>

                
</div>



  <!-- <script>
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
</script> -->

@endsection
