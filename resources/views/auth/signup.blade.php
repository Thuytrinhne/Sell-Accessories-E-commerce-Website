@extends('layouts.auth')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if(session('Expired'))
            <script>
                Swal.fire({
                icon: "error",
                title: "{{ session('Expired') }}",
                text: "Bạn vui lòng kiểm tra lại nhé",
                });
            </script>
            @endif
            @if (session('Wrong'))
                <script>
                Swal.fire({
                icon: 'error',
                title: '{{ session('Wrong') }}',
                text: 'Bạn vui lòng kiểm tra lại nhé',
                })

                </script>
            @endif
           @if(session('sendOTPSuccess'))
           <div class="alert alert-success">
                <h4 style="text-align: center;">{{ session('sendOTPSuccess') }}</h4>
            </div>
           @endif
        <div class="signup">
        <!-- ================ signup header ================ -->
        <div class="signup_header">
            <div class="signup_logocontainer" >
                <a href="" ><img src="./Assets/Images/hippo-logo.png" alt="" style="height: 48px;"></a>
                <p class="signin_login-text">Đăng ký</p>

            </div>
            <a href="" style="color: #e05994; font-size: 16px;">Bạn cần giúp đỡ?</a>
        </div>
        <!-- ================ signup body ================ -->
        <div class="signup_body">
            <img src="./Assets/Images/background-signup.jpg" alt="" style="height:470px;">
            <div class="signup_body-form" >
                <div class="signup_body-form-container">
                    <h2 style="margin-bottom: 18px; font-size: 24px;">Đăng ký</h2>
                    <form class="postUser" action="{{route('postUser')}}" method="POST">
                        @csrf
                            <div class="signup_body-input">
                                <!-- <label for="" style="margin-bottom: 6px;">Số điện thoại hoặc địa chỉ email</label>  <br> -->
                                @if(session('sendOTP'))
                                <input id="emailInput" name="email" type="text" placeholder="Số diện thoại hoặc email" value="{{ session('sendOTP')}}"><br>
                                
                                @else 
                                <input id="emailInput" name="email" type="text" placeholder="Số diện thoại hoặc email" value="{{ old('email') }}"><br>
                                @endif
                                @error('email')
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="signup_body-input verified">
                                <!-- <label for="" style="margin-bottom: 6px;">Nhập mã xác thực</label>  <br> -->
                                <input name="otp" type="text" placeholder="Nhập mã xác thực 6 số"  value="{{ old('otp') }}"><a onclick="generateURL()" href="#">Lấy mã</a><br>
                                @error('otp')
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                            </div>
                    
                    <script>
                    function generateURL() {
                        var email = document.getElementById("emailInput").value;
                        var url = "{{ route('sendOTP', ['email' => '14']) }}";
                        url = url.replace('14',email);
                        window.location.href = url;
                        }
                   
                        {
                            var seconds = 30;
                            var minutes = 1;

                            var timer = setInterval(() => {

                                if(minutes < 0){
                                    $('.time').text('');
                                    clearInterval(timer);
                                }
                                else{
                                    let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                                    let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                                    $('.time').text(tempMinutes+':'+tempSeconds);
                                }

                                if(seconds <= 0){
                                    minutes--;
                                    seconds = 59;
                                }

                                seconds--;

                            }, 1000);
                        }
                    </script>
                                    
                        <div class="signup_body-input">
                            <!-- <label for="" style="margin-bottom: 6px;">Nhập mật khẩu</label>  <br> -->
                            <input  name="password" type="password" placeholder="Nhập mật khẩu từ 6-32 kí tự" value="{{ old('password') }}"><br>
                            @error('password')
                                <span class="msg-error">{{$message}}</span>
                             @enderror
                        </div>

                        <div class="signup_body-input">
                            <!-- <label for="" style="margin-bottom: 6px;">Nhập mật khẩu</label>  <br> -->
                            <input name="full_name" type="text" placeholder="Họ tên" value ="{{ old('full_name') }}">
                            @error('full_name')
                            <span class="msg-error">{{$message}}</span>
                            @enderror
                            <br>
                        </div>

                        <div class="gender">
                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="sex" type="radio" value="0" {{ old('sex') == '0' ? 'checked' : '' }} />Nam
                            </div>

                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="sex" type="radio" value="1" {{ old('sex') == '1' ? 'checked' : '' }} />Nữ
                            </div>

                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="sex" type="radio" value="2" {{ old('sex') == '2' ? 'checked' : '' }}/>Khác
                            </div>

                            @error('gender')
                            <br>
                            <span class="msg-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="DayOfBirth">
                            <select name="DD" id="DD">
                                <option value="">Ngày</option>
                                <option value="1" {{ old('DD') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('DD') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('DD') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('DD') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('DD') == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('DD') == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ old('DD') == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ old('DD') == '8' ? 'selected' : '' }}>8</option>
                                <option value="9" {{ old('DD') == '9' ? 'selected' : '' }}>9</option>
                                <option value="10" {{ old('DD') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('DD') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('DD') == '12' ? 'selected' : '' }}>12</option>
                                <option value="13" {{ old('DD') == '13' ? 'selected' : '' }}>13</option>
                                <option value="14" {{ old('DD') == '14' ? 'selected' : '' }}>14</option>
                                <option value="15" {{ old('DD') == '15' ? 'selected' : '' }}>15</option>
                                <option value="16" {{ old('DD') == '16' ? 'selected' : '' }}>16</option>
                                <option value="17" {{ old('DD') == '17' ? 'selected' : '' }}>17</option>
                                <option value="18" {{ old('DD') == '18' ? 'selected' : '' }}>18</option>
                                <option value="19" {{ old('DD') == '19' ? 'selected' : '' }}>19</option>
                                <option value="20" {{ old('DD') == '20' ? 'selected' : '' }}>20</option>
                                <option value="21" {{ old('DD') == '21' ? 'selected' : '' }}>21</option>
                                <option value="22" {{ old('DD') == '22' ? 'selected' : '' }}>22</option>
                                <option value="23" {{ old('DD') == '23' ? 'selected' : '' }}>23</option>
                                <option value="24" {{ old('DD') == '24' ? 'selected' : '' }}>24</option>
                                <option value="25" {{ old('DD') == '25' ? 'selected' : '' }}>25</option>
                                <option value="26" {{ old('DD') == '26' ? 'selected' : '' }}>26</option>
                                <option value="27" {{ old('DD') == '27' ? 'selected' : '' }}>27</option>
                                <option value="28" {{ old('DD') == '28' ? 'selected' : '' }}>28</option>
                                <option value="29" {{ old('DD') == '29' ? 'selected' : '' }}>29</option>
                                <option value="30" {{ old('DD') == '30' ? 'selected' : '' }}>30</option>
                                <option value="31" {{ old('DD') == '31' ? 'selected' : '' }}>31</option>

                            </select>
        
                            <select name="MM" id="MM">
                                <option value="" >Tháng</option>
                                <option value="1" {{ old('MM') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('MM') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('MM') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('MM') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('MM') == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('MM') == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ old('MM') == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ old('MM') == '8' ? 'selected' : '' }}>8</option>
                                <option value="9" {{ old('MM') == '9' ? 'selected' : '' }}>9</option>
                                <option value="10" {{ old('MM') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('MM') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('MM') == '12' ? 'selected' : '' }}>12</option>
                            </select>
        
                            <select name="YY" id="YY">
                            <option value="" >Năm</option>

                            @for ($year = 1950; $year <= date('Y'); $year++)
                                <option value="{{ $year }}" {{ old('YY') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                                
                            </select>
                            @error('birth')
                            <br>
                            <span class="msg-error">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="policy">
                            <input type="checkbox" name="policy" id="policy"  {{ old('policy') ? 'checked' : ''}} > 
                            Tôi đã đọc và đồng ý với <a href="">Điều kiện giao dịch chung</a> 
                            và <a href="">Chính sách bảo mật thông tin</a> của T&P 
        
                            @error('policy')
                            <br>
                            <span class="msg-error">{{$message}}</span>
                            @enderror
                        </div>
                      
                        <div class="signup_button">
                            <button type="submit" class="signup_btn" onclick="sigUpOnclick()">Đăng ký</button><br>
                        </div>
                    </form>
                       
                    <div class="signup_have-an-account">
                        <p>Bạn đã có tài khoản? <a href="signin.html">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection