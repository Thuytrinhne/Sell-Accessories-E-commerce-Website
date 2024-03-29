@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/auth/pass-verify.css')}}">
@endsection
@section('content')

<div class="forgot-pass">
        <!-- ================ Forgot-pass header ================ -->
        <div class="forgot-pass_header">
            <div class="x" >
                <a href="" ><img src="https://hipposhop.vn/wp-content/uploads/2023/04/hippo-logo.png" alt="" style="height: 48px;"></a>
                <h3 class="forgot-pass_header-text">Quên mật khẩu</h3>
            </div>
            <a href="">Bạn cần giúp đỡ?</a>
        </div>
        <!-- ================ Forgot-pass body ================ -->
        <div class="forgot-pass_body">
            <img src="./Assets/Images/background_shoppe.jpeg" alt="" >

            <div class="forgot-pass_body-form" >
                <div class="forgot-pass_body-form-container">
                    <h2 >Quên mật khẩu</h2>
                    <form action="{{route('handle-pass-verify', ['token' => $user->remember_token])}}" method="POST">
                        @csrf
                    <div class="forgot-pass_body-input">
                        <label for=""> 
                            Nhập mật khẩu mới</label>  <br>
                        <input type="password" placeholder="Mật khẩu mới" name="password"><br>
                        @error('password')
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                    </div>

                    <div class="forgot-pass_body-input">
                        <label for=""> 
                            Xác nhận mật khẩu</label>  <br>
                        <input type="password" placeholder="Nhập lại mật khẩu mới" name="confirmPass"><br>
                        @error('confirmPass')
                                <span class="msg-error">{{$message}}</span>
                        @enderror
                    </div>
                   

                    <div class="forgot-pass_button">
                        <button class="forgot-pass_btn" type="submit">Đặt lại mặt khẩu</button>
                    </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection