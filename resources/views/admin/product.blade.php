@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')

@error('msg')
    <div class="alert alert-danger">
        <h4 style="text-align: center;">{{$message}}</h4>
    </div>
    @enderror

<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <span>Trang chính</span>
                        <h1>Sản phẩm</h1>
                    </div>
                    <div class="header_infor">
                        <form action="{{route('admin.product.search')}}" class="search_box">
                            <ion-icon name="search-outline"></ion-icon>
                            <input type="input" placeholder="Nhập tên sản phẩm" name="search">
                            <button type="submit"> Tìm kiếm </button>
                        </form>
                    </div>
                </div>

                <div class="product_selection">
                    <button href="#" class="product_list" onclick="showContent('selection_list')">Danh sách sản
                        phẩm</button>
                    <button href="#" class="product_add" onclick="showContent('selection_add')">Thêm sản phẩm</button>
                </div>

                @if(Session::has('success'))  
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{session('success')}}',
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

                @if (session('error'))
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Xóa thất bại',
                        text: '{{ session('error') }}',
                        footer: '<a href="">Bạn vui lòng kiểm tra lại nhé </a>'
                        })

                    </script>
                @endif

                <div class="selection selection_list">
                    @if(count($products) > 0)
                    @foreach($products as $item)
                    <nav id="product_1" class="product product_1">
                        <img src="{{$item->default_image}}">
                        <p> {{$item->name_product}} </p>
                        
                        <textarea name="description" disabled style="width: 90%"> {{$item->description}} </textarea>
                        <div style="border: 1px solid #f1f1f1;width: 90% ; margin: 10px;"></div>
                        <div class="Edit-Delete">

                            <a class="Add" href="{{route('admin.product.item',[$item->id])}}">
                                <ion-icon name="add-circle-outline"></ion-icon>
                                Details
                            </a>

                            <a href="{{route('admin.product.edit',[$item->id])}}">
                            <button class="Edit" >
                                <ion-icon name="pencil"></ion-icon>
                            Sửa</button>
                            </a>

                            <a class="Delete" href="{{route('admin.product.destroy',[$item->id])}}">
                            <ion-icon name="trash-bin"></ion-icon>
                                Xóa
                            </a>
                        </div>
                    </nav>
                    @endforeach
                    @else
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Không tìm thấy',
                        text: 'Không có rồi bạn ơi ???',
                        footer: '<a href="{{route('admin.product')}}">Chúng ta quay lại nhé ??? </a>'
                        })

                    </script>
                    @endif
                    
                </div>
               
                        <div style ="margin:0 auto">{{ $products->links() }}</div>
                
                <form action="{{ route('admin.product.add') }}" method="POST" class="selection selection_add" id="addForm" enctype="multipart/form-data">
                   @csrf
                    <div class="addCard">
                        <div class="nameAdd">
                            <label>Tên sản phẩm: </label>
                            <input type="text" placeholder="Tên sản phẩm" name="name_product" value="{{ old('name_product') }}" >
                            @error('name_product')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="nameAdd">
                            <label  name="description">Mô tả: </label>
                            <textarea name="description" placeholder="Nhập mô tả" style="width: 100%" >{{ old('description') }} </textarea>
                            
                        </div>
                        
                        <div class="tag">
                            <label >Thể loại</label>
                            <select name="category_id">
                                @foreach($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name_category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="nameAdd">
                            <label  name="default_image">Ảnh mặc định: </label>
                            <input type="file" name = "default_image" value="{{old('default_image')}}">
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                </form>
            </div>

@endsection