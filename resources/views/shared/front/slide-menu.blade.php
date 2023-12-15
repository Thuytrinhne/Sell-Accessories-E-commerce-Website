<div class="body-user-feature">
                <div class="body-user-feature-header">
                    <a href="">
                      <img class="body-user-img" src="https://hasaki.vn/images/graphics/account-full.svg" alt="">
                    </a>
                    <div class="body-user-infor">
                      <div class="body-user-infor-name">
                        <strong>Chào Trinh</strong>
                      </div>
                      <div class="body-user-infor-edit">
                      <a href="{{route('front.account')}}" class="body-user-infor-link">Sửa tài khoản</a>
                      <span class="material-symbols-outlined body-user-infor-icon">
                        edit
                      </span>
                    </div>
                  </div>
                </div>
             
                <div class="body-user-feature-footer">
                  <div class="body-user-feature-item" onclick="changeMainPageOnClick(`account`)">
                    <span class="material-symbols-outlined body-user-feature-item-icon  body-user-feature-item-icon--blue">
                      manage_accounts
                      </span>
                      <a href="{{route('front.account')}}"><span class="body-user-feature-text">Tài Khoản Của Tôi
                      </span>
                      </a>
                      </div>
                  <div class="body-user-feature-item" onclick="changeMainPageOnClick(`orders`)">
                    <span class="material-symbols-outlined body-user-feature-item-icon body-user-feature-item-icon--blue2">
                      list_alt
                      </span>
                      <a href="{{route('.front.customer.history-orders')}}">
                    <span class="body-user-feature-text">Đơn Mua</span>
                    </a>
                  </div>
                  
                  <div class="body-user-feature-item" onclick="changeMainPageOnClick(`location`)">
                    <span class="material-symbols-outlined body-user-feature-item-icon body-user-feature-item-icon--orange">
                      distance
                      </span>
                      <a href="{{route('front.address')}}">
                    <span class="body-user-feature-text">Sổ Địa Chỉ Nhận Hàng</span>
                    </a>
                  </div>
                  <div class="body-user-feature-item" onclick="changeMainPageOnClick(`logout`)">
                    <span class="material-symbols-outlined body-user-feature-item-icon body-user-feature-item-icon--yellow">
                      logout
                    </span>  
                    <a href="{{route('logout')}}">
                    <span class="body-user-feature-text">Thoát</span>
                    </a>
                  </div>
                 
                </div>
              </div>