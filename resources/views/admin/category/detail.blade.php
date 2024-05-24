@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thông Tin Danh Mục {{$category->CategoryName}}</h1>
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
                <form action="{{route('category.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- ten danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="hidden" name="categoryID" id="categoryID" class="form-control" placeholder="Title" value='{{$category->CategoryID}}'>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="categoryName">Tên Danh Mục</label>
                      <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Title" value='{{$category->CategoryName}}'>
                    </div>
                  </div>
                  <!-- anh danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="categoryImage">Ảnh Danh Mục</label>
                      <input type="file" name="categoryImage" id="categoryImage" class="form-control" placeholder="Title">
                    </div>
                    <div>
                      <label>Xem trước:</label>
                      <center class="img-fluid rounded border mb-5">

                        <img src="{{asset('assets/uploads/categories/'.$category->CategoryImage)}}" id="imagePreview" style="max-width:180px;max-height:180px;margin-top: 10px;">
                      </center>
                    </div>
                  </div>
                  <!-- nhan danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="slug">Nhãn</label>
                      <input type="text" name="slug" id="slug" class="form-control" placeholder="Title" value="{{$category->Slug}}">
                    </div>
                  </div>
                  <!-- mo ta danh muc -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="description">Mô tả</label> <br>
                      <textarea name="description" id="description" cols="50" rows="10" class="summernote" placeholder="Description">{{$category->Description}}</textarea>
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
    const fileInput = document.getElementById('categoryImage');
    const preview = document.getElementById('imagePreview');

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

  }
</script>