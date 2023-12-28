@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/add-location.css')}}"> 
@endsection;
@section('body-main')
<div class="checkout-main">
<div class="checkout">
        <div class="checkout_container">
            <div class="backhome" style="font-size: 12px;">
                <a href="">HOME</a>
                /
                <a href="">CHECKOUT</a>
            </div>
    
            <h1>CHECKOUT</h1>
        </div>
    </div>

    <div class="checkout_detail">
        <div class="payment_info">
            <div class="info">
                <h1>Thêm địa chỉ mới</h1>
                <form class="form_info" action="">
                    <div class="info_input">
                        <label for="">Họ và tên</label><br>
                        <input type="text">
                    </div>

                    <div class="info_input">
                        <label for="">Số điện thoại <span style="color: red;">*</span></label><br>
                        <input type="tel" required>
                    </div>

                    <div class="info_input">
                        <label for="">Địa chỉ email</label><br>
                        <input type="email">
                    </div>

                    <div class="Location">
                        <div class="info_input">
                            <label for="">Vui lòng chọn khu vực <span style="color: red;">*</span></label><br>
                            <select name="area" id="area" required>
                                <option value="">Chọn khu vực</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                        </div>

                        <div class="info_input">
                            <label for="">Phường xã <span style="color: red;">*</span></label><br>
                            <select name="area" id="area" required>
                                <option value="">Chọn phường xã</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="info_input">
                        <label for="">Số nhà, tên đường <span style="color: red;">*</span></label><br>
                        <input type="text" required>
                    </div>

                    <div class="info_input default-address" >
                        <input type="radio" required >
                        <label for="">Đặt làm địa chỉ mặc định</label><br>
                    </div>
                    <div>
                    <button type="" class="addLocation-btn">
                        Trở lại 
                    </button>
                    <button type="submit" class="addLocation-btn">
                        Thêm địa chỉ 
                    </button>
                  
                    </div>
                </form>
               
                


            </div>
          
           
        </div>
       
    </div>

    </div>
@endsection