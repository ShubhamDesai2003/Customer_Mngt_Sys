@extends('layouts.app')

@section('title', 'Order ' . $order->order_number)

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>Order {{ $order->order_number }}</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Order Details</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                        <p><strong>Amount:</strong> ${{ number_format($order->amount, 2) }}</p>
                        <p><strong>Status:</strong> <span class="badge {{ strtolower($order->status) }}">{{ $order->status }}</span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Order Date:</strong> {{ $order->order_date->format('M d, Y H:i') }}</p>
                        <p><strong>Created:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Last Updated:</strong> {{ $order->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <a href="{{ route('customers.show', $order->customer) }}">{{ $order->customer->name }}</a></p>
                        <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone:</strong> {{ $order->customer->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->customer->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Order Summary</h5>
            </div>
            <div class="card-body">
                <div class="summary-item d-flex justify-content-between mb-2">
                    <span>Amount:</span>
                    <strong>${{ number_format($order->amount, 2) }}</strong>
                </div>
                <hr>
                <div class="summary-item d-flex justify-content-between mb-2">
                    <span>Status:</span>
                    <strong><span class="badge {{ strtolower($order->status) }}">{{ $order->status }}</span></strong>
                </div>
                <hr>
                <div class="summary-item d-flex justify-content-between">
                    <span>Customer:</span>
                    <strong>{{ $order->customer->name }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
