<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\ImageProduct;

class AdProductController extends Controller
{
  //
  public function add(Request $data)
  {
    $product = new Products();
    $product->ProductName = $data->input('productName');
    $product->CategoryID = $data->input('categoryID');
    $product->Special = $data->input('special');
    $product->Quantity = $data->input('quantity');
    $product->Price = $data->input('price');
    $product->Description = $data->input('description');
    $product->save();


    $img_product = new ImageProduct();
    $img_product->ProductId = $product->ProductID;
    if ($data->file('productImage') != null) {
      $img_product->ImgMain = $data->file('productImage')->getClientOriginalName();
      $data->file('productImage')->move('assets/uploads/products/', $img_product->ImgMain);
    }
    $img_product->info = $data->input('info');
    $img_product->descSub1 = $data->input('descSub1');
    $img_product->descSub2 = $data->input('descSub2');


    $img_product->save();
    return redirect('admin/product')->with('success', "Thêm sản phẩm thành công");
  }

  public function update(Request $data)
  {
    $product = Products::find($data->input('productID'));
    $product->ProductName = $data->input('productName');
    $product->CategoryID = $data->input('categoryID');
    $product->Special = $data->input('special');
    $product->Quantity = $data->input('quantity');
    $product->Price = $data->input('price');
    $product->Description = $data->input('description');
    $product->save();

    $img_product = ImageProduct::where('ProductID', $data->input('productID'))->first();
    if ($data->file('productImage') != null) {
      $img_product->ImgMain = $data->file('productImage')->getClientOriginalName();
      $data->file('productImage')->move('assets/uploads/products/', $img_product->ImgMain);
    }
    $img_product->info = $data->input('info');
    $img_product->descSub1 = $data->input('descSub1');
    $img_product->descSub2 = $data->input('descSub2');
    $img_product->save();

    return redirect('admin/product')->with('success', "Cập nhật sản phẩm thành công");
  }

  public function delete($id)
  {
    $img_product = ImageProduct::where('ProductID', $id)->first();
    $img_product->delete();
    Products::find($id)->delete();
    return redirect('admin/product')->with('success', "Xóa sản phẩm thành công");
  }
}
