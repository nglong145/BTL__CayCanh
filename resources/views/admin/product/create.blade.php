@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm Sản Phẩm</h1>
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
                <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- ten san pham -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="productName">Tên Sản Phẩm</label>
                      <input type="text" name="productName" id="productName" class="form-control" placeholder="Nhập Tên Sản Phẩm" </div>
                    </div>

                    <!-- anh san pham -->
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="productImage">Ảnh Sản Phẩm</label>
                        <input type="file" name="productImage" id="productImage" class="form-control" onchange="previewImage()">
                      </div>

                      <div>
                        <label>Xem trước:</label>
                        <center class="img-fluid rounded border">

                          <img src="" id="imagePreview" style="max-width:180px;max-height:180px;margin-top: 10px;">
                        </center>
                      </div>
                    </div>

                    <!-- danh muc & san pham noi bat -->
                    <div class="col-md-12 mt- d-flex">
                      <div class="col-md-6 mb-3">
                        <label for="categoryID">Danh Mục</label>
                        <select name="categoryID" class="form-control">
                          <option value="">
                            -- Chọn danh mục --
                          </option>
                          @foreach($categories as $dm)
                          <option value="{{$dm->CategoryID}}">{{$dm->CategoryName}}</option>
                          @endforeach

                        </select>
                      </div>

                      <div class=" col-md-6 mb-3">
                        <label for="special">Nổi bật</label>
                        <select name="special" class="form-control">
                          <option value="">--------</option>
                          <option value="1">Có</option>
                          <option value="0">Không</option>
                        </select>
                      </div>
                    </div>

                    <!-- gia san pham & so luong -->
                    <div class="col-md-8 d-flex">
                      <div class="col-md-6 mb-3">
                        <label for="quantity">Số Lượng</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value='0'>
                      </div>

                      <div class=" col-md-6 mb-3">
                        <label for="price">Giá thành</label>
                        <input type="number" name="price" id="price" class="form-control" value='0'>
                      </div>
                    </div>

                    <!-- mo ta -->
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="description">Mô tả</label> <br>
                        <textarea name="description" id="description" cols="120" rows="2" class="summernote" placeholder="Nhập mô tả sản phẩm"></textarea>
                      </div>
                    </div>

                    <!-- chi tiet thong tin san pham -->
                    <div class="col-md-12 d-flex">
                      <div class="col-md-4 mb-3">
                        <label for="info">Thông tin</label><br>
                        <textarea name="info" id="info" cols="35" rows="10" class="summernote" placeholder="Nhập thông tin sản phẩm"></textarea>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="descSub1">Chi tiết 1</label><br>
                        <textarea name="descSub1" id="descSub1" cols="35" rows="10" class="summernote" placeholder="Nhập chi tiết sản phẩm"></textarea>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="descSub2">Chi tiết 2</label><br>
                        <textarea name="descSub2" id="descSub2" cols="35" rows="10" class="summernote" placeholder="Nhập chi tiết sản phẩm"></textarea>
                      </div>

                    </div>

                    <button type="submit" class="btn btn-success" name="add">Thêm Sản Phẩm</button>
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
    }
  }
</script>