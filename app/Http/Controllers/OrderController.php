<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.order.order', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search orders by customer name or email
        $orders = Order::where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->latest()
            ->get();

        // Return the filtered orders as JSON
        return response()->json($orders);
    }

    public function show(Order $order)
    {
        $order->load('items.product'); // Load related order items and products
        return view('admin.order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
