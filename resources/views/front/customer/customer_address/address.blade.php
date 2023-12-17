@extends('front.customer.index')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/address.css')}}"> 
@endsection;
@section('content')
<div class="body-user-display-addressUser">
                <div class="body-user-display-header-address">
                  <div class="body-user-display-title1 body-user-display-title3">Sổ địa chỉ</div>
                  <div class="body-user-display-listAddress">
                    <!-- address default  -->
                    <div class="body-user-display-listAddress-border">
                   
                      <div class="body-user-display-listItem body-user-display-listItem-main">
                        <div class="body-user-display-address-infor" value="{{$addressDefault->id}}">
                          <strong>{{$addressDefault->full_name}}</strong>- {{$addressDefault->phone}}
                        </div>
                        <?php
                          $detailAddressDefault = $addressDefault->city . ', '. $addressDefault->district . ', '.$addressDefault->village .', '.$addressDefault->detail_address;
                        ?>


                        <div class="body-user-display-address-detail">{{$detailAddressDefault}}
  
                        </div>
                        <span class="body-user-display-address-edit">
                          <a class="body-user-display-address-link" href="">Chỉnh sửa
                          </a>
                        </span>
                      </div>
                    </div>
                    <!-- address not default -->
                    @foreach($addressNotDefault as $item)
                    <div class="body-user-display-listAddress-border">
                      <div class="body-user-display-listItem">
                        <div class="body-user-display-address-infor" value= "{{$item->id}}">
                          <strong>{{$item->full_name}}</strong>- {{$item->phone}}
                        </div>
                        <?php
                          $detailAddressNotDefault = $item->city . ', '. $item->district . ', '.$item->village .', '.$item->detail_address;
                        ?>
                        <div class="body-user-display-address-detail">{{$detailAddressNotDefault}}
  
                        </div>
                        <span class="body-user-display-address-edit">
                          <a class="body-user-display-address-link" href="">Chỉnh sửa
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
             