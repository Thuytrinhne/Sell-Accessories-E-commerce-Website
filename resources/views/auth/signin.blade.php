@extends('layouts.auth')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           
            @if(session('forgotPass'))
                        <script>
                           Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('forgotPass') }}',
                            showConfirmButton: true,
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        });
                        </script>
                        @endif
            @if(session('SignUpSuccess'))
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('SignUpSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
            </script>
            @endif
   <div class="signin">
        <!-- ================ signin header ================ -->
        <div class="signin-header-container">
            <div class="signin_header">
                <div class="signin_logocontainer" >
                    <a href="" ><img src="./Assets/Images/hippo-logo.png" alt=""></a>
                    <p class="signin_login-text">Đăng nhập</p>
                </div>
                <a href="">Bạn cần giúp đỡ?</a>
            </div>
        </div>
        <!-- ================ signin body ================ -->
        <div class="signin_body">
            <img src="./Assets/Images/background_shoppe.jpeg" alt="">

            <div class="signin_body-form" >
                <div class="sign_body-form-container">
                    <h2>Đăng nhập</h2>
                    <form action="{{route('postLogin')}}" method="POST">
                        @csrf
                    <div class="signin_body-input">
                        <label for="">Tên tài khoản hoặc địa chỉ email</label>  <br>
                        <input name="email" type="text" placeholder="Số diện thoại hoặc email"><br>
                        <label for="">Mật khẩu</label><br>
                        <input name="password" type="password" placeholder="Mật khẩu">
                    </div>

                    <input type="checkbox" name="remember_password" id="" style="margin-right: 8px;">
                    Ghi nhớ mật khẩu<br>
                

                    <div class="loginandremember">
                        <button type="submit" class="signin_btn" onclick="sigInOnclick()">Đăng nhập</button><br>
                        <a class="forgot-pass" href="{{route('forgot-pass')}}">Quên mật khẩu?</a><br>
                    </div>
                    </form>
                    
                    <div class="signin-newbie">
                        <p>Bạn mới biết đến T&P? <a href="{{route('signup')}}">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection