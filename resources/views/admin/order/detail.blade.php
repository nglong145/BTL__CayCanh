@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thông Tin Đơn Hàng</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('admin.order')}}" class="btn btn-primary">Quay lại</a>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <form action="{{route('order.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="hidden" name="orderID" id="orderID" class="form-control" placeholder="Title" value='{{$orderGetID->OrderID}}'>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="status">Trạng Thái Đơn Hàng</label>
                      <select name="status" class="form-control">
                        <option value="{{$orderGetID->status}}">
                          {{$orderGetID->status}}
                        </option>
                        <option value="Hủy Bỏ">Hủy Bỏ</option>
                        <option value="Đã Đặt Hàng">Đã Đặt Hàng </option>
                        <option value="Đang Giao Hàng">Đang Giao Hàng</option>
                        <option value="Giao Hàng Thành Công">Giao Hàng Thành Công</option>

                      </select>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success" name="update">Cập Nhật Đơn Hàng</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th width="60">STT</th>
                      <th>Sản Phẩm</th>
                      <th>Ảnh Sản Phẩm</th>
                      <th>Số Lượng</th>
                      <th>Đơn Giá</th>
                      <th>Số Tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i=0; @endphp

                    @foreach($order as $oi)
                    <tr>
                      @php $i++;
                      @endphp
                      <td>{{$i}}</td>
                      <td>{{$oi->OrderID}}</td>
                      <td>{{$oi->ProductName}}</td>
                      <td><img src=" {{asset('assets/uploads/products/'.$oi->ImgMain)}}" class="img" width="70" alt="product">
                      </td>
                      <td>{{$oi->OQuantity}}</td>
                      <td>{{number_format($oi->Price)}}</td>
                      <td>{{number_format($oi->OQuantity * $oi->Price)}}</td>


                    </tr>
                    @endforeach



                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
@endsection