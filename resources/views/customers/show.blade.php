@extends('layouts.app')

@section('title', $customer->name)

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">{{ $customer->name }}</h1>
        <div>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            @if(auth()->user()->isAdmin())
                <form action="{{ route('customers.destroy', $customer) }}" method="POST" 
                      style="display: inline;" 
                      onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $customer->getProfileImageUrl() }}" alt="{{ $customer->name }}" 
                         class="rounded-circle mb-3" width="150" height="150">
                    <h5 class="card-title">{{ $customer->name }}</h5>
                    <p class="text-muted">Customer</p>
                    <hr>
                    <p class="mb-1">
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                    </p>
                    <p class="mb-1">
                        <strong>Phone:</strong><br>
                        <a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a>
                    </p>
                    <p class="mb-1">
                        <strong>Address:</strong><br>
                        {{ $customer->address }}
                    </p>
                    <hr>
                    <small class="text-muted">
                        Created: {{ $customer->created_at->format('M d, Y') }}
                    </small>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Orders</h5>
                </div>
                @if($orders->count())
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order Number</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>${{ number_format($order->amount, 2) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $order->getStatusColor() }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>{{ $order->order_date->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                @else
                    <div class="card-body text-center py-5 text-muted">
                        <p>No orders found for this customer</p>
                        <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary">Create Order</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
