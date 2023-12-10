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
                <form action="{{route('store.user')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Họ và tên</strong>
                                <input type="text" name="full_name" class="form-control" placeholder="Họ và tên">
                                @error('full_name')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <strong>Giới tính </strong> <br>
                                <input style="padding:6px 0; margin-right: 3px" type="radio" class="form-check-input" name="sex" value="1">Nam
                                <input style="padding:6px 0; margin-right: 3px" type="radio" class="form-check-input" name="sex" value="0">Nữ
                                @error('gender')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại">
                                @error('phone')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="birth" class="form-control" placeholder="Họ tên">
                                @error('birthday')
                                    <span style="color: red; ">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection