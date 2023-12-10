@extends ('layouts.admin')
    @error('msg')
        <div class="alert alert-danger">
            <h4 style="text-align: center;">{{$message}}</h4>
        </div>
    @enderror
@section ('content')
<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <h1>Sản phẩm</h1>
                    </div>
                    <div class="header_infor">
                        <div class="search_box">
                            <ion-icon name="search-outline"></ion-icon>
                            <input type="input" placeholder="Tìm kiếm">
                        </div>
                    </div>
                </div>

                <div class="product_selection">
                    <button href="#" class="product_list" onclick="showContent('selection_list')">Danh sách chi tiết sản phẩm</button>
                </div>
                
                <form action="{{ route('admin.product.item.store',[$product]) }}" method="POST" class="selection selection_add" id="addForm" style= "display:block">
                   @csrf
                    <div class="addCard">
                        <div class="priceAdd">
                            <label>Giá sản phẩm: </label>
                            <input type="number" placeholder="Giá sản phẩm" name="price" value="{{ old('price') }}">
                            @error('price')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="priceAdd">
                            <label>Giá discount</label>
                            <input type="number" placeholder="Giá discount" name="discount-price" value="{{ old('discount_price') }}">
                        </div>
                        <div class="amountAdd">
                            <label>Số lượng</label>
                            <input type="number" placeholder="Số lượng" name="quantity" value="{{ old('value') }}">
                            @error('quantity')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="nameAdd">
                            <label>SKU </label>
                            <input type="text" placeholder="Nhập SKU" name="SKU" value="{{ old('SKU') }}">
                        </div>

                        <div class="imageAdd">
                            <label>Ảnh sản phẩm: </label>
                            <img src="/Assets/Images/image-add.png" name="image">
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                </form>
            </div>
@endsection