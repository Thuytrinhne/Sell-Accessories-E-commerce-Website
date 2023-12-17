<div class="modal-custom modal-custom-cart">
        <div class="modal__overlay" style="background: white"></div>
        <div class="modal__body modal__body--border">

<div class="cart">
        <div class="cart_container">
            <div class="product_container">
                <!-- ===============   product box  =============== -->
              
               
                <!-- ===============   product box  =============== -->

                
            </div>
          
          
            <div class="payment_container" style="display: inline;">
                <div class="total">
                    <p>Tổng tiền</p>
                    <p class="payment_container--total"style="text-align:end;"></p>
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