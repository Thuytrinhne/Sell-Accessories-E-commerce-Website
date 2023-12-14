@extends('layouts.app')
@section('body-main')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- code trinh  -->
@if (session ('loginSuccess'))
            {
                <script>
                     Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{session('loginSuccess')}}',
                showConfirmButton: false,
                timer: 2000
                })
                </script>
            }
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
                    <div class="body-list__item" onclick="list__itemOnCick()" >
                      <div>
                            <a class="body-item-link" href="{{ route('products.show', ['id' => $item->id]) }}">
                              <img onclick="list__itemOnCick()" class="body-item-img" src="{{$item->image}}" alt="{{$item->name_product}}">
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
                            <a href="" class="body-links-detail">
                              <div class="body-circle">
                                <span class="material-symbols-outlined body-icon-black body-icon-black--large">
                                  visibility
                                </span>    
                              </div>   
                            </a>  
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
                 
            </div>
            <div class="body-footer">
                  <a href="" class="body-footer-seemore">Xem tất cả</a>
            </div>
               
            <div class="body-catogory grid">
                      <div class="body-category-list">
                        <div class="body-category-item">
                          <a href="" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490504219755_dbc9c3ca1627f10b3ca79d1260de72c2.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">LY SỨ (09)</h3>
                          </a>
                        </div>
                        <div class="body-category-item">
                          <a href="" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/09/z4695989175899_435b8c28c9233a5a0ebe70abb1b6b8b1-300x300.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">DỤNG CỤ HỌC TẬP (109)</h3>
                          </a>
                        </div>
                        <div class="body-category-item">
                          <a href="" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/09/z4695885289564_2bcc658538dea52f977c7ac5a917ec84-300x300.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">ĐỒ CHƠI (26)</h3>
                          </a>
                        </div>
                        <div class="body-category-item">
                          <a href="" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490504219755_dbc9c3ca1627f10b3ca79d1260de72c2.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">LY SỨ (09)</h3>
                          </a>
                        </div>
                        <div class="body-category-item">
                          <a href="" class="body-category-link">
                           <img src="https://hipposhop.vn/wp-content/uploads/2023/07/z4498074345012_7f24f6b6d73062e768da20d394b037ad-300x300.jpg" alt="" class="body-category-img">
                           <h3 class="body-category-name">QUẠT CẦM TAY MINI (209)</h3>
                          </a>
                        </div>
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
@endsection
    <!-- modal quickview-->  
@section ('quick-view')
    @include('shared.front.quick-view')
@endsection

