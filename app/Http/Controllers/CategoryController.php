<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model
use Illuminate\Support\Facades\Auth; // Import Auth for user authentication

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        $cartItems = [];
        if (Auth::check()) {
            $user = Auth::user();
            $cart = session()->get("cart_{$user->id}", []);
            $cartItems = array_column($cart, 'id');
        }

        return view('products', compact('categories', 'cartItems'));
    }
}
?>

