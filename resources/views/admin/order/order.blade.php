{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\admin\orders\index.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Manage Orders')

@section('header', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Orders</h4>
    <div>
        <input type="text" id="search-orders" class="form-control" placeholder="Search by customer name or email" style="width: 300px;">
    </div>
</div>

<div class="table-responsive">
    <table class="table table-dark table-bordered table-hover align-middle text-center">
        <thead class="table-success text-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Total</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="orders-table-body">
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-3">
    {{ $orders->links('pagination::bootstrap-4') }}
</div>

<script>
    document.getElementById('search-orders').addEventListener('input', function () {
        const searchValue = this.value;

        fetch(`{{ route('orders.search') }}?search=${searchValue}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('orders-table-body');
                tableBody.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(order => {
                        const row = `
                            <tr>
                                <td>${order.id}</td>
                                <td>${order.name}</td>
                                <td>${order.email}</td>
                                <td>$${parseFloat(order.total).toFixed(2)}</td>
                                <td>${new Date(order.created_at).toLocaleString()}</td>
                                <td>
                                    <a href="/admin/orders/${order.id}" class="btn btn-sm btn-primary">View</a>
                                    <form action="/admin/orders/${order.id}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="6" class="text-center">No orders found.</td>
                        </tr>
                    `;
                }
            });
    });
</script>
@endsection