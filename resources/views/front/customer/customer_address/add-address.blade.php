@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}">
<link rel="stylesheet" href="{{asset('Assets/css/front/add-address.css')}}">

@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session ('addAddressSuccess'))

<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{{session('
    addAddressSuccess ')}}',
    showConfirmButton: false,
    timer: 2000
  })
</script>

@endif

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
              <td class="body-user-display-td-label">
                <label for="text">Tên</label>
              </td>
              <td class="body-user-display-td-input">
                <input name="full_name" class="body-user-display-input" type="text" value="">
                @error('oldPass')
                <br>
                <span class="msg-error">{{$message}}</span>
                @enderror
              </td>


            </tr>

            <tr class="body-user-display-tr">
              <td class="body-user-display-td-label">
                <label for="text">Số điện thoại</label>
              </td>
              <td class="body-user-display-td-input">
                <input name="phone" class="body-user-display-input" type="phone" value="">
                @error('password')
                <br>
                <span class="msg-error">{{$message}}</span>
                @enderror
              </td>
            </tr>
            
            <tr class="body-user-display-tr">
              <td class="body-user-display-td-label">
                <label for="text">Tỉnh/ Thành phố</label>
              </td>
              <td class="body-user-display-td-input">
                <select class="body-user-display-input" name="city" required>
                  <option value="">Chọn khu vực</option>
                  <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                  <option value="Hà Nội">Hà Nội</option>
                  <option value="Cà Mau">Cà Mau</option>
                </select>
                @error('oldPass')
                <br>
                <span class="msg-error">{{$message}}</span>
                @enderror
              </td>


            </tr>

            <tr class="body-user-display-tr">
              <td class="body-user-display-td-label">
                <label for="text">Quận/ Huyện</label>
              </td>
              <td class="body-user-display-td-input">
                <select class="body-user-display-input" name="district" required>
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


          </table>
        </div>
        <div>
          <table class="body-user-display-tbl">
            

            <tr class="body-user-display-tr">
              <td class="body-user-display-td-label">
                <label for="text">Phường/ Xã</label>
              </td>
              <td class="body-user-display-td-input">
                <select class="body-user-display-input" name="village" required>
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
              <td class="body-user-display-td-label">
                <label for="text">Địa chỉ nhận hàng</label>
              </td>
              <td class="body-user-display-td-input">
                <input name="detail_address" class="body-user-display-input" type="text" value="">
                @error('confirmPass')
                <br>
                <span class="msg-error">{{$message}}</span>
                @enderror
              </td>

          </table>
          <input class="checkbox-defaultAddress" type="checkbox" name="default" value="1">
          <span class="checkbox-defaultAddress">Đặt làm địa chỉ mặc định</span>
      <p>Hasaki sẽ liên hệ số điện thoại này để giao hàng đến bạn và kiểm tra tình trạng đơn hàng, đổi trả hàng khi cần.</p>

        </div>
      </div>

      <div class="btnChangeContainer">
        <button type="submit" class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>
        <br>
    </form>



  </div>
</div>
</div>
@endsection