<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProductDetailController extends Controller
{
  //
  public function index($id)
  {
    $user = User::find(session()->get('id'));
    $userid = session()->get('id');

    $tCart = DB::select('call showCart(?)', [$userid]);

    $categories = DB::table('categories')->get();

    $product = DB::select('call getProductDetail(?)', [$id]);

    $simlarproducts = DB::select('CALL getsimilar(?)', [$id]);

    return view('product-detail', compact('categories', 'product', 'simlarproducts', 'user', 'tCart'));
  }
}
