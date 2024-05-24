@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thông Tin Sản Phẩm <br> {{$product->ProductName}}</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('admin.product')}}" class="btn btn-primary">Quay lại</a>
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
              <div class="row d-block">
                <form action="{{route('product.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!--ma san pham -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="hidden" name="productID" id="productID" class="form-control" placeholder="Title" value='{{$product->ProductID}}'>
                    </div>
                  </div>

                  <!-- ten san pham -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="productName">Tên Sản Phẩm</label>
                      <input type="text" name="productName" id="productName" class="form-control" value='{{$product->ProductName}}'>
                    </div>
                  </div>

                  <!-- anh san pham -->
                  <div class="col-md-12">
                    <div class="mb-3 ">

                      <label for="productImage">Ảnh Sản Phẩm</label>
                      <input type="file" name="productImage" id="productImage" class="form-control" onchange="previewImage()" value="{{ $product->ImgMain}}">

                    </div>

                    <div>
                      <label>Xem trước:</label>
                      <center class="img-fluid rounded border mb-5">

                        <img src="{{asset('assets/uploads/products/'.$product->ImgMain)}}" id="imagePreview" style="max-width:180px;max-height:180px;margin-top: 10px;">
                      </center>
                    </div>

                  </div>

                  <!-- danh muc & san pham noi bat -->
                  <div class="col-md-12 d-flex">
                    <div class="col-md-6 mb-3">
                      <label for="categoryID">Danh Mục</label>
                      <select name="categoryID" class="form-control">
                        <option value="{{$product->CategoryName}}">
                          {{$product->CategoryName}}
                        </option>
                        @foreach($categories as $dm)
                        <option value="{{$dm->CategoryID}}">{{$dm->CategoryName}}</option>
                        @endforeach

                      </select>
                    </div>

                    <div class=" col-md-6 mb-3">
                      <label for="special">Nổi bật</label>
                      <select name="special" class="form-control">
                        <option value="{{$product->Special}}">
                          @if ($product->Special==1)
                          Có
                          @else
                          Không
                          @endif
                        </option>
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                      </select>
                    </div>
                  </div>

                  <!-- gia san pham & so luong -->
                  <div class="col-md-8 d-flex">
                    <div class="col-md-6 mb-3">
                      <label for="quantity">Số Lượng</label>
                      <input type="number" name="quantity" id="quantity" class="form-control" value='{{$product->Quantity}}'>
                    </div>

                    <div class=" col-md-6 mb-3">
                      <label for="price">Giá thành</label>
                      <input type="text" name="price" id="price" class="form-control" value='{{number_format($product->Price)}}'>
                    </div>
                  </div>

                  <!-- mo ta -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="description">Mô tả</label> <br>
                      <textarea name="description" id="description" cols="120" rows="2" class="summernote" placeholder="Description">{{$product->Description}}</textarea>
                    </div>
                  </div>

                  <!-- chi tiet thong tin san pham -->
                  <div class="col-md-12 d-flex">
                    <div class="col-md-4 mb-3">
                      <label for="info">Thông tin</label><br>
                      <textarea name="info" id="info" cols="35" rows="10" class="summernote" placeholder="Description">{{$product->info}}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="descSub1">Chi tiết 1</label><br>
                      <textarea name="descSub1" id="descSub1" cols="35" rows="10" class="summernote" placeholder="Description">{{$product->descSub1}}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="descSub2">Chi tiết 2</label><br>
                      <textarea name="descSub2" id="descSub2" cols="35" rows="10" class="summernote" placeholder="Description">{{$product->descSub2}}</textarea>
                    </div>

                  </div>

                  <button type="submit" class="btn btn-success" name="update">Cập Nhật Danh Mục</button>
                </form>
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

<script>
  function previewImage() {
    const fileInput = document.getElementById('productImage');
    const preview = document.getElementById('imagePreview');

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "{{ $product->ImgMain }}"; // Reset to the existing image if no file is selected
    }
  }
</script>