@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/auth/pass-verify.css')}}">
@endsection
@section('content')
<div class="forgot-pass">
        <!-- ================ Forgot-pass header ================ -->
        <div class="forgot-pass_header">
            <div class="forgot-pass_logocontainer" >
                <a href="" ><img src="./Assets/Images/hippo-logo.png" alt="" style="height: 48px;"></a>
                <h3 class="forgot-pass_header-text" style="display: inline-block; 
                font-size: 28px; 
                margin-left: 32px;">Quên mật khẩu</h3>
            </div>
            <a href="" style="color: #e05994; font-size: 16px;">Bạn cần giúp đỡ?</a>
        </div>
        <!-- ================ Forgot-pass body ================ -->
        <div class="forgot-pass_body">
            <img src="./Assets/Images/background_shoppe.jpeg" alt="" style="height: 602px; width: 100%;">

            <div class="forgot-pass_body-form" >
                <div class="forgot-pass_body-form-container">
                    <h2 style="margin-bottom: 22px; font-size: 24px;">Quên mật khẩu</h2>
                    <div class="forgot-pass_body-input">
                        <label for=""> 
                            Nhập mật khẩu mới</label>  <br>
                        <input type="text" placeholder="Mật khẩu mới"><br>
                    </div>

                    <div class="forgot-pass_body-input">
                        <label for=""> 
                            Xác nhận mật khẩu</label>  <br>
                        <input type="text" placeholder="Nhập lại mật khẩu mới"><br>
                    </div>


                    <div class="forgot-pass_button">
                        <a class="forgot-pass_btn" href="signin.html">Đặt lại mặt khẩu</a><br>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection