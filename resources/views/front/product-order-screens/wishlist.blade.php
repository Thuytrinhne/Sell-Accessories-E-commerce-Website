@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/wishlist.css')}}">
@endsection;
@section('body-main')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- code trinh  -->
@if (session ('deleteSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('deleteSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif
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
                    <a href="{{route('wishlist.delete',  ['idWishlistItem' => $item->id])}}" class="cancel_btn">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                </div>
                @if(($item->product_id == -1))
                <img src="{{$item->image}}" alt="">
                @else
                <img src="{{$item->default_image}}" alt="">
                @endif
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
                    <p class="product_name">In Stock</p>
                </div>
                @endif
                
                @if(($item->product_id == -1))
                <div class="product_info">
                    <form action="{{route('addToCart')}}" method="POST">
                        @csrf
                        <input value="{{$item->product_item_id }}" name="product_item_id" type="text" hidden>
                    <button type="submit" class="product_name" >Thêm vào giỏ hàng</button>
                    
                    </form>
                </div>
                @else

                <div class="product_info">
                    <a href="{{route('products.show', ['id' => $item->product_id])}}"
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