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

                      <form action="{{ route('products.filter') }}" method="get">
                        <label for="min_price" class="price-range-title">Giá từ:</label>
                        <input class="price-input" type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Min Price">

                        <label for="max_price" class="price-range-title">Đến:</label>
                        <input class="price-input" type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Max Price">

                        <button type="submit" class="price-search-btn">Lọc</button>
                    </form>

                      
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
                  @foreach($variation as $name)
                    <div class="col-3 filter-color">
                        <h4>{{$name->name}}</h4>
                        <div class="row">
                          @foreach($name->varitationOptions as $value)
                            <span class="color-option" style="background-color: {{$value->value}};"> {{$value->value}} </span>
                          @endforeach
                          
                                                 
                        </div>
                    </div>
                  @endforeach
                 <div class="row">
                  <div class="body-listProduct">
                    <!-- item --> 
                    @foreach($products as $product) 
                    <div class="body-list__item">
                      <div>
                            <a class="body-item-link" href="">
                              <img class="body-item-img" src="{{$product->image}}" alt="">
                            </a>
                      </div> 
                      <div class="body-item-des">
                        <a class="body-item-link" href="">{{$product->name}}</a>
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
                  </div>
                 </div>

                 <!-- end filter content -->


          
</div>
     
@endsection