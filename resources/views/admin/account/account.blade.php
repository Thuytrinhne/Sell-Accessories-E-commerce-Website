@extends ('layouts.admin')
@section ('content')
<div class="content manage account_management">
                <div class="title_manage">
                    <h1>Quản lý tài khoản</h1>
                </div>
                <div class="manage_list">

                <div class="manage_admin">
                        <h2>Danh sách Admin</h2>
                        <a href="{{route('store.admin')}}" class="btn btn-primary">Thêm tài khoản Admin</a>
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        <table class="staff_account">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    
                                    <th>Ngày sinh</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $ad)
                                    <tr>
                                        <th scope="row">{{ $ad->id }}</th>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->sex==1? "Nam" : "Nữ" }}</td>
                                        <td>{{ $ad->phone }}</td>
                                        <td>{{ $ad->email }}</td>
                                     
                                        <td>{{ $ad->birth }}</td>
                                        <td>
                                                <a href="{{ route('edit.admin', ['id' => $ad->id]) }}" class="btn btn-info">SỬA</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('destroy.admin',['id' => $ad->id]) }}" class="btn btn-danger">XOÁ</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="manage_staff">
                        <h2>Danh sách Staff</h2>
                        <a href="{{route('store.staff')}}" class="btn btn-primary">Thêm tài khoản nhân viên</a>
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        <table class="staff_account">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                 
                                    <th>Ngày sinh</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $st)
                                    <tr>
                                        <td>{{ $st->id }}</td>
                                        <td>{{ $st->full_name }}</td>
                                        <td>{{ $st->sex==1? "Nam" : "Nữ"  }}</td>
                                        <td>{{ $st->phone }}</td>
                                        <td>{{ $st->email }}</td>
                                      
                                        <td>{{ $st->birth }}</td>
                                        <td>
                                                <a href="{{ route('edit.staff', ['id' => $st->id]) }}" class="btn btn-info">SỬA</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('destroy.staff',['id' => $st->id]) }}" class="btn btn-danger">XOÁ</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="manage_user">
                        <h2>Danh sách khách hàng</h2>
                        <form action="{{ route ('admin.search_account') }}" method="POST" class="form-inline" role="form">
                            <div class="form-group">
                                @csrf
                                <input  name="q"  type="text" class="form-control" id="" placeholder="Nhập từ khoá tìm kiếm"
                                style=" width:20%; padding: 7px; display: inline-block; font-size:14px">

                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>
                        <table class="user_account">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                 
                                    <th>Ngày sinh</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $usr)
                                    <tr>
                                        <td>{{ $usr->id }}</td>
                                        <td>{{ $usr->full_name }}</td>
                                        <td>{{ $usr->sex==1? "Nam" : "Nữ"  }}</td>
                                        <td>{{ $usr->phone }}</td>
                                        <td>{{ $usr->email }}</td>
                                       
                                        <td>{{ $usr->birth }}</td>
                                        <td>
                                            <a href="{{ route('edit.user', ['id' => $usr->id]) }}" class="btn btn-info">SỬA</a>
                                            <a onclick="return confirm('Are you sure?')" href="{{ route('destroy.user',['id' => $usr->id]) }}" class="btn btn-danger">XOÁ</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection