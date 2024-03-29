@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/auth/forgot-pass.css')}}">
@endsection
@section('content')
    @if (session('error'))
    <div class="alert alert-danger" role="alert">  
        <h4 style="text-align: center;">{{ session('error') }}</h4>    
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success" role="alert">  
        <h4 style="text-align: center;">{{ session('success') }}</h4>    
    </div>
    @endif
<div class="forgot-pass">
        <!-- ================ Forgot-pass header ================ -->
        <div class="forgot-pass_header">
            <div class="forgot-pass_logocontainer" >
                <a href="" ><img src="./Assets/Images/hippo-logo.png" alt="" ></a>
                <h3 class="forgot-pass_header-text" >Quên mật khẩu</h3>
            </div>
            <a href="" >Bạn cần giúp đỡ?</a>
        </div>
        <!-- ================ Forgot-pass body ================ -->
        <div class="forgot-pass_body">
            <img src="./Assets/Images/background_shoppe.jpeg" alt="" >

            <div class="forgot-pass_body-form" >
                <div class="forgot-pass_body-form-container">
                    <h2 >Quên mật khẩu</h2>
                    <form method="POST" action="{{route('handleForgot-pass')}}">
                        @csrf
                    <div class="forgot-pass_body-input">
                        <label for="" >Vui lòng nhập địa chỉ email. 
                            Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</label>  <br>
                        <input name="email" type="text" placeholder="Nhập email" value="{{ old('email') }}"><br>
                    </div>


                    <div class="forgot-pass_button">
                        <button type="submit" class="forgot-pass_btn">Tiếp tục</button><br>
                    </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection