<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to view your cart.');
        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'You need to login to add items to the cart'], 401);
        }

        $cartItem = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => 1]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }
        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        session(['cart_count' => $cartCount]);


        return response()->json([
            'message' => 'Product added to cart successfully'
            , 'cart_count' => $cartCount]);

    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'You need to login to update the cart'], 401);
        }
    
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $request->product_id)
                        ->firstOrFail();
    
        $cartItem->update(['quantity' => $request->quantity]);
    
        $itemTotal = $cartItem->product->price * $cartItem->quantity;
        $cartTotal = Cart::where('user_id', auth()->id())
                         ->get()
                         ->sum(fn($item) => $item->product->price * $item->quantity);
    
        return response()->json([
            'message' => 'Cart updated successfully!',
            'item_total' => $itemTotal,
            'cart_total' => $cartTotal
        ]);


    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'You need to login to remove items from the cart'], 401);
        }

        Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->delete();

        return response()->json(['message' => 'Product removed from cart']);
    }
}