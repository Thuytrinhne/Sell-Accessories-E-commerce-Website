@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/account.css')}}">
<link rel="stylesheet" href="{{asset('Assets/css/front/add-address.css')}}">

@endsection;
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session ('updateAddressSuccess'))

<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{{session('
    updateAddressSuccess ')}}',
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
              <td class="body-user-display-td-label">
                <label for="text">Tên</label>
              </td>
              <td class="body-user-display-td-input">
                <input name="full_name" class="body-user-display-input" type="text" value="{{ $user_address[0]->full_name}}">
                @error('full_name')
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
                <input name="phone" class="body-user-display-input" type="phone" value="{{ $user_address[0]->phone}}">
                @error('phone')
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
                <select id="city-select" class="body-user-display-input" name="city">
                  <option value="">Chọn khu vực</option>

                </select>
                @error('city')
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
                <select id="district-select" class="body-user-display-input" name="district">
                  <option value="">Chọn khu vực</option>

                </select>
                @error('district')
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
                <select id="ward-select" class="body-user-display-input" name="village">
                  <option value="">Chọn khu vực</option>

                </select>
                @error('village')
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
                <input name="detail_address" class="body-user-display-input" type="text" value="{{$user_address[0]->detail_address}}">
                @error('confirmPass')
                <br>
                <span class="msg-error">{{$message}}</span>
                @enderror
              </td>

          </table>
          @if($user_address[0]->is_default == "0")

          <input class="checkbox-defaultAddress" type="checkbox" name="default" value="1" {{ $user_address[0]->is_default == '1' ? 'checked' : '' }}>
          <span class="checkbox-defaultAddress">Đặt làm địa chỉ mặc định</span>
          <p>Hasaki sẽ liên hệ số điện thoại này để giao hàng đến bạn và kiểm tra tình trạng <br> đơn hàng, đổi trả hàng khi cần.</p>

          @endif
        </div>
      </div>
      <div class="btnChangeContainer">
        <input type="hidden" name="id" value="{{$id}}">

        <button type="submit" class="body-footer-seemore btn-red btn-bottom">LƯU THAY ĐỔI</button>
      </div>
      <br>
    </form>



  </div>
</div>
</div>

<script>
  window.onload = function() {
    $.ajax({
      url: "https://provinces.open-api.vn/api/p/",
      type: "get",
      dataType: "json",
      success: function(res) {
        handleProvinceData(res);
      },
    });
  };

  function handleProvinceData(data) {
    // Xử lý dữ liệu trả về từ API ở đây
    // load danh sách tỉnh lên thẻ select
    var city = "{{ $user_address[0]->city }}";

    var selectElement = document.getElementById("city-select");

    data.forEach(function(item) {
      var option = document.createElement("option");
      option.value = item.code + "-" + item.name; // 1-Hà Nội
      option.text = item.name;
      if (option.text == city) {
        option.selected = true;
        loadListDistrict(item.code);
      }
      selectElement.appendChild(option);
    });
  }
  // click chọn 1 tỉnh
  var selectElement = document.getElementById("city-select");
  selectElement.addEventListener("change", function() {
    var selectedValue = this.value;
    var parts = selectedValue.split("-");

    loadListDistrict(parts[0]);
  });

  function loadListDistrict(code) {
    console.log(code);
    // Thực hiện hành động dựa trên giá trị được chọn
    $.ajax({
      url: "https://provinces.open-api.vn/api/p/" + code + "?depth=2",
      type: "get",
      dataType: "json",
      success: function(res) {
        handleDistrictData(res);
      },
    });
  }

  function handleDistrictData(data) {
    var district = "{{ $user_address[0]->district }}";
    var selectElement = document.getElementById("district-select");
    selectElement.innerHTML = "";
    // tạo option chọn khu vực
    var option = document.createElement("option");
    option.value = "";
    option.text = "Chọn khu vực";
    selectElement.appendChild(option);

    data.districts.forEach(function(item) {
      var option = document.createElement("option");
      option.value = item.code + "-" + item.name;
      option.text = item.name;
      if (option.text == district) {
        option.selected = true;
        loadListWards(item.code);
      }
      selectElement.appendChild(option);
    });
  }
  // click chọn 1 huyện
  var selectElement = document.getElementById("district-select");
  selectElement.addEventListener("change", function() {
    var selectedValue = this.value;
    var parts = selectedValue.split("-");

    loadListWards(parts[0]);
  });

  function loadListWards(code) {
    console.log(code);
    // Thực hiện hành động dựa trên giá trị được chọn
    $.ajax({
      url: "https://provinces.open-api.vn/api/d/" + code + "?depth=2",
      type: "get",
      dataType: "json",
      success: function(res) {
        handleWardsData(res);
      },
    });
  }

  function handleWardsData(data) {
    var ward = "{{ $user_address[0]->village }}";

    var selectElement = document.getElementById("ward-select");
    selectElement.innerHTML = "";
    // tạo option chọn khu vực
    var option = document.createElement("option");
    option.value = "";
    option.text = "Chọn khu vực";
    selectElement.appendChild(option);

    data.wards.forEach(function(item) {
      var option = document.createElement("option");
      option.value = item.name;
      option.text = item.name;
      if (option.text == ward) {
        option.selected = true;
      }
      selectElement.appendChild(option);
    });
  }
</script>
@endsection