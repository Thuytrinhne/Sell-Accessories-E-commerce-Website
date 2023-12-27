<div class="modal-custom modal-custom-quick-view" id="quickViewModal">
        <div class="modal__overlay"></div>
        <div class="modal__body modal__body--border">  
        <div class="row modal__inner" id="modal-content">
                <!-- begin gallery -->
          <div class="col-6 row-gallery" id="default_image"> 
                
          </div>
          <!-- end gallery -->

          <!-- beign info -->
          <div class="col-6" >
              <div class="row info-header" id="name_product">
              </div>

              <div class="row info-price" id = "price">        
              </div>
              
              <div class="row info__color" id="variation_name">  
              </div>
              <div class="row" id="variation_value">  
              </div>

              <div class="row info-category" style="margin-top: 20px;" id="name_category">
              </div>


              <div class="row info-whistlist" style="margin: 20px 0px;">
                  <div class="col-6 info-whistlist-wrapper">                 
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

        <button class="modal__btn-close" id="modal__btn-close">
            X
        </button>

    </div>

   </div>
<!-- ... other product content ... -->


<!-- Your JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quickViewModal = document.getElementById('quickViewModal');
        var quickview = document.querySelectorAll('#quickview');
        var modalclose = document.getElementById('modal__btn-close');


        quickview.forEach(function (button) {
            button.addEventListener('click', function () {
                // Get the product ID associated with the clicked button
                var productId = button.getAttribute('data-product-id');
                quickViewModal.style.display = 'block';

                $.ajax({
                url: '/get-product/' + productId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    renderModal(data);
                },
                error: function(error) {
                    console.error('Ajax request failed: ', error);
                }
            });

            });
        });

        function renderModal(product)
        {
            $('#default_image').empty();
            $('#name_product').empty();
            $('#price').empty();
            $('#variation_name').empty();
            $('#variation_value').empty();
            $('#name_category').empty();
            

            $('#default_image').append(
                      '<img id="current-image" src="'+product[0].default_image+'" alt="" style="width:95%;height:95%">'
            );

            $('#name_product').append(
                '<h1 class="info-header__h1">'+product[0].name_product+'</h1>'
            );

            


            $('#price').append(
                '<div class="col-1 info-price--default">'+
                    '<p>'+product[0].price+'</p>'+
                '</div>'+
                '<div class="col-2 info-price--sale">'+product[0].discount_price+'</div>'
            );

            $('#variation_name').append(
                '<h4>'+product[0].name+'</h4>'
            );

            var variations = product[1];
            var variationHtml = '';
            console.log(variations[0].name);
            if (variations[0].name == 'màu') {

                variations.forEach(function(value) {
                variationHtml += '<button class="color-option" style="background-color:' + value.variation_value + '; color:' + value.variation_value + '" onclick="showProducts(\'' + value.id + '\')"></button>';

                });
               
            } else if (variations[0].name == 'size') {
                variations.forEach(function(value) {
                variationHtml += '<button class="color-option" onclick="showProducts(\'' + value.id + '\')" style="color: #000;">'+  value.variation_value + '</button>';
                });
            };

            // Thêm HTML vào phần tử có id là 'varition_value'
            $('#variation_value').append(variationHtml);

            $('#name_product').append(
                '<h4>Category: '+
                      '<a href="" class="info-category-link">'+product[0].name_category+'</a>'+
                  '</h4>'
            );
                    
        };

        

        modalclose.addEventListener('click', function () {
            quickViewModal.style.display = 'none';
        });
    });

    
</script>

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
    $('#default_image').empty();
    $('#price').empty();
    for (let i = 0; i < product.length; i++) {
            $('#default_image').append(
                '<div class="row">'+
                      '<img id="current-image" src="'+product[i].image+'" alt="" style="width:95%;height:95%">'+
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
