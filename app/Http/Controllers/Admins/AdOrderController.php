<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ImageProduct;
use App\Models\Order;

class AdOrderController extends Controller
{

  public function update(Request $data)
  {
    $user = User::find(session()->get('id'));
    if ($user->type == 'admin') {
      $order = Order::find($data->input('orderID'));
      $order->status = $data->input('status');
      $order->save();
      return redirect('admin/order')->with('success', 'Thay đổi thành công');
    } else {
      return redirect()->back();
    }
  }
}
