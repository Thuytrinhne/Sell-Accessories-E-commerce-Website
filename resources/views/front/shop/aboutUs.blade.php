@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/about.css')}}">
@endsection
@section('body-main')
<div class="container">
                 <!-- begin breadcrumbs -->
                <div class="row">
                    <div class="span16">
                        <div class="breadcrumbs" >
                            <a href="" class="breadcrumbs__a">Trang chủ</a>
                            <spand class="breadcrumbs__slash" >/</spand>
                            <a href="" class="breadcrumbs__a breadcrumbs__a--active">Về chúng tôi</a>
                        </div>
                    </div>
                </div>
                 <!-- end breadcrumbs -->
                
                <div class="row">
                    <h1>
                        Về chúng tôi
                    </h1>
                </div>

                <div class="row">
                    <img src="https://mossvn.com/images/Profile-cty_page-0006.jpg" alt="">
                    <img src="https://mossvn.com/images/Profile-cty_page-0007.jpg" alt="">
                    <img src="https://mossvn.com/images/Profile-cty_page-0004.jpg" alt="">
                    <img src="https://mossvn.com/images/Profile-cty_page-0005.jpg" alt="">
                </div>

          </div>
@endsection