@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/not-found.css')}}">
@endsection
@section('body-main')
<div class="container-fluid grid container-fluid--margin">
        <div class="body-title-notFound">
             <!-- begin breadcrumbs -->
             <div class="body-title_breadcrumbs">            
                    <div class="breadcrumbs" >
                        <a href="" class="breadcrumbs__a">Trang chủ</a>
                        <spand class="breadcrumbs__slash" >/</spand>
                        <a href="" class="breadcrumbs__a">Shop </a>
                        <spand class="breadcrumbs__slash">/</spand>
                        <a href="" class="breadcrumbs__a-active">Kết quả tìm kiếm cho:</a>
                        <a href="" class="breadcrumbs__a">" "</a>
                    </div>
            </div>
            <!-- end breadcrumbs -->
            <h1 class="body-title-content">Kết quả tìm kiếm: "{{ $search}}"</h1>
        </div>

        <div class="row body-content">
            <span class="body-content-title">
                Không tìm thấy sản phẩm nào phù hợp với tìm kiếm của bạn.
            </span>
            <img class="body-content-img" src="https://hippo.vn/wp-content/themes/babystreet/image/search-no-results.jpg" alt="">
            <a href="{{route('products.search')}}">
            <button action="">Trở về nơi bắt đầu.?</button>
        </a>
        </div>

        
    </div>

    </div>
@endsection