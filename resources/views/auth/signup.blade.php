@extends('layouts.auth')
@section('content')

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
                    <form action="{{route('postUser')}}" method="POST">
                        @csrf
                        
                            <div class="signup_body-input">
                                <!-- <label for="" style="margin-bottom: 6px;">Số điện thoại hoặc địa chỉ email</label>  <br> -->
                                <input id="emailInput" name="email" type="text" placeholder="Số diện thoại hoặc email"><br>
                            
                            </div>
                            
                            <div class="signup_body-input verified">
                                <!-- <label for="" style="margin-bottom: 6px;">Nhập mã xác thực</label>  <br> -->
                                <input type="text" placeholder="Nhập mã xác thực 6 số" ><a onclick="generateURL()" href="#">Lấy mã</a><br>
                                
                            </div>
                    <script>
                    function generateURL() {
                        var email = document.getElementById("emailInput").value;
                        var url = "{{ route('sendOTP', ['email' => '14']) }}";
                        url = url.replace('14',email);
                        window.location.href = url;
                    }
                </script>
                                    
                        <div class="signup_body-input">
                            <!-- <label for="" style="margin-bottom: 6px;">Nhập mật khẩu</label>  <br> -->
                            <input  name="password" type="password" placeholder="Nhập mật khẩu từ 6-32 kí tự"><br>
                        </div>

                        <div class="signup_body-input">
                            <!-- <label for="" style="margin-bottom: 6px;">Nhập mật khẩu</label>  <br> -->
                            <input name="full_name" type="text" placeholder="Họ tên"><br>
                        </div>

                        <div class="gender">
                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="gender" type="radio" value="Nam" />Nam
                            </div>

                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="gender" type="radio" value="Nam" />Nữ
                            </div>

                            <div class="gender-tick" >
                                <input style="margin-right: 5px;" name="gender" type="radio" value="Nam" />Khác
                            </div>
                        </div>

                        <div class="DayOfBirth">
                            <select name="DD" id="DD">
                                <option value="">Ngày</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select>
        
                            <select name="MM" id="MM">
                                <option value="">Tháng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
        
                            <select name="YY" id="YY">
                                <option value="">Năm</option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                
                            </select>
                        </div>

                        <div class="policy">
                            <input type="checkbox" name="policy" id="policy"> 
                            Tôi đã đọc và đồng ý với <a href="">Điều kiện giao dịch chung</a> 
                            và <a href="">Chính sách bảo mật thông tin</a> của T&P

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