@extends('layouts.app')
@section('body-main')
<div class="body-main">
            <div class="body-banner-container grid">
                <div class="body-banner">
                   <div class="body-banner-item1">
                        <img class="body-banner-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4392051012379_ce6d2d4cb5ffa0d77e2535eac0591a1d.jpg" alt="">
                   </div>
                   
                   <div class="body-banner-item2">
                        <img class="body-banner-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/extra-banner-1.jpg" alt="">
                   </div>
                   <div class="body-banner-item3">
                    <img class="body-banner-img" src="https://hipposhop.vn/wp-content/uploads/2023/07/z4510107506488_2ab891ba9c2958c43b378f602408957b-1-2.jpg" alt="">
               </div>
              
                </div>
              </div>
            <div class="body-wrapper grid">
                  <div class="body-title">
                    Sản phẩm mới
                  </div>
                  <div class="body-listProduct">
                    <!-- item -->      
                    <div class="body-list__item" onclick="list__itemOnCick()" >
                      <div>
                            <a class="body-item-link" href="#">
                              <img onclick="list__itemOnCick()" class="body-item-img" src="https://hipposhop.vn/wp-content/uploads/2023/06/z4458952405951_8219d7005e5f036f472d17bc6b16e42c-300x300.jpg" alt="">
                            </a>
                      </div> 
                      <div class="body-item-des">
                        <a class="body-item-link" href="#">
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
                        <a class="body-item-link" href="#">
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

