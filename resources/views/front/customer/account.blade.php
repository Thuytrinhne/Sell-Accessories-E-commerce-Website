@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}"> 
@endsection;
@section('content')
<div class="body-user-display-myaccount">
                <div class="body-user-display-header1">
                  <div class="body-user-display-title1">Tài Khoản Của Tôi</div>
                  <div class="body-user-display-title2">Quản lý thông tin cá nhân để bảo mật tài khoản</div>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container1">
                    <form class="body-user-display-frm" action="">
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Họ và tên</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input class="body-user-display-input"type="text" value="Nguyễn Thùy Trinh">
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Giới tính</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input class="body-user-display-rdo" type="radio">
                            <span class="body-user-display-rdo-text" >Nam</span>
                            <input class="body-user-display-rdo" type="radio">
                            <span class="body-user-display-rdo-text">Nữ</span>
                            <input class="body-user-display-rdo" type="radio">
                            <span class="body-user-display-rdo-text">Khác</span>
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Ngày sinh</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input class="body-user-display-input" type="date">
  
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Email</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input  class="body-user-display-input"  type="email" value="21522719@gm.uit.edu.vn">
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Số điện thoại</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input  class="body-user-display-input" type="phone" value="0987282918">
                          </td>
                        </tr>
                      </table>
                    </form>
                    <div class="body-user-display-btn">
                    <fieldset class="body-user-display-fieldset">
                      <legend class="body-user-display-legend">THAY ĐỔI MẬT KHẨU</legend>
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Mật khẩu hiện tại</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input  class="body-user-display-input" type="password">
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Mật khẩu mới</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input  class="body-user-display-input" type="password">
                          </td>
                        </tr>
                        <tr class="body-user-display-tr">
                          <td class="body-user-display-td-label">
                            <label for="text">Xác nhận mật khẩu mới</label>
                          </td>
                          <td  class="body-user-display-td-input">
                            <input  class="body-user-display-input" type="password">
                          </td>
                        </tr>
                      
                        
                      </table>
                    </fieldset>
                    <button class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>
                  </div>
                </div>
                </div>
@endsection
             