@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}"> 
<link rel="stylesheet" href="{{asset('Assets/css/front/changePassword.css')}}"> 

@endsection;
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session ('updatePassSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('updatePassSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif

<div class="body-user-display-myaccount">
                <div class="body-user-display-header1">
                  <div class="body-user-display-title1">Thay Đổi Mật Khẩu</div>
                  <div class="body-user-display-title2">Quản lý thông tin cá nhân để bảo mật tài khoản</div>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container1 body-user-display-container2">
                    <form class="body-user-display-frm" action="{{route('handleUpdatePassword')}}" method="POST">
                      @csrf
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Nhập mật khẩu hiện tại</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name="oldPass" class="body-user-display-input"type="password" value="">
                            @error('oldPass')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                          
                        
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Nhập mật khẩu mới</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name="password" class="body-user-display-input"type="password" value="">
                            @error('password')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Nhập lại mật khẩu</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name = "confirmPass" class="body-user-display-input"type="password" value="">
                            @error('confirmPass')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                        </tr>
                        
                      
                    
                      </table>
                      <button type="submit" action= "{{route('handleUpdatePassword')}}" class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>

                    </form>

                </div>
                </div>
@endsection
