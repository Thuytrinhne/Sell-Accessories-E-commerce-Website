@extends('layouts.app')
@section('body-main')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- code trinh  -->
@if (session ('loginSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('loginSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif
@if (session ('addWishSuccess'))
            
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('addWishSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            
@endif
<!-- end code trinh  -->
<div class="body-main">
  
            <div class="body-banner-container grid">
                <div class="body-banner">
                   <div class="body-banner-item1">
                        <img class="body-banner-img" src="https://hippo.vn/wp-content/uploads/2023/12/z4969498874307_3583551e026d751e975a625dd66fd282.jpg" alt="">
                   </div>
                   
                   <div class="body-banner-item2">
                        <img class="body-banner-img" src="https://hippo.vn/wp-content/uploads/2023/07/z4510107506488_2ab891ba9c2958c43b378f602408957b-1-2.jpg" alt="">
                   </div>
                   <div class="body-banner-item3">
                    <img class="body-banner-img" src="https://hippo.vn/wp-content/uploads/2023/11/z4930258586038_01449549f1f9c4eb587d791af0672a4f.jpg" alt="">
               </div>
              
                </div>
              </div>
            <div class="body-wrapper grid">
                  <div class="body-title">
                    Sản phẩm mới
                  </div>

                  <div class="body-listProduct">
                    <!-- item -->      
                    @foreach($products as $item)
                    <div class="body-list__item" >
                      <div>
                            <a class="body-item-link" href="{{ route('products.show', ['id' => $item->id]) }}">
                              <img class="body-item-img" src="{{$item->default_image}}" alt="{{$item->name_product}}">
                            </a>
                      </div> 
                      <div class="body-item-des">
                        <a class="body-item-link" href="#">
                              {{$item->name_product}}</a>
                        <div class="body-item-price">
                          <span>{{$item->discount_price}}₫</span>
                          
                        </div>
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
                            
                              <a onclick="addToWishlistClick({{$item->iaddToCartAjaxshơd}}, event, )" href="#" class="body-links-detail">
                                <div class="body-circle" >
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
                 
            </div>
            <div class="body-footer">
                  <a href="{{ route('products.search') }}" class="body-footer-seemore">Xem tất cả</a>
            </div>
               
            <div class="body-catogory grid">
                      <div class="body-category-list">
                        @foreach($categories as $item)
                        <div class="body-category-item">
                          <a href="{{ route('get.products.by.category',[$item->id]) }}" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490504219755_dbc9c3ca1627f10b3ca79d1260de72c2.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">{{ $item->name_category }}</h3>
                          </a>
                        </div>
                        @endforeach
                      </div>
                      <div class="body-category-nav">
                          <button class="body-nav-btn" type="button">
                            <i class="fa-solid fa-angle-left body-nav-icon"></i>
                          </button>
                          <button class="body-nav-btn" type="button">
                            <i class="fa-solid fa-angle-right body-nav-icon btn-left"></i>
                          </button>
                      </div>
            </div> 
          </div> 



      <script>
        function addToWishlistClick(id, event)
        {
          event.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
         
          var url = "{{ route('wishlist.add') }}";

          var form = document.createElement('form');
          form.method = 'POST';
          form.action = url;
          // truyền token
          var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          var csrfInput = document.createElement('input');
          csrfInput.type = 'hidden';
          csrfInput.name = '_token';
          csrfInput.value = csrfToken;
        
          form.appendChild(csrfInput);
          document.body.appendChild(form);
          // truyền product id 
          var ProductIdInput = document.createElement('input');
          ProductIdInput.type = 'hidden';
          ProductIdInput.name = 'productId';
          ProductIdInput.value = id;
        
          form.appendChild(ProductIdInput);
          document.body.appendChild(form);
          
          form.submit();
        }
      </script>
@endsection
    <!-- modal quickview-->  
@section ('quick-view')
    @include('shared.front.quick-view')
@endsection

