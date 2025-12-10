@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>Edit Order</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
                <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }} - {{ $customer->email }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="order_number" class="form-label">Order Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('order_number') is-invalid @enderror" id="order_number" name="order_number" value="{{ $order->order_number }}" required>
                @error('order_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" step="0.01" value="{{ $order->amount }}" required>
                @error('amount')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Order Date <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control @error('order_date') is-invalid @enderror" id="order_date" name="order_date" value="{{ $order->order_date->format('Y-m-d\TH:i') }}" required>
                @error('order_date')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Order</button>
            </div>
        </form>
    </div>
</div>
@endsection
