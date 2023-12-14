
<header class="header">
        <!-- <div class="header_general-infor grid"> 
          <div class="header-contact">
            <div class="header-contact__phone">CSKH: 0972 264 919 </div>
            <div class="header-contact__email">hippo.cskh@gmail.com</div>
          </div>  
         
          </div>
              -->

        <div class="container-nav">     
        <nav class="navbar navbar-expand-lg bg-body-tertiary header__nav">
            <div class="container-fluid">
                <div class="grid">                 
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">
                    <img onclick="redirectOnClick(`index.html`)" class="header-logo" src="https://mossvn.com/images/logo-moss-remake1.png" alt="Logo cửa hàng">
                </a>
    
                <form class="container-search" role="search">
                  <div class="search-header">
                  <input class="container-search-text" type="search" placeholder="Tìm kiếm sản phẩm">
                  </div>
                  <button type="submit" class="search-button">
                    <i class="fa fa-search"></i>
                  </button>
                </form>
                <ul class="navbar-list">
                    
                  <li class="nav-item-align">
                    <img src="https://hasaki.vn/images/graphics/icon_header_2.svg" alt class="loading" data-was-processed="true" >
                    <div class="header-auth-login">
                          @if(Auth::check())         
                          <div class="header-auth">
                  
                            <div class="header-auth-logined">
                            <?php
                    $fullName = Auth::user()->full_name;
                    $lastName = explode(' ', $fullName);
                    $lastName = end($lastName);
                            ?>
                            <div class="nav-link-black nav-link-subLogin">Chào {{$lastName}},</div>
                            <div class ="nav-link-subLogin-user">
                              <div class="nav-link-black nav-link-subLogin">Tài khoản
                                  <i class="fa-solid fa-caret-down"></i>
                              </div>
                              <div class="header-auth-subLogin">
                                  <div class="header-auth-subLogin__list">
                                <div class="header-auth-subLogin-item">
                                  <span class="material-symbols-outlined header-auth-subLogin-icon">
                                    manage_accounts
                                    </span>                        
                                    <a class="header-auth-subLogin-link" href="#" onclick="changeMainPageOnClick('account')">Tài khoản của bạn</a>
                                </div>
                                <div class="header-auth-subLogin-item">
                                  <span class="material-symbols-outlined header-auth-subLogin-icon">
                                    list_alt
                                    </span>                         
                                  <a class="header-auth-subLogin-link" href="#" onclick="changeMainPageOnClick('orders')">Quản lý đơn hàng</a>
                                </div>
                                <!-- <div class="header-auth-subLogin-item">
                                  <span class="material-symbols-outlined header-auth-subLogin-icon">
                                    favorite
                                    </span>                          
                                  <a class="header-auth-subLogin-link" href="">Sản phẩm yêu thích</a>
                                </div> -->
                                <div class="header-auth-subLogin-item">
                                  <span class="material-symbols-outlined header-auth-subLogin-icon">
                                    location_on
                                    </span>                          
                                    <a class="header-auth-subLogin-link" href="#" onclick="changeMainPageOnClick('location')">Địa chỉ giao hàng</a>
                                </div>
                                <div class="header-auth-subLogin-item">
                                  <span class="material-symbols-outlined header-auth-subLogin-icon">
                                    logout
                                  </span>                          
                                  <a class="header-auth-subLogin-link" href="{{route('logout')}}">Thoát</a>
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                          @else
                          <div class="header-auth-notlogin">
                            <a class="nav-link-black"  href="{{route('signup')}}" target="_blank">Đăng ký</a>
                            <div class="nav-link-line"></div>
                            <a class="nav-link-black"  href="{{route('login')}}" target="_blank">Đăng nhập</a>
                          </div>
                        
                          @endif
                    </div>
                 
                </li>
                    <li class="nav-item-align">
                      <img src="https://hasaki.vn/images/graphics/icon_header_store.svg" alt class="loading" data-was-processed="true">
                      <a class="nav-link active nav-link-white" href="{{route('front.aboutUs')}}"  >Về Chúng Tôi</a>
                    </li>
                    <li>
                      <div class="nav-item-frame nav-item-pointer">
                        <i class="fa-solid fa-heart nav-item__icon"></i>                                
                      </div>
                      </li>
                    <li>
                      <a href="{{route('cart')}}" onclick="redirectOnClick(event)" class="cart-click">
                      <img   id="button_cart_item" class="nav-item-pointer" src="https://hasaki.vn/images/graphics/icon_header_1.svg" alt=""> 
                      </a>   
                    </li>
                   
                  </ul>
              </div>
                </div> 
            </div>
    
          </nav>
        </div>
        @include('shared.front.assort')
     <!-- show main content here -->
     <script>
      function redirectOnClick(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

          var view_screen = document.querySelector('.modal-custom-cart');
           view_screen.style.display = 'block';
        //  ajax
      
      $.ajax({
        url: $('.cart-click').attr('href'),
        type:"get",
        dataType: 'json',

          success: function(res){
            console.log(res);

           handleCartData(res);

          }
          });

      }
        function handleCartData(res)
        {
          console.log(res[0].id);
          console.log(res.length);
          let product_item_cart = res;
          let listDOM = document.querySelector(".product_container");
					listDOM.innerHTML = "";

          product_item_cart.forEach(function(item) {
            listDOM.innerHTML +=
            `<div class="product_box">
        <img src="./Assets/Images/product_img.jpeg" alt="" style="width: 60px; height: auto;">
        <div class="product_info">
            <p class="product_name">${item.name_product}</p>
            <dl class="variation">
                <dt class="variation_color">Color:  </dt>
                <dd class="variation_color">
                    <p>Be</p>
                </dd>
            </dl>
            <p class="product_price">${item.price}</p>
        </div>
        <div class="buy-amount_container">
            <div class="buy-amount">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>  
                </button>
                <input type="text" name="" id="" value="${item.quantity}">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="cancel_button">
            <a href="" class="cancel_btn"><img src="./Assets/Images/close_button.png" alt=""></a>
        </div>
    </div>`;
      
      // tạo href cho button cancel_btn
    var myLink = document.querySelector('.cancel_btn');

    // Thiết lập giá trị của thuộc tính href
    let hrefCancel = `{{ route('cart.destroy', 'item_id') }}`;
    hrefCancel = hrefCancel.replace('item_id', item.id);
    myLink.href = hrefCancel;

          });


        }

        
    </script>
</header>
    






