<div class="modal-custom modal-custom-cart">
        <div class="modal__overlay" style="background: white"></div>
        <div class="modal__body modal__body--border">

<div class="cart">
        <div class="cart_container">
            <div class="product_container">
                <!-- ===============   product box  =============== -->
                @foreach($product_item_cart as $key => $item)
                <div class="product_box">
                    <img src="./Assets/Images/product_img.jpeg" alt="" style="width: 60px; height: auto;">
                    <div class="product_info">
                        
                        
                        <p class="product_name">{{ $item->name_product}}</p>
                        <dl class="variation" >
                            <dt class="variation_color">Color:  </dt>
                            <dd class="variation_color">
                                <p>Be</p>
                            </dd>
                        </dl>
                        <p class="product_price">{{ $item->price }}</p>
                        
                    </div>
                    <!-- ===========  buy-amount  ============ -->
                    <div class="buy-amount_container">
                        <div class="buy-amount">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>  
                            </button>
                            <input type="text" name="" id="" value="{{  $item->quantity }}">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- ===========  buy-amount  ============ -->

                    <div class="cancel_button">
                        <a href="{{ route('cart.destroy',[$item->id]) }}" class="cancel_btn"><img  src="./Assets/Images/close_button.png" alt="" ></a>
                    </div>
                </div>
                @endforeach
                <!-- ===============   product box  =============== -->

                
            </div>
            @php
                $total_price=0;
                foreach($product_item_cart as $item) {
                $total_price += $item->price * $item->quantity;
                }
            @endphp
            <div class="payment_container" style="display: inline;">
                <div class="total">
                    <p>Tổng tiền</p>
                    <p style="text-align:end;">{{ $total_price }}đ</p>
                </div>
            

                <div class="pay_button">
                    <a class="pay_btn" href="checkout">Thanh toán</a><br>
                </div>
            </div>
            
        </div>
        <button class="modal__btn-close" onclick="closeCart()">
            X
        </button>
    </div>
    </div>
    </div>

    <script>
        function closeCart() {
            var view_screen = document.querySelector('.modal-custom-cart');
             view_screen.style.display = 'none';
          }
      </script>
</div>