@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/wishlist.css')}}">
@endsection;
@section('body-main')
<div class="checkout">
        <div class="checkout_container">
            <div class="backhome" style="font-size: 12px;">
                <a href="">HOME</a>
                /
                <a href="">WISHLIST</a>
            </div>
    
            <h1>WISHLIST</h1>
        </div>
    </div>



    <div class="checkout_detail">
        
        <div class="product_box-container">
            <i class="fa-regular fa-face-grin-hearts" style="" ></i>
            <h1>
                
                MY WISHLIST
            </h1>
            <!-- ===============   product box  =============== -->
            @foreach ($product as $item)

          
            <div class="product_box">
                <div class="cancel_button">
                    <button href="" class="cancel_btn">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
                <img src="./Assets/Images/product_img.jpeg" alt="">
                <div class="product_info">
                    <a class="product_name">{{$item->name_product}}</a>
                </div>
                
                <div class="product_info">
                    <p class="product_name">{{$item->price}}</p>
                </div>
                @if($item->quantity>0)
                <div class="product_info">
                    <p class="product_name">In Stock</p>
                </div>
                @else  
                <div class="product_info">
                    <p class="product_name">Out Of Stock</p>
                </div>
                @endif
                
                @if(!($item->product_item_id == NULL))
                <div class="product_info">
                    <a class="product_name" >Thêm vào giỏ hàng</a>
                </div>
                @else
                <div class="product_info">
                    <a href=""
                     class="product_name">
                     Lựa chọn các tùy chọn</a>
                </div>
                @endif

            </div>
            @endforeach
            <!-- ===============   product box  =============== -->
        </div>
    </div>
@endsection