@extends ('layouts.admin')
@section ('content')
<div class="content manage">
                <div class="title_manage">
                    <h1>Quản lý tài khoản</h1>
                </div>
                <div class="manage_list">

                <div class="manage_admin">
                        <h2>Danh sách Admin</h2>
                        <button>Thêm tài khoản Admin</button>
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
                                <tr>
                                    <td>1</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>

                                    <td><button>Xóa tài khoản</button>
                                    <button>Sửa tài khoản</button>
                                </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>

                                    <td><button>Xóa tài khoản</button>
                                    <button>Sửa tài khoản</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="manage_staff">
                        <h2>Danh sách Staff</h2>
                        <button>Thêm tài khoản staff</button>
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
                                <tr>
                                    <td>1</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>

                                    <td><button>Xóa tài khoản</button>
                                    <button>Sửa tài khoản</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>

                                    <td><button>Xóa tài khoản</button>
                                    <button>Sửa tài khoản</button></td>
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
                                <tr>
                                    <td>1</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>
                                    <td>Vip</td>
                                    <td><button>Xóa tài khoản</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>
                                    <td>Normal</td>
                                    <td><button>Xóa tài khoản</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>user123</td>
                                    <td>Nguyễn Văn Phong</td>
                                    <td>0948346245</td>
                                    <td>21522461@gmail.com</td>
                                    <td>Normal</td>
                                    <td><button>Xóa tài khoản</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection