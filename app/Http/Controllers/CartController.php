<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->has('id')) {
            $userid = session()->get('id');
            $user = User::find($userid);
            $categories = DB::table('categories')->get();

            $tCart = DB::select('call showCart(?)', [$userid]);

            $cart = DB::select('call showCart(?)', [$userid]);

            return view('cart', compact('categories', 'cart', 'user', 'tCart'));
        } else {
            return redirect('login')->with('error', 'Đăng nhập đi bạn!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $data)
    {
        if (session()->has('id')) {
            $productid = $data->input('ProductID');
            $quantity = $data->input('Quantity');
            $userid = session()->get('id'); // Lấy id của người dùng đã đăng nhập

            // Kiểm tra xem giỏ hàng trong csdl
            $cart = Cart::where('CustomerID', $userid)->first();

            if ($cart) {

                // Kiểm tra xem sản phẩm có trong giỏ hàng chưa
                $cartItem = CartItem::where('CartID', $cart->CartID)->where('ProductID', $productid)->first();
                if ($cartItem) {
                    $cartItem->CartQuantity += $quantity;
                    $cartItem->save();
                } else {
                    $cartItem = new CartItem();
                    $cartItem->CartID = $cart->CartID;
                    $cartItem->ProductID = $productid;
                    $cartItem->CartQuantity += $quantity;
                    $cartItem->save();
                }
            } else {
                // Nếu giỏ hàng không tồn tại
                $cart = new Cart();
                $cart->CustomerID = $userid;
                $cart->save();

                $cartitem = CartItem::where('CartID', $cart->CartID)->where('ProductID', $productid)->first();
                if ($cartitem) {
                    $cartitem->CartQuantity += $quantity;
                    $cartitem->save();
                } else {
                    $cartItem = new CartItem();
                    $cartItem->CartID = $cart->CartID;
                    $cartItem->ProductID = $productid;
                    $cartItem->CartQuantity += $quantity;
                    $cartItem->save();
                }
            }

            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        } else {
            return redirect('login')->with('error', 'Dang nhap di bro!');
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data,)
    {
        $cartitemids = (array)$data->input('CartItemID');
        $productIDs = $data->input('ProductID');
        $quantities = $data->input('CartQuantity');

        foreach ($cartitemids as $index => $cartItemID) {
            $quantity = $quantities[$index];
            $cartItem = CartItem::findOrFail($cartItemID);
            $currentQuantity = $cartItem->CartQuantity;
            $quantityDifference = $quantity - $currentQuantity;

            // cập nhật số lượng bảng cart_items
            $cartItem->CartQuantity = $quantity;
            $cartItem->save();

            $productID = $productIDs[$index];
            $product = Products::findOrFail($productID);
            if ($quantityDifference > 0) {
                $product->Quantity -= $quantityDifference; // Trừ số lượng nếu cập nhật thêm
            } elseif ($quantityDifference < 0) {
                $product->Quantity += abs($quantityDifference); // Cộng số lượng nếu cập nhật giảm
            }
            $product->save();
        }

        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = CartItem::find($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function checkout()
    {
        $userid = session()->get('id');
        $user = User::find($userid);

        $categories = DB::table('categories')->get();
        $checkout = DB::select('call showCart(?)', [$userid]);

        $tCart = DB::select('call showCart(?)', [$userid]);

        return view('checkout', compact('categories', 'checkout', 'user', 'tCart'));
    }
}
