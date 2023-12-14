@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')
<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <span>Trang chính</span>
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
                    <button href="#" class="product_list" onclick="showContent('selection_list')">Danh sách sản
                        phẩm</button>
                    <button href="#" class="product_add" onclick="showContent('selection_add')">Thêm sản phẩm</button>
                    <script>

                    </script>
                </div>

                @if(Session::has('addsuccess'))  
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{session('addsuccess')}}',
                        showConfirmButton: false,
                        timer: 2000
                        })
                    </script>
                    
                @endif

                @if(Session::has('DestroySuccess'))  
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{session('DestroySuccess')}}',
                        showConfirmButton: false,
                        timer: 2000
                        })
                    </script>
                    
                @endif

                <div class="selection selection_list">
                    <nav id="product_1" class="product product_1">
                        <img src="/Assets/Images/product_1.jpg">
                        <p>Cài tóc</p>
                        <label id="old_price">
                            <span>199000</span>
                            <span>₫</span>
                        </label>
                        <label id="discount_price">
                            <span>188000</span>
                            <span>₫</span>
                        </label>
                        <p>Số lượng: 15</p>
                        <div class="sku_code">
                            <span>SKU:</span>
                            <span>1112312313123</span>
                        </div>


                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">
                            <button class="Edit">
                                <ion-icon name="pencil"></ion-icon>
                                Sửa</button>
                            <button class="Delete">
                                <ion-icon name="trash-bin"></ion-icon>
                                Xóa</button>
                        </div>
                    </nav>
                    <nav id="product_1" class="product product_1">
                        <img src="/Assets/Images/product_1.jpg">
                        <p>Cài tóc</p>
                        <label id="old_price">
                            <span>199000</span>
                            <span>₫</span>
                        </label>
                        <label id="discount_price">
                            <span>188000</span>
                            <span>₫</span>
                        </label>
                        <p>Số lượng: 15</p>
                        <div class="sku_code">
                            <span>SKU:</span>
                            <span>1112312313123</span>
                        </div>


                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">
                            <button class="Edit">
                                <ion-icon name="pencil"></ion-icon>
                                Sửa</button>
                            <button class="Delete">
                                <ion-icon name="trash-bin"></ion-icon>
                                Xóa</button>
                        </div>
                    </nav>
                    <nav id="product_1" class="product product_1">
                        <img src="/Assets/Images/product_1.jpg">
                        <p>Cài tóc</p>
                        <label id="old_price">
                            <span>199000</span>
                            <span>₫</span>
                        </label>
                        <label id="discount_price">
                            <span>188000</span>
                            <span>₫</span>
                        </label>
                        <p>Số lượng: 15</p>
                        <div class="sku_code">
                            <span>SKU:</span>
                            <span>1112312313123</span>
                        </div>


                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">
                            <button class="Edit">
                                <ion-icon name="pencil"></ion-icon>
                                Sửa</button>
                            <button class="Delete">
                                <ion-icon name="trash-bin"></ion-icon>
                                Xóa</button>
                        </div>
                    </nav>
                    <nav id="product_1" class="product product_1">
                        <img src="/Assets/Images/product_1.jpg">
                        <p>Cài tóc</p>
                        <label id="old_price">
                            <span>199000</span>
                            <span>₫</span>
                        </label>
                        <label id="discount_price">
                            <span>188000</span>
                            <span>₫</span>
                        </label>
                        <p>Số lượng: 15</p>
                        <div class="sku_code">
                            <span>SKU:</span>
                            <span>1112312313123</span>
                        </div>


                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">
                            <button class="Edit">
                                <ion-icon name="pencil"></ion-icon>
                                Sửa</button>
                            <button class="Delete">
                                <ion-icon name="trash-bin"></ion-icon>
                                Xóa</button>
                        </div>
                    </nav>
                    <nav id="product_1" class="product product_1">
                        <img src="/Assets/Images/product_1.jpg">
                        <p>Cài tóc</p>
                        <label id="old_price">
                            <span>199000</span>
                            <span>₫</span>
                        </label>
                        <label id="discount_price">
                            <span>188000</span>
                            <span>₫</span>
                        </label>
                        <p>Số lượng: 15</p>
                        <div class="sku_code">
                            <span>SKU:</span>
                            <span>1112312313123</span>
                        </div>


                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">
                            <button class="Edit">
                                <ion-icon name="pencil"></ion-icon>
                                Sửa</button>
                            <button class="Delete">
                                <ion-icon name="trash-bin"></ion-icon>
                                Xóa</button>
                        </div>
                    </nav>
                </div>

                <form action="{{ route('admin.product.add') }}" method="POST" class="selection selection_add" id="addForm">
                   @csrf
                    <div class="addCard">
                        <div class="nameAdd">
                            <label>Tên sản phẩm: </label>
                            <input type="text" placeholder="Tên sản phẩm" name="name_product">
                        </div>
                        <div class="nameAdd">
                            <label  name="description">Mô tả: </label>
                            <input type="text" placeholder="Mô tả" name="description">
                        </div>
                        
                        <div class="tag">
                            <label >Thể loại</label>
                            <select name="category_id">
                                @foreach($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name_category }}</option>
                                @endforeach
                            </select>

                            <button onclick="AddNewTag()">+</button>
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                </form>
            </div>
@endsection