@extends ('layouts.admin') 
<!-- extend/ include mặc định các file nằm trong view -->
@section('content')
    @error('msg')
    <div class="alert alert-danger">
        <h4 style="text-align: center;">{{$message}}</h4>
    </div>
    @enderror
<div class="content category">
                <div class="category_header">
                    <div class="header_title">
                        <h1>Quản lý danh sách danh mục</h1>
                    </div>
                </div>
                <div class="category_addlist">
                    <h2>Thêm danh mục</h2>
                    <form class="frmAddCategory" method="POST" action="{{route('admin.category.add')}}" id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div>
                    <input type="text" placeholder="Nhập danh mục mới" name="name_category" value="{{ old('name_category') }}">
                    <br>
                    <label for="">Thêm hình:</label>
                    
                    <input type="file" name="image_category">
                    @error('image_category')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                    </div>
                    <select class="frmAdd-fitContent" name="parent_id" required>
                                <option value="NULL">Danh mục cha</option>
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name_category}}</option>
                            
                                @endforeach
                            </select>
                    <button id="myBtn"  class="frmAdd-fitContent" type="submit">Xác nhận</button>
                    </form>
                </div>
                <div class="category_list">
                    <div>
                        <h2>Tìm kiếm</h2>
                        <form action="{{route('admin.category.search')}}" method="GET">
                            <input type="text" required placeholder="Nhập tên thể loại" name="search">
                            <button>Tìm kiếm</button>
                        </form>
                        
                    </div>
                    @if(count($categoryPaginate) > 0)
                    <div>
                        <h2>Danh sách thể loại</h2>
                        <table class="category_table">
                            <thead>
                                <tr>
                                    <th>Thao tác</th>
                                    <th>STT</th>
                                    <th>Mã thể loại</th>
                                    <th>Tên thể loại</th>
                                    <th>Thể loại cha</th>
                                    <th>Ảnh danh mục</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $stt = 1;
                            @endphp

                        
                        @foreach($categoryPaginate as $item)
                        <tr class="">
                        <td>
                            <form action="{{route('admin.category.destroy',['id' => $item->id])}}">
                            {{ csrf_field() }}
                            <button type="submit">
                        <span class="material-symbols-outlined">
                            delete_forever
                        </span>
                            </button>
                        
                            <a href="{{route('admin.category.edit',['id' => $item->id])}}">
                            <span class="material-symbols-outlined">
                            edit
                            </span>
                            </a>
                   
                            </form>
                        
                        </td>
                        <td>{{ $stt++ }}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name_category}}</td>
                        <td>{{$item->parent_id}}</td>
                        <td> <img src="{{$item->image_category}}" style="width :100px;height:100px"> </td>
                        </tr>
                        @endforeach
                 
                            </tbody>
                        </table>
                        <hr>
                        {{$categoryPaginate->links()}}     
                                      
                     </div>
                    @else
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Không có cái nào hết ???',
                        text: '{{ session('error') }}',
                        footer: '<a href="{{ route('admin.category') }}">Mình quay lại nhé ???</a>'
                        })

                    </script>
                    @endif
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
           
           @if(session('DestroySuccess'))
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
      
@endsection
          
