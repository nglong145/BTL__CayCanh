@extends('layouts.userpage')

@section('content')
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          ĐĂNG NHẬP
        </div>
        <div class="card-body">
          @if(session()->has('success'))
          <div class="alert alert-success">
            <p>{{session()->get('success')}}</p>
          </div>
          @endif
          @if(session()->has('error'))
          <div class="alert alert-danger">
            <p>{{session()->get('error')}}</p>
          </div>
          @endif
          <form action="{{route('signin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
            </div>
            <p>Bạn chưa có tài khoản <a href="{{route('register')}}">Đăng ký</a></p>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection