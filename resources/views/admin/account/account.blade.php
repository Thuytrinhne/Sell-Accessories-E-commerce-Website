@extends ('layouts.admin')
@section ('content')
<div class="content manage account_management">
                <div class="title_manage">
                    <h1>Quản lý tài khoản</h1>
                </div>
                <div class="manage_list">

                <div class="manage_admin">
                        <h2>Danh sách Admin</h2>
                        <a href="{{route('admin.account.add')}}" class="btn btn-primary">Thêm tài khoản Admin</a>
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{ Session::get('thong bao') }}
                            </div>
                        @endif
                        <table class="staff_account">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $ad)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->phone }}</td>
                                        <td>{{ $ad->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.account.destroy', $ad -> id) }} " method='POST'>
                                                <a href="{{ route('admin.account.edit', $ad -> id) }}" class="btn btn-info">SỬA</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">XOÁ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="manage_staff">
                        <h2>Danh sách Staff</h2>
                        <a href="{{route('admin.account.add')}}" class="btn btn-primary">Thêm tài khoản nhân viên</a>
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{ Session::get('thong bao') }}
                            </div>
                        @endif
                        <table class="staff_account">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $ad)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->phone }}</td>
                                        <td>{{ $ad->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.account.destroy', $ad -> id) }} " method='POST'>
                                                <a href="{{ route('admin.account.edit', $ad -> id) }}" class="btn btn-info">SỬA</a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">XOÁ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="manage_user">
                        <h2>Danh sách khách hàng</h2>
                        <input type="text">
                        <button>Tìm kiếm</button>
                        <table class="user_account">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Loại tài khoản</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $ad)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->full_name }}</td>
                                        <td>{{ $ad->phone }}</td>
                                        <td>{{ $ad->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.account.destroy', $ad -> id) }} " method='POST'>
                                                <a href="{{ route('admin.account.edit', $ad -> id) }}" class="btn btn-info">SỬA</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">XOÁ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection