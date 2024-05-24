<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoryController extends Controller
{
  //
  public function add(Request $data)
  {
    $category = new Categories();
    $category->CategoryName = $data->input('categoryName');
    $category->CategoryImage = $data->file('categoryImage')->getClientOriginalName();
    $data->file('categoryImage')->move('assets/uploads/categories/', $category->CategoryImage);
    $category->Slug = $data->input('slug');
    $category->Description = $data->input('description');
    $category->save();
    return redirect('admin/category')->with('success', "Thêm danh mục thành công");
  }

  public function update(Request $data)
  {
    $id = $data->input('categoryID');
    $name = $data->input('categoryName');
    $img = $data->file('categoryImage')->getClientOriginalName();
    $data->file('categoryImage')->move('assets/uploads/categories/', $img);
    $slug = $data->input('slug');
    $des = $data->input('description');
    DB::select('call updateCategory(?,?,?,?,?)', [$id, $name, $img, $slug, $des]);
    return redirect('admin/category')->with('success', "Cập nhật thông tin danh mục thành công");
  }

  public function delete($id)
  {
    $category = Categories::find($id);
    $category->delete();
    return redirect('admin/category')->with('success', "Xóa danh mục thành công");
  }
}
