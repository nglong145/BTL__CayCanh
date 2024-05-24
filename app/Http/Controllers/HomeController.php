<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function index()
    {


        $userid = session()->get('id');

        $user = User::find(session()->get('id'));

        $tCart = DB::select('call showCart(?)', [$userid]);

        $categories = DB::table('categories')->get();

        $products = DB::select('CALL getFeaturedProduct()');

        $blogs = DB::table('blogs')->where('Special', 1)->get();

        return view('home', compact('categories', 'products', 'user', 'blogs', 'tCart'));
    }

    public function shop()
    {

        $user = User::find(session()->get('id'));

        $userid = session()->get('id');
        $tCart = DB::select('call showCart(?)', [$userid]);

        $categories = DB::table('categories')->get();

        // $products = DB::select('CALL getShop()');

        $products = DB::table('products')
            ->select('products.ProductID', 'products.ProductName', 'Price', 'categories.SLug', 'image_products.ImgMain')
            ->join('categories', 'products.CategoryID', '=', 'categories.CategoryID')
            ->join('image_products', 'products.ProductID', '=', 'image_products.ProductID')
            ->paginate(12);

        return view('shop', compact('categories', 'products', 'user', 'tCart'));
    }

    public function blog()
    {

        $user = User::find(session()->get('id'));
        $userid = session()->get('id');

        $tCart = DB::select('call showCart(?)', [$userid]);

        $categories = DB::table('categories')->get();

        $blogs = Blog::paginate(6);


        return view('blog', compact('categories', 'blogs', 'user', 'tCart'));
    }

    public function searchHome(Request $data)
    {
        $user = User::find(session()->get('id'));
        $userid = session()->get('id');

        $tCart = DB::select('call showCart(?)', [$userid]);

        $categories = DB::table('categories')->get();

        $keyword = $data->input('keyword');
        $productSearch = Products::join('image_products', 'products.ProductID', '=', 'image_products.ProductID')->where('ProductName', 'like', "%$keyword%")->select('products.ProductID', 'ProductName', 'Price', 'image_products.ImgMain')->paginate(3);
        return view('search-result', compact('productSearch', 'user', 'categories', 'tCart', 'keyword'));
    }
}
