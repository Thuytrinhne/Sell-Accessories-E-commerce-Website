@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')
<div class="content product">
                <div class="product_header">
                    <div class="header_title">
                        <h1>Sửa danh mục sản phẩm</h1>
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

               
                
                @if($category)
                <form action="{{route('admin.category.update',[$category->id])}}" method="POST" class="selection selection_add" id="addForm" style="display:block">
                   @csrf
                    <div class="addCard">
                        <div class="nameAdd">
                            <label>Tên thể loại: </label>
                            <input type="text" placeholder="Tên thể loại" name="name_category" value=" {{$category->name_category}} " > 
                        </div>
                        
                        <div class="tag">
                            <label >Thể loại cha:</label>
                            <select name="parent_id">
                                <option value=""> Thể loại cha </option>
                                @foreach($categories as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name_category }}</option>
                                @endforeach   
                            </select>
                        </div>
                        
                        <input type="submit" class="confirmAdd">
                        
                    </div>
                </form>
                @endif
            </div>
@endsection