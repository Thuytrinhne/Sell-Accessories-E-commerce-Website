@extends('layouts.auth')
@section('content')
   <div class="signin">
        <!-- ================ signin header ================ -->
        <div class="signin-header-container">
            <div class="signin_header">
                <div class="signin_logocontainer" >
                    <a href="" ><img src="./Assets/Images/hippo-logo.png" alt="" style="height: 48px;"></a>
                    <p class="signin_login-text">Đăng nhập</p>
                </div>
                <a href="" style=" font-size: 16px;">Bạn cần giúp đỡ?</a>
            </div>
        </div>
        <!-- ================ signin body ================ -->
        <div class="signin_body">
            <img src="./Assets/Images/background_shoppe.jpeg" alt="" style="height: 602px; width: 100%;">

            <div class="signin_body-form" >
                <div class="sign_body-form-container">
                    <h2 style="margin-bottom: 20px; font-size: 24px;">Đăng nhập</h2>
                    <div class="signin_body-input">
                        <label for="">Tên tài khoản hoặc địa chỉ email</label>  <br>
                        <input type="text" placeholder="Số diện thoại hoặc email"><br>
                        <label for="">Mật khẩu</label><br>
                        <input type="text" placeholder="Mật khẩu">
                    </div>

                    <input type="checkbox" name="remember_password" id="" style="margin-right: 8px;">
                    Ghi nhớ mật khẩu<br>
                

                    <div class="loginandremember">
                        <button class="signin_btn" onclick="sigInOnclick()">Đăng nhập</button><br>
                        <a class="forgot-pass" href="Forgot-pass.html">Quên mật khẩu?</a><br>
                    </div>

                    
                    <div class="signin-newbie">
                        <p>Bạn mới biết đến T&P? <a href="signup.html">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection