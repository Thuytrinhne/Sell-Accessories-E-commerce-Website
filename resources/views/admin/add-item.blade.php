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

                <div class="manage_admin">
                        <a href="{{route('admin.product.item.create',[$product])}}">Thêm sản phẩm chi tiết</a>
                       
                        <table class="staff_account">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Giá</th>
                                    <th>Giá discount</th>
                                    <th>Số lượng</th>
                                    <th>SKU</th>
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
                                    <td class = "table_img-wrapper"> <img src="{{$item->image}} " alt=" {{$item->id}}" class="table_img">  </td>
                                   
                                    <td><a href="{{ route('admin.product.item.edit',[$product]) }}"><button>Sửa tài khoản</button></a>
                                    
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
@endsection