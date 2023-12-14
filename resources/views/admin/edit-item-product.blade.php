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
                
                <form action="" method="POST" class="selection selection_add" id="addForm" style= "display:block">
                   @csrf
                    <div class="addCard">
                        <div class="priceAdd">
                            <label>Giá sản phẩm: </label>
                            <input type="text" placeholder="Giá sản phẩm" name="price">
                        </div>
                        
                        <div class="priceAdd">
                            <label>Giá discount</label>
                            <input type="text" placeholder="Giá discount" name="discount-price  ">
                        </div>
                        <div class="amountAdd">
                            <label>Số lượng</label>
                            <input type="text" placeholder="Số lượng" name="quantity">
                        </div>

                        <div class="nameAdd">
                            <label>SKU </label>
                            <input type="text" placeholder="Nhập SKU" name="SKU">
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