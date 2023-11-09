@extends ('layouts.admin')
@section ('content')
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
                    <div class="search_product">
                        <h2>Tìm kiếm</h2>
                        <label>Bắt đầu</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <label>Đến</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                        <label>Thể loại</label>
                        <select>
                            <option>Tất cả</option>
                            <option>Cài tóc</option>
                            <option>Đèn học</option>
                        </select>
                        <button>Xác nhận</button>
                    </div>
                    <table class="content_report">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Số đơn hàng</th>
                                <th>Số đơn hủy</th>
                                <th>Doanh thuaaaa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>23</td>
                                <td>30</td>
                                <td>2</td>
                                <td>3000000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
</div>
@endsection