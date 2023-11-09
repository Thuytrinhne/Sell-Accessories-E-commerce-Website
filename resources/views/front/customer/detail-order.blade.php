@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/details_order.css')}}">
@endsection
@section('content')
<div class="container">
        <div class="row title">
            <h1>Chi tiết đơn hàng</h1>
        </div>
        <div class="row infor">
            <div class="col infor_order">
                <div class="row order_key">
                    <span>Đơn hàng:</span>
                    <span> #23102477123</span>
                </div>
                <div class="row order_date">
                    <span>Ngày đặt: </span>
                    <span>27/10/2023</span>
                </div>
                <div class="row order_confirm">
                    <button>Hoàn tất</button>
                </div>
            </div>
            <div class="col location_delivery">
                <span>Địa chỉ người nhận</span>
                <p>Nguyễn Thị Thùy Trinh</p>
                <p>Điện thoại: 0123117301</p>
                <p>Cổng sau ktx khu B, Đại học quốc gia thành phố hồ chí minh
                </p>
            </div>
            <div class="col infor_payment">
                <span>Phương thức thanh toán</span>
                <p>Thanh toán khi nhận hàng(COD)</p>
                <span>Thông tin vận chuyển</span>
                <p>Hasaki: OTK223391</p>
                <span>Phương thức giao hàng</span>
                <p>Giao hàng nhanh</p>
            </div>
        </div>

        <div class="row progress">
            <ul class="progress-lists">
                <li class="active"> Đặt hàng thành công</li>
                <li class="active">Kiểm hàng và đóng gói</li>
                <li class="active">Chuyển hàng cho shiper</li>
                <li>Nhận hàng thành công</li>
            </ul>
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
            <div class="row infor_product">
                <div class="col infor_details_product">
                    <div class="col image_product">
                        <img
                            src="https://media.hcdn.vn/catalog/product/p/r/promotions-auto--205100146-8681-nuoc-tay-trang-l-oreal-3-in-1-lam-sach-sau-400ml_KH4pAbQauf5vGiUY_img_358x358_843626_fit_center.png">
                    </div>
                    <div class="col name_product">
                        <div class="row brand_product">
                            <span>L'Oreal</span>
                        </div>
                        <div class="row name_brand_product">
                            <span>Nước Tẩy Trang L'Oreal Làm Sạch Sâu Trang Điểm 400ml
                                Micellar Water 3-in-1 Deep Cleansing Even For Sensitive Skin</span>
                        </div>
                    </div>
                </div>
                <div class="col cost_product">
                    <span>79,000đ</span>
                </div>
                <div class="col count_product">
                    <span>1</span>
                </div>
                <div class="col totals_product">
                    <span>79,000đ</span>
                </div>
            </div>
            <div class="row infor_product">
                <div class="col infor_details_product">
                    <div class="col image_product">
                        <img
                            src="https://media.hcdn.vn/catalog/product/p/r/promotions-auto--205100146-8681-nuoc-tay-trang-l-oreal-3-in-1-lam-sach-sau-400ml_KH4pAbQauf5vGiUY_img_358x358_843626_fit_center.png">
                    </div>
                    <div class="col name_product">
                        <div class="row brand_product">
                            <span>L'Oreal</span>
                        </div>
                        <div class="row name_brand_product">
                            <span>Nước Tẩy Trang L'Oreal Làm Sạch Sâu Trang Điểm 400ml
                                Micellar Water 3-in-1 Deep Cleansing Even For Sensitive Skin</span>
                        </div>
                    </div>
                </div>
                <div class="col cost_product">
                    <span>79,000đ</span>
                </div>
                <div class="col count_product">
                    <span>1</span>
                </div>
                <div class="col totals_product">
                    <span>79,000đ</span>
                </div>
            </div>
            <div class="row infor_product">
                <div class="col infor_details_product">
                    <div class="col image_product">
                        <img
                            src="https://media.hcdn.vn/catalog/product/p/r/promotions-auto--205100146-8681-nuoc-tay-trang-l-oreal-3-in-1-lam-sach-sau-400ml_KH4pAbQauf5vGiUY_img_358x358_843626_fit_center.png">
                    </div>
                    <div class="col name_product">
                        <div class="row brand_product">
                            <span>L'Oreal</span>
                        </div>
                        <div class="row name_brand_product">
                            <span>Nước Tẩy Trang L'Oreal Làm Sạch Sâu Trang Điểm 400ml
                                Micellar Water 3-in-1 Deep Cleansing Even For Sensitive Skin</span>
                        </div>
                    </div>
                </div>
                <div class="col cost_product">
                    <span>79,000đ</span>
                </div>
                <div class="col count_product">
                    <span>1</span>
                </div>
                <div class="col totals_product">
                    <span>79,000đ</span>
                </div>
            </div>

            <div class="row totals_order">
                <div class="order_temporary">
                    <span>Tạm tính</span>
                    <span>237,000đ</span>
                </div>
                <div class="order_delivery">
                    <span>Phí vận chuyển</span>
                    <span>0đ</span>
                </div>
                <div class="order_prices">
                    <span>Tổng cộng</span>
                    <span class="order_prices_text">237,000đ</span>
                </div>
            </div>
        </div>
    </div>
@endsection
             