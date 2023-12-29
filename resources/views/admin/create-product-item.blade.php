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
                
                <form action="{{ route('admin.product.item.store',[$product]) }}" method="POST" class="selection selection_add" id="addForm" style= "display:block" enctype="multipart/form-data">
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
                            <input type="number" placeholder="Số lượng" name="quantity" value="{{ old('variation_value') }}">
                            @error('quantity')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="nameAdd">
                            <label>SKU </label>
                            <input type="text" placeholder="Nhập SKU" name="SKU" value="{{ old('SKU') }}">
                        </div>

                        

                        <div class="amountAdd" style="display:flex;">
                            <label>Variation name:</label>
                            <select style="font-size: 15px" id ="options"
                                    class="form-select" aria-label="Default select example" 
                                    name="name" value="">

                                    <option value=""></option>
                                    <option value="màu">màu</option>
                                    <option value="size">size</option>
                                    @error('name')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                            </select>
                        </div>

                        
                            <div class="nameAdd" id="colorPickerContainer" style="display:none;">
                                <label for="exampleColorInput" class="form-label">Variation value: </label>
                                <input type="color" class="form-control form-control-color" name="value" value=" "  title="Choose your color">
                            </div>
                        
                            <div class="nameAdd" id="sizeInputContainer" style="display:none;">
                                <label for="exampleColorInput" class="form-label">Variation value: </label>
                                <input type="text"  name="value" value=" "  title="Choose your size">
                            </div>
                       

                        <!-- <div class="nameAdd">
                            <label>Variation value </label>
                            <input type="text" placeholder="Nhập value" name="value" value="{{ old('value') }}">
                            @error('value')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                        <label for="image" class="form-label">Multiple files input example</label>
                        <input type="file" name="image">
                        </div>
                        
                        <input type="submit" class="confirmAdd" 
                        style="background-color: #4CAF50; color: white; 
                        padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        
                    </div>
                </form>

                <script>
                    // Lắng nghe sự kiện thay đổi của select
                    document.getElementById('options').addEventListener('change', function () {
                        var selectedValue = this.value;

                        document.getElementById('colorPickerContainer').style.display = 'none';
                        document.getElementById('sizeInputContainer').style.display = 'none';
                        
                        if (selectedValue === 'màu') {
                            document.getElementById('colorPickerContainer').style.display = 'flex';
                        } else if (selectedValue === 'size') {
                            document.getElementById('sizeInputContainer').style.display = 'flex';
                        }
                    });
                </script>
            </div>
@endsection