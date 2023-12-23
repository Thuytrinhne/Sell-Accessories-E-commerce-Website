@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')
<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <span>Trang chính</span>
                        <h1>Sửa sản phẩm</h1>
                    </div>
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

                
                @foreach($products as $item)
                <form action="{{ route('admin.product.update',[$id]) }}" method="POST" class="selection selection_add" id="addForm" style="display:block" enctype="multipart/form-data">
                   @csrf
                    <div class="addCard">
                        <div class="nameAdd">
                            <label>Tên sản phẩm: </label>
                            <input type="text" placeholder="Tên sản phẩm" name="name_product" value="{{$item->name_product}}" > 
                        </div>
                        <div class="nameAdd">
                            <label  name="description">Mô tả: </label>
                            <textarea name="description" placeholder="Nhập mô tả" style="width: 100%">{{$item->description}} </textarea>
                            
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
                            <input type="file" name = "default_image" value="{{$item->default_image}}">
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                </form>
                @endforeach
            </div>
@endsection