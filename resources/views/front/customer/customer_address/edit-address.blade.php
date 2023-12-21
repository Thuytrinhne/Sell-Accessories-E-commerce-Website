@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}"> 
<link rel="stylesheet" href="{{asset('Assets/css/front/add-address.css')}}"> 

@endsection;
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session ('addAddressSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('addAddressSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif

<div class="body-user-display-myaccount">
                <div class="body-user-display-header1">
                  <div class="body-user-display-title1">Chỉnh Sửa Địa Chỉ</div>
                </div>
                <hr class="body-user-display-line">
                <div class="body-user-display-container1 body-user-display-container2">
                    <form class="body-user-display-frm" action="{{route('front.handle-edit-address')}}" method="POST">
                      @csrf

                      <div class="add-address-container">
                        <div class="add-address-section1">
                      <table class="body-user-display-tbl">
                        <tr class="body-user-display-tr">
                          <td  class="body-user-display-td-label">
                            <label for="text">Tên</label>
                          </td>
                          <td class="body-user-display-td-input">
                            <input name="full_name" class="body-user-display-input"type="text" value="{{ $user_address[0]->full_name}}">
                            @error('oldPass')
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
                            <input name="phone" class="body-user-display-input"type="phone" value="{{ $user_address[0]->phone}}">
                            @error('password')
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
                            <select  class="body-user-display-input" name="city"  required>
                                <option value="">Chọn khu vực</option>
                                <option value="TP Hồ Chí Minh" {{ $user_address[0]->city == 'TP Hồ Chí Minh' ? 'selected' : '' }}>TP Hồ Chí Minh</option>
                                <option value="Hà Nội" {{ $user_address[0]->city == 'Hà Nội' ? 'selected' : '' }}>Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                            @error('oldPass')
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
                          <select  class="body-user-display-input" name="district"  required>
                                <option value="">Chọn khu vực</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                            @error('password')
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
                          <select  class="body-user-display-input" name="village"  required>
                                <option value="">Chọn khu vực</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Cà Mau">Cà Mau</option>
                            </select>
                            @error('confirmPass')
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
                            <input name = "detail_address" class="body-user-display-input"type="text" value="{{$user_address[0]->detail_address}}">
                            @error('confirmPass')
                            <br>
                                <span class="msg-error">{{$message}}</span>
                                @enderror
                          </td>
                       
                      </table>
                      <input class="checkbox-defaultAddress" type="checkbox" name="default" value ="1" {{ $user_address[0]->is_default == '1' ? 'checked' : '' }}>
                      <span  class="checkbox-defaultAddress">Đặt làm địa chỉ mặc định</span>
                      </div>
                      </div>
                      <div class="btnChangeContainer">
                      <input type="hidden" name="id" value="{{ $user_address[0]->id}}">

                      <button type="submit" class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>
                      </div>
                      <br>
                    </form>
                    
                     
                      
                    </div>
                </div>
                </div>
@endsection
