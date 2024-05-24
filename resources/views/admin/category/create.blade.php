@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm Danh Mục</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('admin.category')}}" class="btn btn-primary">Quay lại</a>
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
                <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- ten danh muc -->
                  <div class="col-md-12">
                    <div class=" mb-3">
                      <label for="categoryName">Tên Danh Mục</label>
                      <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                  </div>
                  <!-- anh danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="categoryImage">Ảnh Danh Mục</label>
                      <input type="file" name="categoryImage" id="categoryImage" class="form-control" onchange="previewImage()">
                    </div>
                    <div>
                      <label>Xem trước:</label>
                      <center class="img-fluid rounded border">

                        <img src="" id="imagePreview" style="max-width:180px;max-height:180px;margin-top: 10px;">
                      </center>
                    </div>
                  </div>
                  <!-- nhan danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="slug">Nhãn Danh Mục</label>
                      <input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập nhãn danh mục ex: caycanh">
                    </div>
                  </div>
                  <!-- mo ta danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="description">Mô tả</label> <br>
                      <textarea name="description" id="description" cols="50" rows="10" class="summernote" placeholder="Nhập mô tả"></textarea>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success" name="add">Thêm Danh Mục</button>
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
    const fileInput = document.getElementById('categoryImage');
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