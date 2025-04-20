<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch categories with their products
        $categories = Category::with('products')->get();

        // Get cart items for the authenticated user
        $cartItems = Auth::check()
            ? Cart::where('user_id', Auth::id())->pluck('product_id')->toArray()
            : [];

        // Return the view with categories and cart items
        return view('products', compact('categories', 'cartItems'));
    }
}