<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  //
  public function index()
  {
    $userid = session()->get('id');

    $tCart = DB::select('call showCart(?)', [$userid]);
    return view('auth.login', compact('tCart'));
  }

  public function login(Request $data)
  {
    $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
    if ($user) {
      session()->put('id', $user->id);
      session()->put('type', $user->type);
      if ($user->type == 'customer') {
        return redirect('/');
      } else if ($user->type == 'admin') {
        return redirect('admin');
      }
    } else {
      return redirect('login')->with('error', "Thông tin đăng nhập không chính xác");
    }
  }

  public function logout()
  {
    session()->forget('id');
    session()->forget('type');
    return redirect('/login');
  }
}
