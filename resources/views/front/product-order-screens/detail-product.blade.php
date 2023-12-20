@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/product.css')}}">
@endsection
@section('body-main')
<div class="container">

  <!-- begin breadcrumbs -->
  <div class="row">
      <div class="span16">
          <div class="breadcrumbs" >
              <a href="" class="breadcrumbs__a">Trang chủ</a>
              <spand class="breadcrumbs__slash" >/</spand>
              <a href="" class="breadcrumbs__a">Shop </a>
              <spand class="breadcrumbs__slash">/</spand>
              <a href="" class="breadcrumbs__a">Phụ kiện tóc & Máy làm tóc</a>
              <spand class="breadcrumbs__slash">/</spand>
              <a href="" class="breadcrumbs__a">Kẹp tóc</a>
              <spand class="breadcrumbs__slash">/</spand>
              <a href="" class="breadcrumbs__a breadcrumbs__a--active">Kẹp tóc nơ</a>
          </div>
      </div>
  </div>
  <!-- end breadcrumbs -->

  <!-- beign content -->
  <div class="container">
      <div class="row" >

          <!-- begin gallery -->
          <div class="col-5 row-gallery" id="productImage">
              <div class="row">
                      <img id="current-image" src="{{$product->default_image}}" alt="">
              </div>
              <div class="row" >
                  <div class="col-2-4">
                      <img id ="image-thumbs"src="Assets/Images/keptoc2.jpg" alt="" id="image-thumbs">
                  </div>
                  <div  class="col-2-4">
                      <img id ="image-thumbs" src="Assets/Images/keptoc2.jpg" alt="" id="image-thumbs">
                  </div>
                  <div class="col-2-4">
                      <img id ="image-thumbs" src="Assets/Images/keptoc2.jpg" alt="" id="image-thumbs">
                  </div>
                  <div class="col-2-4">
                      <img id ="image-thumbs" src="Assets/Images/keptoc2.jpg" alt="" id="image-thumbs">
                  </div>    
                  
              </div>                     
          </div>
          <!-- end gallery -->

          <!-- beign info -->
          <div class="col-7" >
              <div class="row info-header">
                  <h1 class="info-header__h1">
                    {{$product->name_product}}
                  </h1>
              </div>

              <div class="row info-price" id = "price">
                  <div class="col-1 info-price--default">
                      <p>{{$product->price}}</p>
                  </div>
                  <div class="col-2 info-price--sale">{{$product->discount_price}}</div>
                 
                  <div class="col-7"></div>
              </div>
              
              <div class="row info__color">
                  <h4>{{$product->name}}</h4>
              </div>
              <div class="row">  
                @foreach($variation_value as $value)
                <button  class="color-option" 
                                    style="background-color: {{$value->value}}; color: {{$value->value}} "
                                    onclick="showProducts('{{$value->id}}')"> 
                              {{$value->value}} 
                            </button>
                @endforeach
              </div>



              <div class="row info-category" style="margin-top: 20px;">
                  <h4>Category: 
                      <a href="" class="info-category-link">{{$product->name_category}}</a>
                  </h4>
              </div>

              <div class="row">
                  <h4>SKU: N/A</h4>
              </div>


              <div class="row info-whistlist" style="margin: 20px 0px;">
                  <div class="col-5 info-whistlist-wrapper">                 
                      <button onclick="addToCart()" class="info-whistlist-btn" > 
                        <i class="fa fa-heart" aria-hidden="true">  Add to whistlist</i>
                      </button>
                  </div>
              </div>

              <div class="row info-buy">           
                  <div class="col-6 ">
                      <button class="info-buy__btn">Thêm vào giỏ hàng</button>
                  </div>
                  <div class="col-6">
                      <button class="info-buy__btn">Mua ngay sản phẩm</button>
                  </div>
              </div>

          </div>                  
          <!-- beign info -->


          <!-- begin descipton -->
           <div class="row tab" >
              <ul class="tab-list">
                  <li class="tab-item">
                          <p class="tab-item__btn__p">
                              Mô tả
                          </p>
                  </li>

          </li>
                  
              </ul>

              

              <div class="tab-description">
                  <div class="row ">
                      <textarea name="description" 
                      id="description" 
                      cols="10" rows="5"
                      style="font-size:20px;"
                      disabled>
                      {{$product->description}}
                      </textarea>
                  </div>
              </div>
              
           </div>
          
          <!-- end descipton -->
           <div class="row product-related">
              <h2 style="color:mediumvioletred;line-height: 60px;">
                  Sản phẩm cùng mục - Related products
              </h2>
           </div>

           <div class="row">
            <div class="body-catogory grid">
              <div class="body-category-list" style="margin:0;">

             @foreach($relatedProduct as $item)
                    <div class="body-list__item" >
                      <div>
                            <a class="body-item-link" href="{{ route('products.show', ['id' => $item->id]) }}">
                              <img class="body-item-img" src="{{$item->default_image}}" alt="{{$item->name_product}}">
                            </a>
                      </div> 
                      
      
                      <div class="container">
                        <div class="element">
                          <div class="content">
                      <div class="body-item-links">
            
                          <a href="" class="body-links-detail">
                            <div class="body-circle body-circle--red">
                              <span class="material-symbols-outlined body-icon-white">
                                local_mall
                                </span>
                              </div>   
                            </a>  

                            <span href="" class="body-links-detail">
                              <div class="body-circle">
                                <button class="material-symbols-outlined body-icon-black body-icon-black--large" 
                                id="quickview" 
                                style="backgroud:none; border:none"
                                data-product-id="{{ $item->id }}">
                                  visibility
                                </button>    
                              </div>   
                            </span>  
                            
                              <a href="" class="body-links-detail">
                                <div class="body-circle">
                                  <i class="fa-regular fa-heart body-icon-black"></i>  
                                </div>   
                                </a>         
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach

              </div>
              <!-- <div class="body-category-nav">
                <button class="body-nav-btn" type="button">
                  <i class="fa-solid fa-angle-left body-nav-icon"></i>
                </button>
                  <button class="body-nav-btn btn-left" type="button">
                    <i class="fa-solid fa-angle-right body-nav-icon "></i>
                  </button>
              </div> -->
        </div> 
           </div>
         
  </div>
  <!-- end content -->

</div>
</div>  
<script>
   function showProducts(product_item_id) {
        $.ajax({
            url: '/get-images-by-value/' + product_item_id,
            type: 'GET',
            success: function(data) {
                console.log(data[0].image);
                // Xử lý dữ liệu trả về và hiển thị danh sách sản phẩm
                renderProducts(data);
            },
            error: function(error) {            
                console.log('lỗi');
            }
        });
    }

    function renderProducts(product) {
    // Xóa nội dung hiện tại của #productList
    $('#productImage').empty();
    $('#price').empty();
    for (let i = 0; i < product.length; i++) {
            $('#productImage').append(
                '<div class="row">'+
                      '<img id="current-image" src="'+product[i].image+'" alt="">'+
              '</div>'
            );

            $('#price').append(
                '<div class="col-1 info-price--default">'+
                      '<p>'+ product[i].price +'</p>'+
                  '</div>'+
                  '<div class="col-2 info-price--sale">'+product[i].discount_price+'</div>'+
                 
                  '<div class="col-7"></div>'
            );
            
        }

}

</script>
@endsection
