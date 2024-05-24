@extends('layouts.userpage')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Phần hiển thị thông tin -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Thông tin tài khoản</div>
                <div class="card-body d-flex">
                    <img src="{{asset('assets/uploads/profile/'.$user->avatar)}}" class="img-fluid mb-3" alt="Avatar" style="width: 100px; height: 100px; border:2px solid #7fad39 ;border-radius: 50%; margin-right: 20px;">
                    <div class="info">
                        <p><strong>Tên người dùng:</strong> {{$user->fullname}}</p>
                        <p><strong>Email:</strong> {{$user->email}}</p>
                        <p class="d-flex"><strong>Mật khẩu:</strong>
                            <input type="password" class="form-control" id="password" value="{{$user->password}}" readonly />
                            <button class="togglePass" onclick="password()"><i class="fa fa-eye" id="eye-icon"></i></button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Phần form thay đổi thông tin -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Thay đổi thông tin tài khoản</div>
                <div class="card-body">
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Tên người dùng</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Nhập tên người dùng" require>
                        </div>
                        <div class="form-group">
                            <label for="file">Ảnh đại diện</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" require>

                        </div>
                        <!-- Thêm các trường thông tin khác tại đây -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function password() {
        var passwordField = document.getElementById("password");
        var icon = document.getElementById("eye-icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection