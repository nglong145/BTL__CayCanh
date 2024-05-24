@extends('layouts.userpage')

@section('content')
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
        </div>
        <div class="card-body">
          <form action="{{route('signup')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="fullname" class="form-label">Họ và tên</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="avatar" class="form-label">Ảnh đại diện</label>
              <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection