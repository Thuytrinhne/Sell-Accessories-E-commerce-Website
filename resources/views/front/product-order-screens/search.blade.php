@extends ('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('Assets/css/front/filter.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                      <h1 class="filter__tittle" id="category_id">
                      </h1>
                      <h1 class="filter__tittle">
                        Kết quả tìm kiếm cho: "{{ $search }}"
                      </h1>
                </div>
                 <!-- end filter_header -->
                

                 <!-- begin filter content -->
                 <div class="row filter__content">
                    <div class="col-5 price-range-container">
                      <form onsubmit="handleFormSubmit(event)">                        
                          <label for="min_price" class="price-range-title">Giá từ:</label>
                          <input class="price-input" type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Min Price">

                          <label for="max_price" class="price-range-title">Đến:</label>
                          <input class="price-input" type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Max Price">

                      </form>
                    </div>
                   
                    <div class="col-3"></div>

                    <div class="col-3 filter-sort">
                        <span class="filter-sort__sortby">
                            <b>Sort by:</b>
                        </span>

                        <select class="filter-sort__select" id="sortOptions" >
                          <option class="filter-sort__option" value="">Chọn filter</option>
                          <option class="filter-sort__option" value="desc">Thứ tự theo giá: cao xuống thấp</option>
                          <option class="filter-sort__option" value="asc">Thứ tự theo giá: thấp đến cao</option>
                          <option class="filter-sort__option" value="lastest">Mới nhất</option>
                        </select>

                        <!-- <span class="filter-sort__sortby" style="margin-left: 50px;">
                            <b>Show:</b> 
                        </span>
                        <select class="filter-sort__select" onchange="handleSelect()">
                          <option class="filter-sort__option" value="option1">12</option>
                          <option class="filter-sort__option" value="option2">24</option>
                          <option class="filter-sort__option" value="option3">48</option>
                          <option class="filter-sort__option" value="option3">Show all</option>
                        </select> -->


                        <!-- <button class="filter-sort__btn" style="margin-left: 50px;" onclick="Filter_display()">
                            <i class="ti-filter"></i>
                            <b>FILTER</b> 
                        </button> -->
                    </div>      
                 </div>

                 <div class="row filter-widget">
                  @foreach($variation as $name)
                    <div class="col-5 filter-color">
                        <h4 style="text-transform:capitalize">{{$name->name}}</h4>
                        <div class="row">
                          @foreach($name->product_configurations as $product_configuration)
                          <button
                              id="variationSelected"
                              class="color-option"
                              style="background-color: {{$product_configuration->variation_value}}; color: {{$product_configuration->variation_value}}; "
                              onclick="showProducts(' {{$product_configuration->variation_value}} ')">
                              <span class="checkmark">'\2713'</span>
                              {{$product_configuration->variation_value}}
                          </button>
                          @endforeach
               
                        </div>
                    </div>
                  @endforeach
                    <div class="col-2">
                    <button onclick="resetAll()" class="price-search-btn">Xóa bộ lọc</button>
                    </div>
                  </div>
                  
                 <div class="row">
                  <div class="body-listProduct" id="productList">
                    <!-- item --> 
                    @foreach($products as $product) 
                    <div class="body-list__item">
                      <div>
                            <a class="body-item-link" href="{{route('products.show',[$product->id])}}">
                              <img class="body-item-img" src="{{$product->default_image}}" alt="">
                            </a>
                      </div> 
                      <div class="body-item-des">
                        <a class="body-item-link" href="{{route('products.show',[$product->id])}}">{{$product->name_product}}</a>
                        <div class="body-item-price">
                          <span>{{$product->price}}</span>
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
                    <div style="margin-left:50px">{{ $products->links() }}</div>

                  </div>
                 
                 </div>
                
                
                 <!-- end filter content -->

</div>

<script>
  //Khai báo
  var selectedVariation;
  var selectedValue;
  var categoryId = document.getElementById('category_id').dataset.cateId;
  let minPrice = 0;
  let maxPrice = 99999999;

    $('#min_price').on('input', function() {
        minPrice = $(this).val();
        showProducts(selectedVariation);
    });

    $('#max_price').on('input', function() {
        maxPrice = $(this).val();
        showProducts(selectedVariation);
    })

  // Xử lí khi nhấn sortBy
    $('#sortOptions').on('change', function() {
            selectedValue = $(this).val();
            showProducts(selectedVariation);
        });

  //Xử lí khi nhấn lọc giá
  function handleFormSubmit(event) {
    event.preventDefault();
    let minPrice = document.getElementById('min_price').value;
    let maxPrice = document.getElementById('max_price').value;
    console.log(minPrice);
    showProducts(selectedVariation);
  }

  //Gọi ajax filter
   function showProducts(variation) {
        selectedVariation = variation;
        $.ajax({
            url: '/get-products-by-value',
            type: 'get',
            data: {
                    '_token': '{{ csrf_token() }}',
                    'orderby': selectedValue,
                    'variation': selectedVariation,
                    'category': categoryId,
                    'minPrice': minPrice,
                    'maxPrice': maxPrice,
                },
            success: function(data) {
              if (data === null || data.data === null || data.data.length === 0) {
                // Xử lý khi Ajax trả về null hoặc mảng rỗng
                console.log('Dữ liệu trả về là null hoặc mảng rỗng');
                renderNotFound();
              } else {
                  console.log(data.data);
                  renderProducts(data.data);
              }
            },
            error: function(error) {   
                console.log('Bị loi roi');
            }
        });
    }

    // hàm render nd khi ko có sản phẩm nào
    function renderNotFound(){
      $('#productList').empty();

      $('#productList').append(
          '<div class="row body-content" style="width:100%">'+
              '<span class="body-content-title">'+
                  'Không tìm thấy sản phẩm nào phù hợp với tìm kiếm của bạn.'+
              '</span>'+
              '<img class="body-content-img" src="https://hippo.vn/wp-content/themes/babystreet/image/search-no-results.jpg" alt="">'+
          '</div>'
      );
    }

    //hàm render nội dụng lấy từ ajax
    function renderProducts(products) {
        
        // Xóa nội dung hiện tại của #productList
        $('#productList').empty();

        for (let i = 0; i < products.length; i++) {
            $('#productList').append(
                '<div class="body-list__item" >' +
                    '<div>' +
                        '<a class="body-item-link" href="/detail-product/'+ products[i].id + '">' +
                            '<img class="body-item-img" src="' + products[i].default_image + '" alt="">' +
                        '</a>' +
                    '</div>' +
                    '<div class="body-item-des">' +
                        '<a class="body-item-link" href="/detail-product/'+ products[i].id + '">' + products[i].name_product + '</a>' +
                        '<div class="body-item-price">' +
                            '<span>' + products[i].price + '</span>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );
        }
    }

    // Hàm xóa filter 
    function resetAll(){
      location.reload();
    }

</script>

     
@endsection