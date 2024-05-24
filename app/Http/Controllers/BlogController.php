<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
  //
  public function index()
  {
  }

  public function blogDetail($id)
  {
    $user = User::find(session()->get('id'));
    $blog = Blog::find($id);

    $Reblog = Blog::take(3)->get();
    $userid = session()->get('id');

    $tCart = DB::select('call showCart(?)', [$userid]);

    $categories = DB::table('categories')->get();
    return view('blog-detail', compact('user', 'blog', 'tCart', 'categories', 'Reblog'));
  }
}
