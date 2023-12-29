@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/wishlist.css')}}">
@endsection
@section('body-main')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- code trinh  -->
@if (session ('deleteSuccess'))

<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{session('
        deleteSuccess ')}}',
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
        <i class="fa-regular fa-face-grin-hearts"></i>
        <h1>

            MY WISHLIST
        </h1>
        <!-- ===============   product box  =============== -->
        <div class="product_box">
            <div class="product_box1">
                
                <div class="cancel_button">
                    <a href="" class="cancel_btn">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                </div>
                <img src="./Assets/Images/product_img.jpeg" alt="">
                
                
            </div>

            <div class="product_box2">

                <div class="product_info">
                    <a class="product_name">Cài tóc</a>
                </div>
                <div class="product_info">
                    <p class="product_name">30000</p>
                </div>



                <div class="product_info">
                    <p class="product_name">Out Of Stock</p>
                </div>



                <div class="product_info">
                    <a class="product_name">Thêm vào giỏ hàng</a>
                </div>
            </div>





        </div>
        <!-- ===============   product box  =============== -->
    </div>
</div>
@endsection