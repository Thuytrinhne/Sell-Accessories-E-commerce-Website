@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/choose-location.css')}}">
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
            <div class="location-list_containerPlus">
                <div class="location-list_container">
                    <h1 style="margin-bottom: 24px;">Thông tin nhận hàng</h1>
                    <!-- =============  location list  ============ -->
                    @foreach($listUserAddress as $item)
                    <div class="location-list">
                        <div class="location-tick">
                            @if($id==$item->id)
                            <input value ="{{$item->id}}" type="radio" name="location-info" id="location-info" checked>
                            @else                        
                            <input value = "{{$item->id}}" type="radio" name="location-info" id="location-info">

                            @endif
                        </div>
                        <div class="location-detailPlus">
                            <div class="location-detail">
                            <strong>{{$item->full_name}} </strong>
                            - {{$item->phone}}
                            </div>
                            <div class="area">
                            {{$item->city}}, {{$item->district}}, {{$item->village}}, {{$item->detail_address}}
                            </div>
                        </div>

                        <a href="">Sửa</a>
                    </div>
                    @endforeach
                    <!-- =============  end list  ============ -->
                    
                   
                </div>

                <div class="location-add">
                    <div class="location-add_container">
                        <a href="{{route('add-location-checkout')}}">
                            <i class="fa-solid fa-circle-plus" style="margin-right: 2px;"></i>
                            Thêm địa chỉ
                        </a>
                    </div>
                </div>
                <div >
                    <a class="body-footer-seemore" href="#" onclick="generateURLBack(event)" >TRỞ LẠI</a>
                    <a class="body-footer-seemore" href="#" onclick="generateURL(event)">TIẾP TỤC</a>

                </div>
            </div>

         
        </div>
    </div>
    </div>
    <script>
                    var idUserAddressChoosed = document.querySelector('input[name="location-info"]:checked').value;
                    document.cookie = "idUserAddressChoosed=" + encodeURIComponent(idUserAddressChoosed) + "; path=/; expires=Thu, 01 Jan 2024 00:00:00 UTC;"
                    function generateURL(event) {
                        event.preventDefault()
                        var idUserAddress = document.querySelector('input[name="location-info"]:checked').value;
                        var url = "{{ route('handle-choose-location-checkout', ['id' => '14']) }}";
                        url = url.replace('14',idUserAddress);
                        window.location.href = url;
                        
                   
                    }
                    function generateURLBack(event) {
                        event.preventDefault()
                        var idUserAddress = document.querySelector('input[name="location-info"]:checked').value;
                        var url = "{{ route('handle-choose-location-checkout', ['id' => '14']) }}";
                        url = url.replace('14',idUserAddressChoosed);
                        window.location.href = url;
                        
                   
                    }
                    
                    
                        
    </script>
@endsection