<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdBlogController extends Controller
{
  //
  public function add(Request $data)
  {
    $blog = new Blog();
    $blog->BlogTitle = $data->input('blogTitle');
    $blog->BlogImage = $data->file('blogImage')->getClientOriginalName();
    $data->file('blogImage')->move('assets/uploads/blogs/', $blog->BlogImage);
    $blog->Special = $data->input('special');
    $blog->Description = $data->input('description');
    $blog->BlogDetail = $data->input('blogDetail');
    $blog->save();
    return redirect('admin/blog')->with('success', "Thêm bài viết thành công");
  }

  public function update(Request $data)
  {
    $blog = Blog::find($data->input('blogID'));
    $blog->BlogTitle = $data->input('blogTitle');

    if ($data->file('blogImage') != null) {
      $blog->BlogImage = $data->file('blogImage')->getClientOriginalName();
      $data->file('blogImage')->move('assets/uploads/blogs/', $blog->BlogImage);
    }

    $blog->Special = $data->input('special');
    $blog->Description = $data->input('description');
    $blog->BlogDetail = $data->input('blogDetail');
    $blog->save();
    return redirect('admin/blog')->with('success', "Cập nhật bài viết thành công");
  }

  public function delete($id)
  {
    $blog = Blog::find($id);
    $blog->delete();
    return redirect('admin/blog')->with('success', "Xóa bài viết thành công");
  }
}
