@extends('layouts.app')

@section('title', $customer->name)

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>{{ $customer->name }}</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $customer->email }}</p>
                <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                <p><strong>Address:</strong> {{ $customer->address }}</p>
                <p><strong>Created:</strong> {{ $customer->created_at->format('M d, Y H:i') }}</p>
            </div>
        </div>

        <!-- Orders Section -->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">Orders</h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('orders.create', ['customer_id' => $customer->id]) }}" class="btn btn-sm btn-primary">Create Order</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customer->orders as $order)
                            <tr>
                                <td><strong>{{ $order->order_number }}</strong></td>
                                <td>Rs.{{ number_format($order->amount, 2) }}</td>
                                <td><span class="badge {{ strtolower($order->status) }}">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                <td><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No orders yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @if($customer->profile_image)
            <div class="card">
                <img src="{{ asset('storage/' . $customer->profile_image) }}" class="card-img-top" alt="Profile">
            </div>
        @endif
    </div>
</div>
@endsection
