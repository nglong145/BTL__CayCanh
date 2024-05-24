<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

  public function index()
  {
    $user = User::find(session()->get('id'));

    $tCart = DB::select('call showCart(?)', [session()->get('id')]);
    return view('profile', compact('user', 'tCart'));
  }

  public function updateProfile(Request $data)
  {
    $user = User::find(session()->get('id'));
    $user->fullname = $data->input('fullname');
    $user->password = $data->input('password');
    $user->avatar = $data->file('file')->getClientOriginalName();
    $data->file('file')->move('assets/uploads/profile/', $user->avatar);

    $user->save();
  }
}
