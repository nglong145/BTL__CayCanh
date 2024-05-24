@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trang Chủ</h1>
        </div>
        <div class="col-sm-6">

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
        <div class="col-lg-4 col-6">
          <div class="small-box card">
            @php
            $amountOrders=0;
            $customer=0;
            $money=0;
            @endphp

            @foreach($users as $kh)
            @php
            $customer+=1;
            @endphp
            @endforeach

            @foreach($orders as $dh)
            @php
            $amountOrders+=1;

            $money +=$dh->Total ;
            @endphp

            @endforeach
            <div class="inner">
              <h3>{{$amountOrders}}</h3>
              <p>Đơn Hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer text-dark">Xem Thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box card">
            <div class="inner">
              <h3>{{$customer}}</h3>
              <p>Khách Hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer text-dark">Xem Thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box card">
            <div class="inner">
              <h3>{{number_format($money)}} vnđ</h3>
              <p>Doanh Thu</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
  <!-- /.content-wrapper -->

</div>
@endsection