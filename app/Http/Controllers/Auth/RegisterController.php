<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function index()
    {
        $userid = session()->get('id');

        $tCart = DB::select('call showCart(?)', [$userid]);
        return view('auth.register', compact('tCart'));
    }

    public function register(Request $data)
    {
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        $newUser->avatar = $data->file('file')->getClientOriginalName();
        $data->file('file')->move('assets/uploads/profile/', $newUser->avatar);
        $newUser->type = 'customer';
        $newUser->save();

        return redirect('login')->with('success', "let's login");
    }
}
