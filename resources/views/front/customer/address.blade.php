@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/address.css')}}"> 
@endsection;
@section('content')
<div class="body-user-display-addressUser">
                <div class="body-user-display-header-address">
                  <div class="body-user-display-title1 body-user-display-title3">Sổ địa chỉ</div>
                  <div class="body-user-display-listAddress">
                    <div class="body-user-display-listAddress-border">
                      <div class="body-user-display-listItem body-user-display-listItem-main">
                        <div class="body-user-display-address-infor">
                          <strong>Nguyễn Ngọc</strong>- 032898124
                        </div>
                        <div class="body-user-display-address-detail">Honda Đức Dũng - Ngã tư Đồng Rướn, Xã Bình Thuận, Huyện Bình Sơn, Quảng Ngãi
  
                        </div>
                        <span class="body-user-display-address-edit">
                          <a class="body-user-display-address-link" href="">Chỉnh sửa
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="body-user-display-listAddress-border">
                      <div class="body-user-display-listItem">
                        <div class="body-user-display-address-infor">
                          <strong>Nguyễn Ngọc</strong>- 032898124
                        </div>
                        <div class="body-user-display-address-detail">Honda Đức Dũng - Ngã tư Đồng Rướn, Xã Bình Thuận, Huyện Bình Sơn, Quảng Ngãi
  
                        </div>
                        <span class="body-user-display-address-edit">
                          <a class="body-user-display-address-link" href="">Chỉnh sửa
                            <img src="https://hasaki.vn/images/graphics/icon_delete.gif" alt="">
                          </a>
                        </span>
                      </div>
                      </div>
                      <div class="body-user-display-listAddress-border">
                      <div class="body-user-display-listItem">
                        <div class="body-user-display-address-infor">
                          <strong>Nguyễn Ngọc</strong>- 032898124
                        </div>
                        <div class="body-user-display-address-detail">Honda Đức Dũng - Ngã tư Đồng Rướn, Xã Bình Thuận, Huyện Bình Sơn, Quảng Ngãi
  
                        </div>
                        <span class="body-user-display-address-edit">
                          <a class="body-user-display-address-link" href="">Chỉnh sửa
                            <img src="https://hasaki.vn/images/graphics/icon_delete.gif" alt="">
                          </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="body-user-display-footer">
                  <div>Bạn muốn giao hàng đến địa chỉ khác?</div>
                  <a href="add-location"><button class="body-footer-seemore btn-red">Thêm địa chỉ mới</button></a>
                </div>
              </div>
@endsection
             