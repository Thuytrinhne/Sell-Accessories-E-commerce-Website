@extends ('layouts.admin')
@section ('content')
<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <h1>Sửa chi tiết sản phẩm</h1>
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
                @foreach($item as $item)
                <form action="{{route('admin.product.item.update',[$itemID])}}" method="POST" class="selection selection_add" id="addForm" style= "display:block">
                   @csrf
                   
                    <div class="addCard">
                        <div class="priceAdd">
                            <label>Giá sản phẩm: </label>
                            <input type="text" placeholder="Giá sản phẩm" name="price" value=" {{$item->price}} ">
                        </div>
                        
                        <div class="priceAdd">
                            <label>Giá discount:</label>
                            <input type="text" placeholder="Giá discount" name="discount_price" value=" {{$item->discount_price}} ">
                        </div>
                        <div class="amountAdd">
                            <label>Số lượng:</label>
                            <input type="text" placeholder="Số lượng" name="quantity" value=" {{$item->quantity}} ">
                        </div>

                        <div class="nameAdd">
                            <label>SKU: </label>
                            <input type="text" placeholder="Nhập SKU" name="SKU" value=" {{$item->SKU}} ">
                        </div>

                        <div class="amountAdd">
                            <label>Variation:</label>
                            <input type="text" placeholder="Số lượng" name="name" value=" {{$item->name}} ">
                        </div>

                        <div class="nameAdd">
                            <label>Variation_option: </label>
                            <input type="text" placeholder="Nhập SKU" name="value" value=" {{$item->value}} ">
                        </div>

                        <div class="imageAdd">
                            <label>Ảnh sản phẩm: </label>
                            <img src="/Assets/Images/image-add.png" name="image">
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                    
                </form>
                @endforeach
            </div>
@endsection