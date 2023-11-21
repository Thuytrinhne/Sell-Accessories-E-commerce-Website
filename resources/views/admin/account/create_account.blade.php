@extends('layouts.admin')

@section('content')
    <div class="container create_account">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Thêm tài khoản</h1>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.account.add')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>ID</strong>
                                <input type="text" name="id" class="form-control" placeholder="Nhập id">
                            </div>
                            <div class="form-group">
                                <strong>Tên đăng nhập</strong>
                                <input type="text" name="id" class="form-control" placeholder="Tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="text" name="id" class="form-control" placeholder="Nhập password cho admin">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Họ và tên</strong>
                                <input type="text" name="id" class="form-control" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="tel" name="id" class="form-control" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="id" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection