@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1>Sản Phẩm Cây Cảnh</h1>
        </div>
        <div class="col-sm-4 message">
          @if(session()->has('success'))
          <div class="alert alert-success">
            <p>{{session()->get('success')}}</p>
          </div>
          @endif
        </div>
        <div class="col-sm-4 text-right">
          <a href="{{route('product.create')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group" style="width: 250px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th width="60">ID</th>
                <th>Tên Sản Phẩm</th>
                <th width="80">Ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Nổi bật</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $sp)
              <tr>
                <td>{{$sp->ProductID}}</td>
                <td><a href="#">{{$sp->ProductName}}</a></td>
                <td><img src="{{asset('assets/uploads/products/'.$sp->ImgMain)}}" class="img" width="50"></td>
                <td style="padding: 15px 40px">{{$sp->Quantity}}</td>
                <td>{{number_format($sp->Price)}}</td>
                <td style="padding: 25px 30px">@if($sp->Special == 1)
                  &#10003; <!-- Dấu tích -->
                  @else
                  &#10005; <!-- Dấu x -->
                  @endif</td>

                <td>
                  <a href="{{route('product.detail',['id'=>$sp->ProductID])}}">
                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                  </a>
                  <a href="{{route('product.delete',['id'=>$sp->ProductID])}}" class="text-danger w-4 h-4 mr-1">
                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>


@endsection