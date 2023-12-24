@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}"> 
<link rel="stylesheet" href="{{asset('Assets/css/front/add-address.css')}}"> 

@endsection;
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<div class="body-user-display-myaccount">
                <div class="body-user-display-header1">
                  <div class="body-user-display-title1">Thêm Địa Chỉ Mới</div>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container1 body-user-display-container2">
                    <form class="body-user-display-frm" action="{{route('front.handle-add-address')}}" method="POST">
                      @csrf
                      <div class="add-address-container">
                        <div class="add-address-section1">
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Tên</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name="full_name" class="body-user-display-input"type="text" value="">
                            @error('full_name')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                          
                        
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Số điện thoại</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name="phone" class="body-user-display-input"type="phone" value="">
                            @error('phone')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                        </tr>
                        

                    
                      </table>
                      <p>Hasaki sẽ liên hệ số điện thoại này để giao hàng đến bạn và kiểm tra tình trạng <br> đơn hàng, đổi trả hàng khi cần.</p>
                      </div>
                      <div>
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Tỉnh/ Thành phố</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <select  id="city-select"  class="body-user-display-input" name="city"  >
                                <option value="">Chọn khu vực</option>
                                
                            </select>
                            @error('city')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                            @enderror
                          </td>
                          
                        
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Quận/ Huyện</label>
                          </td>
                          <td class="body-user-display-td-input">
                          <select id="district-select" class="body-user-display-input" name="district"  >
                                <option value="">Chọn khu vực</option>
                                
                            </select>
                            @error('district')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Phường/ Xã</label>
                          </td>
                          <td class="body-user-display-td-input">
                          <select id="ward-select"  class="body-user-display-input" name="village"  >
                                <option value="">Chọn khu vực</option>
                                
                            </select>
                            @error('village')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                        </tr>
                        
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Địa chỉ nhận hàng</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name = "detail_address" class="body-user-display-input"type="text" value="">
                            @error('detail_address')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                       
                      </table>
                      <input class="checkbox-defaultAddress" type="checkbox" name="default" value ="1">
                      <span  class="checkbox-defaultAddress">Đặt làm địa chỉ mặc định</span>
                      </div>
                      </div>
                      <div class="btnChangeContainer">
                      <button type="submit" class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>
                      <br>
                    </form>
                    
                     
                      
                    </div>
                </div>
                </div>

<!-- link js -->
  <script src="{{asset('Assets/js/address.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
