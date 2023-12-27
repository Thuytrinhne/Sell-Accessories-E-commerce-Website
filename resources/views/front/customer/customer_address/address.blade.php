@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/address.css')}}">
@endsection;
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
@if (session ('deleteAddressSuccess'))

<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: '{{session('
    deleteAddressSuccess ')}}',
    showConfirmButton: false,
    timer: 2000
  })
</script>

@endif


<div class="body-user-display-addressUser">
  <div class="body-user-display-header-address">
    <div class="body-user-display-title1 body-user-display-title3">Sổ địa chỉ</div>
    <div class="body-user-display-listAddress">
      <!-- address default  -->
      @if ($addressDefault != null)
      <div class="body-user-display-listAddress-border">

        <div class="body-user-display-listItem body-user-display-listItem-main">
          <div class="body-user-display-address-infor" value="{{$addressDefault->id}}">
            <strong>{{$addressDefault->full_name}}</strong>- {{$addressDefault->phone}}
          </div>
          <?php
          $detailAddressDefault = $addressDefault->city . ', ' . $addressDefault->district . ', ' . $addressDefault->village . ', ' . $addressDefault->detail_address;
          ?>


          <div class="body-user-display-address-detail">{{$detailAddressDefault}}

          </div>
          <span class="body-user-display-address-edit">
            <a class="body-user-display-address-link" href="{{route('front.edit-address', ['id' => $addressDefault->id])}}">Chỉnh sửa
            </a>
          </span>
        </div>
      </div>
      @endif
      <!-- address not default -->
      @foreach($addressNotDefault as $item)
      <div class="body-user-display-listAddress-border">
        <div class="body-user-display-listItem">
          <div class="body-user-display-address-infor" value="{{$item->id}}">
            <strong>{{$item->full_name}}</strong>- {{$item->phone}}
          </div>
          <?php
          $detailAddressNotDefault = $item->city . ', ' . $item->district . ', ' . $item->village . ', ' . $item->detail_address;
          ?>
          <div class="body-user-display-address-detail">{{$detailAddressNotDefault}}

          </div>
          <span class="body-user-display-address-edit">
            <a class="body-user-display-address-link" href="{{route('front.edit-address', ['id' => $item->id])}}">Chỉnh sửa

            </a>
            <a href="{{route('front.handle-delete-address', ['id' => $item->id])}}">
              <img src="https://hasaki.vn/images/graphics/icon_delete.gif" alt="">
            </a>
          </span>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>
<div class="body-user-display-footer">
  <div>Bạn muốn giao hàng đến địa chỉ khác?</div>
  <a href="{{route('front.add-address')}}"><button class="body-footer-seemore btn-red">Thêm địa chỉ mới</button></a>
</div>
</div>

@endsection