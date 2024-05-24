<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $data)
    {
        $userid = session()->get('id');
        if (session()->has('id')) {
            $order = new Order();
            $order->CustomerID = $userid;
            $order->FullName = $data->input('fullname');
            $order->Address = $data->input('address');
            $order->Phone = $data->input('phone');
            $order->Total = $data->input('total');
            $order->payment = $data->input('payment');
            $order->Status = "đặt hàng";


            if ($order->save()) {
                $cartItems = CartItem::join('carts', 'cart_items.CartID', '=', 'carts.CartID')->where('CustomerID', $userid)->get();
                foreach ($cartItems as $cartItem) {
                    $product = Products::find($cartItem->ProductID);
                    $orderItem = new OrderItem();
                    $orderItem->OrderID = $order->OrderID;
                    $orderItem->ProductID = $cartItem->ProductID;
                    $orderItem->OQuantity = $cartItem->CartQuantity;
                    $orderItem->Price = $product->Price;
                    $orderItem->save();
                }
                Cart::where('CustomerID', $userid)->delete();
            }

            return redirect()->back()->with('success', 'Thanh toán thành công');
        } else {
            return redirect('login')->with('error', 'Vui Lòng đăng nhập!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
