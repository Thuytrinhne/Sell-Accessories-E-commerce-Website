@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/filter.css')}}">
@endsection
@section('body-main')


<div class="container" >
                 <!-- begin breadcrumbs -->
                <div class="row__header-filter" >
                    <div class="span">
                        <div class="breadcrumbs" >
                            <a href="" class="breadcrumbs__a">Trang chủ</a>
                            <spand class="breadcrumbs__slash" >/</spand>
                            <a href="" class="breadcrumbs__a breadcrumbs__a--active">Shop   </a>
                        </div>
                    </div>

                    <h1 class="filter__tittle">
                       Phụ kiện tóc & Máy làm tóc
                    </h1>
                   
                </div>
                 <!-- end filter_header -->
                

                 <!-- begin filter content -->
                 <div class="row filter__content">
                    <div class="col-5 price-range-container">
                      <span class="price-range-title">Price range: </span>
                      <input type="number" class="price-input" id="minPrice" placeholder="Min">
                      <span>-</span>
                      <input type="number" class="price-input" id="maxPrice" placeholder="Max">
                      <button class="price-search-btn" >Search</button>
                    </div>

                    
                    
                    <div class="col-6 filter-sort">
                        <span class="filter-sort__sortby">
                            <b>Sort by:</b>
                        </span>

                        <select class="filter-sort__select" onchange="handleSelect()">
                          <option class="filter-sort__option" value="option1">Thứ tự theo mức độ phổ biến</option>
                          <option class="filter-sort__option" value="option2">Độ liên quan</option>
                          <option class="filter-sort__option" value="option3">Thứ tự theo điểm đánh giá</option>
                          <option class="filter-sort__option" value="option3">Mới nhất</option>
                          <option class="filter-sort__option" value="option3">Thứ tự theo giá: thấp đến cao</option>
                          <option class="filter-sort__option" value="option3">Thứ tự theo giá: cao xuống thấp</option>
                        </select>

                        <span class="filter-sort__sortby" style="margin-left: 50px;">
                            <b>Show:</b> 
                        </span>
                        <select class="filter-sort__select" onchange="handleSelect()">
                          <option class="filter-sort__option" value="option1">12</option>
                          <option class="filter-sort__option" value="option2">24</option>
                          <option class="filter-sort__option" value="option3">48</option>
                          <option class="filter-sort__option" value="option3">Show all</option>
                        </select>


                        <button class="filter-sort__btn" style="margin-left: 50px;" onclick="Filter_display()">
                            <i class="ti-filter"></i>
                            <b>FILTER</b> 
                        </button>
                    </div>


                    
                 </div>

                 <div class="row filter-widget">
                    <div class="col-3 filter-color">
                        <h4>COLOR</h4>
                        <div class="row">
                            <span class="color-option" style="background-color: green;">Xanh </span>
                            <span class="color-option" style="background-color: red;">Đỏ</span>
                            <span class="color-option" style="background-color: blueviolet;">Tím</span>
                            <span class="color-option" style="background-color: yellow;">Vàng</span> 
                            <span class="color-option" style="background-color: green;">Xanh </span>
                            <span class="color-option" style="background-color: red;">Đỏ</span>
                            <span class="color-option" style="background-color: blueviolet;">Tím</span>
                            <span class="color-option" style="background-color: yellow;">Vàng</span>           
                            <span class="color-option" style="background-color: green;">Xanh </span>
                            <span class="color-option" style="background-color: red;">Đỏ</span>
                            <span class="color-option" style="background-color: blueviolet;">Tím</span>
                            <span class="color-option" style="background-color: yellow;">Vàng</span> 
                            <span class="color-option" style="background-color: green;">Xanh </span>
                            <span class="color-option" style="background-color: red;">Đỏ</span>
                            <span class="color-option" style="background-color: blueviolet;">Tím</span>
                            <span class="color-option" style="background-color: yellow;">Vàng</span>           
                            <span class="color-option" style="background-color: green;">Xanh </span>
                            <span class="color-option" style="background-color: red;">Đỏ</span>
                            <span class="color-option" style="background-color: blueviolet;">Tím</span>
                            <span class="color-option" style="background-color: yellow;">Vàng</span>                               
                        </div>
                    </div>

                    <div class="col-3 filter-size">
                        <h4>SIZE</h4>
                        <div class="row filter-size">
                            <span class="size-option" style="background-color:azure ;">1 </span>
                            <span class="size-option" style="background-color:azure ;">2 </span>
                            <span class="size-option" style="background-color:azure ;">3</span>
                            <span class="size-option" style="background-color:azure ;">4 </span>
                            <span class="size-option" style="background-color:azure ;">5 </span>
                            <span class="size-option" style="background-color:azure ;">6 </span>
                            <span class="size-option" style="background-color:azure ;">7 </span>
                            <span class="size-option" style="background-color:azure ;">8 </span>
                            <span class="size-option" style="background-color:azure ;">9 </span>
                            <span class="size-option" style="background-color:azure ;">10 </span>
                            <span class="size-option" style="background-color:azure ;">11 </span>
                            <span class="size-option" style="background-color:azure ;">12</span>
                            <span class="size-option" style="background-color:azure ;">13</span>
                            <span class="size-option" style="background-color:azure ;">14</span>
                            <span class="size-option" style="background-color:azure ;">15</span>
                               
                        </div>
                    </div>

                    <div class="col-4"></div>
                 </div>

                 <div class="row">
                  <div class="body-listProduct">
                    <!-- item -->      
                    <div class="body-list__item">
                      <div>
                            <a class="body-item-link" href="">
                              <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/06/z4458952405951_8219d7005e5f036f472d17bc6b16e42c-300x300.jpg" alt="">
                            </a>
                      </div> 
                      <div class="body-item-des">
                        <a class="body-item-link" href="">
                              Kẹp tóc nơ</a>
                        <div class="body-item-price">
                          <span>50.000 ₫</span>
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
                <div class="body-list__item">
                  <div>
                        <a class="body-item-link" href="">
                          <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490370155325_9fcf669b76ff12288ef4877004bcd88f-300x300.jpg" alt="">
                        </a>
                  </div> 
                  <div class="body-item-des">
                    <a class="body-item-link" href="">
                          Lược gỡ rối tóc + gương</a>
                    <div class="body-item-price">
                      <span>30.000 ₫</span>
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
            <div class="body-list__item">
              <div>
                    <a class="body-item-link" href="">
                      <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490402891030_792a0a91117fe4e472a3df87bcb92e59-300x300.jpg" alt="">
                    </a>
              </div> 
              <div class="body-item-des">
                <a class="body-item-link" href="">
                      Ly giữ nhiệt inox+ ống hút</a>
                <div class="body-item-price">
                  <span>195.000 ₫</span>
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
        <div class="body-list__item">
          <div>
                <a class="body-item-link" href="">
                  <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4490475751990_4ea966aab4661080d3e0ea6a71814dc1-300x300.jpg" alt="">
                </a>
          </div> 
          <div class="body-item-des">
            <a class="body-item-link" href="">
                  Cài tóc nơ hồng to</a>
            <div class="body-item-price">
              <span>70.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/09/z4660346235290_5c871856915f1e2f0ba9d11364de6e4e-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Quạt cầm tay</a>
          <div class="body-item-price">
            <span>5.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4497999930100_3b4ce06046cb235d5ede661a37d7bbca-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Quạt cầm tay mini bông hoa</a>
          <div class="body-item-price">
            <span>30.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/09/z4669154606285_d53d9124726890409d74bdc121a3b149-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Set bút chì</a>
          <div class="body-item-price">
            <span>30.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4503285803086_2babb8a36a4b00e752c81119ce3c7d66-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Tranh ghép hình mini</a>
          <div class="body-item-price">
            <span>45.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/10/z4749631800146_903b97a22e79a477e59a39a27c3dbf66-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Túi xách thời trang</a>
          <div class="body-item-price">
            <span>145.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4495765409712_f1e4a7b779c08f59ebc7889aa5adc231-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Túi xách</a>
          <div class="body-item-price">
            <span>140.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4496099394400_0b132e2feda852b1a461a248a2b9d341-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Set thước</a>
          <div class="body-item-price">
            <span>25.000 ₫</span>
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
      <div class="body-list__item">
        <div>
              <a class="body-item-link" href="">
                <img class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4495775976406_f36ec8cb147642fa547d1e42adf43ed1-300x300.jpg" alt="">
              </a>
        </div> 
        <div class="body-item-des">
          <a class="body-item-link" href="">
                Túi đựng laptop</a>
          <div class="body-item-price">
            <span>140.000 ₫</span>
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
                  </div>
                 </div>

                 <!-- end filter content -->


          
</div>
     
@endsection