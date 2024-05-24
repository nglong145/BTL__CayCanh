<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
  //
  public function getShopByCate($id)
  {

    $user = User::find(session()->get('id'));
    $userid = session()->get('id');

    $tCart = DB::select('call showCart(?)', [$userid]);

    $categories = DB::table('categories')->get();

    $products = DB::table('products')
      ->select('products.ProductID', 'products.ProductName', 'Price', 'categories.SLug', 'image_products.ImgMain')
      ->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
      ->join('image_products', 'products.ProductID', '=', 'image_products.ProductID')
      ->where('categories.CategoryID', $id)
      ->paginate(12);

    return view('shop-cate', compact('categories', 'products', 'user', 'tCart'));
  }
}
