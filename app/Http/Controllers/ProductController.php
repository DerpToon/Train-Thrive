<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;    

class ProductController extends Controller
{
    //
    public function index()
    {
        //
        $categories=Category::with('products')->get();
        $cartItems=auth()->check()
        ? Cart::where('user_id', auth()->id())->pluck('product_id')->toArray() : [];
        return view('products.index', compact('categories', 'cartItems'));
    }
}
