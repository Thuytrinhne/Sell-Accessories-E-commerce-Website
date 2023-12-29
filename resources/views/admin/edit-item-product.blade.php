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
                <form action="{{route('admin.product.item.update',[$itemID])}}" method="POST" class="selection selection_add" id="addForm" style= "display:block" enctype="multipart/form-data" >
                   @csrf
                   
                    <div class="addCard">
                        <div class="priceAdd">
                            <label>Giá sản phẩm: </label>
                            <input type="text" placeholder="Giá sản phẩm" name="price" value=" {{$item->price}} ">
                                    @error('price')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                        </div>
                        
                        <div class="priceAdd">
                            <label>Giá discount:</label>
                            <input type="text" placeholder="Giá discount" name="discount_price" value=" {{$item->discount_price}} ">
                                    @error('discount_price')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                        </div>
                        <div class="amountAdd">
                            <label>Số lượng:</label>
                            <input type="text" placeholder="Số lượng" name="quantity" value=" {{$item->quantity}} ">
                                    @error('quantity')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                        </div>

                        <div class="nameAdd">
                            <label>SKU: </label>
                            <input type="text" placeholder="Nhập SKU" name="SKU" value=" {{$item->SKU}} ">
                                    @error('SKU')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                        </div>

                        <div class="amountAdd" style="display:flex;">
                            <label>Variation name:</label>
                            <select style="font-size: 15px" id ="options"
                                    class="form-select" aria-label="Default select example" 
                                    name="name" value=" {{$item->name}}" disabled>
                                @foreach($variation as $variation)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        @if($item->name == 'màu')
                            <div class="nameAdd" id="colorPickerContainer" style="display:flex;">
                                <label for="exampleColorInput" class="form-label">Variation value: </label>
                                <input type="color" class="form-control form-control-color" name="variation_value" value=" {{$item->variation_value}}"  title="Choose your color">
                            </div>
                        @else
                            <div class="nameAdd" id="sizeInputContainer" style="display:flex;">
                                <label for="exampleColorInput" class="form-label">Variation value: </label>
                                <input type="text"  name="variation_value" value=" {{$item->variation_value}}"  title="Choose your size">
                            </div>
                        @endif

                        <div class="imageAdd">
                            <label>Ảnh sản phẩm: <img src="{{$item->image}}" alt=""> </label>
                            <input type="file"  name="image" value="{{$item->image}}"  title="Choose your image">

                        </div>
                        
                        <input type="submit" class="confirmAdd" 
                        style="background-color: #4CAF50; color: white; 
                        padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
 
                    </div>
                    
                </form>
                @endforeach
                <!-- <script>
                    // Lắng nghe sự kiện thay đổi của select
                    document.getElementById('options').addEventListener('change', function () {
                        var selectedValue = this.value;

                        document.getElementById('colorPickerContainer').style.display = 'none';
                        document.getElementById('sizeInputContainer').style.display = 'none';
                        
                        if (selectedValue === 'màu') {
                            document.getElementById('colorPickerContainer').style.display = 'block';
                        } else if (selectedValue === 'size') {
                            document.getElementById('sizeInputContainer').style.display = 'block';
                        }
                    });
                </script> -->
                
            </div>
@endsection

