<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request) {
        $cart = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw("quantity + $request->quantity")]
        );
        return response()->json($cart);
    }

    public function removeFromCart($id) {
        Cart::where('user_id', auth()->id())->where('product_id', $id)->delete();
        return response()->json(['message' => 'Item removed']);
    }
}

