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
                    <div class="rangeCost">
                        <div class="sliderValue">
                            <span>Giá đơn hàng:</span>
                            <span id="span_sliderValue">100</span>
                            <span>₫</span>
                        </div>
                        <div class="field">
                            <div class="value left">0</div>
                            <input id="input_field" type="range" min="0" max="200" value="100" steps="1">
                            <div class="value right">200</div>
                        </div>
                    </div>
                </div>
                <div class="order_list">
                    <table class="content_order">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>user</td>
                                <td>0948346245</td>
                                <td>Quảng Trị</td>
                                <td>10/10/2023</td>
                                <td>100000</td>
                                <td>Đang xử lý...</td>
                                <td><button>Chi tiết</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>user</td>
                                <td>0948346245</td>
                                <td>Quảng Trị</td>
                                <td>10/10/2023</td>
                                <td>100000</td>
                                <td>Đang xử lý...</td>
                                <td><button>Chi tiết</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>user</td>
                                <td>0948346245</td>
                                <td>Quảng Trị</td>
                                <td>10/10/2023</td>
                                <td>100000</td>
                                <td>Đang xử lý...</td>
                                <td><button>Chi tiết</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
</div>
@endsection('content')
