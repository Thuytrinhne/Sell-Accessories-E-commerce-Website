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
                    <div class="header-auth-notlogin">
                      <a class="nav-link-black"  href="./signup.html" target="_blank">Đăng ký</a>
                       <div class="nav-link-line"></div>
                      <a class="nav-link-black"  href="./signin.html" target="_blank">Đăng nhập</a>
                      </div>
                    </div>
                    <div class="header-auth">
            
                      <div class="header-auth-logined">
                      <div class="nav-link-black nav-link-subLogin">Chào Trinh,</div>
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
                            <a class="header-auth-subLogin-link" href="#">Thoát</a>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                     </div>
                  </a>
                </li>
                    <li class="nav-item-align">
                      <img src="https://hasaki.vn/images/graphics/icon_header_store.svg" alt class="loading" data-was-processed="true">
                      <a class="nav-link active nav-link-white" href="#" onclick="redirectOnClick(`about.html`)" >Về Chúng Tôi</a>
                    </li>
                    <li>
                      <div class="nav-item-frame nav-item-pointer">
                        <i class="fa-solid fa-heart nav-item__icon"></i>                                
                      </div>
                      </li>
                    <li>
                      <img onclick="redirectOnClick()" id="button_cart_item" class="nav-item-pointer" src="https://hasaki.vn/images/graphics/icon_header_1.svg" alt="">    
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
      function redirectOnClick() {
          var view_screen = document.querySelector('.modal-custom-cart');
           view_screen.style.display = 'block';
        }
    </script>
</header>
    






