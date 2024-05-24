@extends('layouts.adminpage')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid my-2">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thông Tin bài viết <br>{{$blog->BlogTitle}}</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="{{route('admin.blog')}}" class="btn btn-primary">Quay lại</a>
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
                <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="col-md-12">
                    <div class="mb-3">
                      <input type="text" name="blogID" id="blogID" class="form-control" value='{{$blog->BlogID}}'>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class=" mb-3">
                      <label for="blogTitle">Tiêu Đề</label>
                      <input type="text" name="blogTitle" id="blogTitle" class="form-control" placeholder="Nhập tiêu đề" value="{{$blog->BlogTitle}}">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="blogImage">Ảnh Bài Viết</label>
                      <input type="file" name="blogImage" id="blogImage" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="special">Nổi bật</label>
                      <select name="special" class="form-control">
                        <option value="{{$blog->Special}}">
                          @if ($blog->Special==1)
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

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="description">Mô Tả</label> <br>
                      <textarea name="description" id="description" cols="120" rows="5  " class="summernote" placeholder="Nhập mô tả bài viết">{{$blog->Description}}</textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="blogDetail">Chi tiết</label> <br>
                      <textarea name="blogDetail" id="blogDetail" cols="120" rows="10" class="summernote" placeholder="Nhập chi tiết bài viết">{{$blog->BlogDetail}}</textarea>
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