<?php
// filepath: c:\xampp\htdocs\Train-Thrive\app\Http\Controllers\CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to proceed to checkout.');
        }

        // Fetch cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        return view('checkout', compact('cartItems'));
    }

    /**
     * Handle the checkout process.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to complete the checkout.');
        }

        // Fetch cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,
            'total' => $total,
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        // Clear the cart
        Cart::where('user_id', Auth::id())->delete();

        // Clear cart count from session
        session()->forget('cart_count');

        return redirect()->route('thank-you')->with('success', 'Order placed successfully!');
    }
}
