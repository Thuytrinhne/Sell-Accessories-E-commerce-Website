@extends('layouts.admin')

@section('content')
    <div class="container create_account">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Sửa thông tin tài khoản</h1>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('edit.admin', ['id'=>$admin->id] )}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <strong>Họ và tên</strong>
                                <input type="text" name="full_name" value="{{ $admin -> full_name }}"  class="form-control" placeholder="Họ và tên">
                            </div>
                            <div class="form-group mt-3">
                                <strong>Giới tính </strong> <br>
                                <input style="padding:6px 0; margin-right: 3px" type="radio" {{ $admin->sex==1?"checked":"" }} class="form-check-input" name="sex" value="1">Nam
                                <input style="padding:6px 0; margin-right: 3px" type="radio" {{ $admin->sex==0?"checked":"" }} class="form-check-input" name="sex" value="0">Nữ
                            </div>
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="tel" name="phone" value="{{ $admin -> phone }}"  class="form-control" placeholder="Số điện thoại">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" name="email" value="{{ $admin -> email }}"  class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input type="password" name="password" value="{{ $admin -> password }}"  class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input type="date" name="birth" value="{{ $admin -> birth }}"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
    

@endsection