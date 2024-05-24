<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;

class AdminController extends Controller
{
  //
  public function index()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $users = User::where('type', '=', 'customer')->get();
      $orders = Order::get();

      return view('admin.dashboard', compact('user', 'users', 'orders'));
    } else {
      return redirect()->back();
    }
  }


  // giao diện quản lý danh mục
  public function category()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $categories = Categories::paginate(10);
      return view('admin.category.management', compact('categories', 'user'));
    } else {
      return redirect()->back();
    }
  }

  public function createCategory()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      return view('admin.category.create', compact('user'));
    } else {
      return redirect()->back();
    }
  }

  public function detailCategory($id)
  {

    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $category = Categories::find($id);
      return view('admin.category.detail', compact('category', 'user'));
    } else {
      return redirect()->back();
    }
  }

  // giao diện quản lý sản phẩm
  public function product()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $products = DB::table('products')
        ->select('products.*', 'categories.CategoryName', 'image_products.*')
        ->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
        ->join('image_products', 'products.ProductID', '=', 'image_products.ProductID')
        ->paginate(10);
      return view('admin.product.management', compact('products', 'user'));
    } else {
      return redirect()->back();
    }
  }

  public function detailProduct($id)
  {

    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $categories = Categories::get();
      $product = DB::table('products')
        ->select('products.*', 'categories.CategoryName', 'image_products.*')
        ->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
        ->join('image_products', 'products.ProductID', '=', 'image_products.ProductID')
        ->where('products.ProductID', $id)->first();
      return view('admin.product.detail', compact('product', 'user', 'categories'));
    } else {
      return redirect()->back();
    }
  }

  public function createProduct()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $categories = Categories::get();
      return view('admin.product.create', compact('user', 'categories'));
    } else {
      return redirect()->back();
    }
  }

  public function order()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $orders = DB::table('orders')->select('orders.*')->distinct()->join('order_items', 'orders.OrderID', '=', 'order_items.OrderID')->paginate(10);


      return view('admin.order.management', compact('orders', 'user',));
    } else {
      return redirect()->back();
    }
  }

  public function detailOrder($orderID)
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {

      $orderGetID = Order::find($orderID);
      $order = DB::table('orders')->join('order_items', 'order_items.OrderID', '=', 'orders.OrderID')->join('products', 'order_items.ProductID', '=', 'products.ProductID')->join('image_products', 'products.ProductID', '=', 'image_products.ProductID')->select('order_items.*', 'orders.OrderID', 'products.ProductName', 'image_products.ImgMain')->where('order_items.OrderID', $orderID)->get();
      return view('admin.order.detail', compact('user', 'order', 'orderGetID'));
    } else {
      return redirect()->back();
    }
  }


  // giao diện quản lý bài viết
  public function blog()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $blogs = Blog::paginate(10);
      return view('admin.blog.management', compact('blogs', 'user'));
    } else {
      return redirect()->back();
    }
  }

  public function createBlog()
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      return view('admin.blog.create', compact('user'));
    } else {
      return redirect()->back();
    }
  }

  public function detailBlog($id)
  {

    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $blog = Blog::find($id);
      return view('admin.blog.detail', compact('blog', 'user'));
    } else {
      return redirect()->back();
    }
  }
}
