@extends ('layouts.admin')
@section ('content')

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

<div class="content manage">
    <div class="title_manage">
        <h1>Chi tiết sản phẩm</h1>
    </div>
    <div class="manage_list">

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

        <div class="manage_admin">
                            <a class="Add_item_product" href="{{route('admin.product.item.create',[$product])}}">
                                
                                <button class="Add_item_product_btn">
                                <ion-icon name="add-circle-outline"></ion-icon>
                                Thêm sản phẩm chi tiết
                            </button></a>
                        
                            <table class="staff_account">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Giá</th>
                                        <th>Giá discount</th>
                                        <th>Số lượng</th>
                                        <th>SKU</th>
                                        <th>Variation</th>
                                        <th>Variation value</th>
                                        <th>Ảnh</th>                                   
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $stt = 1;
                                    @endphp
                                    
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td> {{$item->price}} </td>
                                        <td> {{$item->discount_price}} </td>
                                        <td> {{$item->quantity}} </td>
                                        <td> {{$item->SKU}}  </td>
                                        <td> {{$item->name}}  </td>
                                        <td> {{$item->variation_value}}  </td>
                                        <td class = "table_img-wrapper"> <img src="{{$item->image}} " alt=" {{$item->id}}" class="table_img">  </td>
                                    
                                        <td>
                                            <a href="{{ route('admin.product.item.edit',[$item->id]) }}">
                                                <button class="edit_product_item">Sửa</button></a>
                                            <a href="{{ route('admin.product.item.destroy',[$item->id]) }}">
                                                <button class="delete_product_item">Xóa</button></a>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

        </div>   
    </div>
@endsection