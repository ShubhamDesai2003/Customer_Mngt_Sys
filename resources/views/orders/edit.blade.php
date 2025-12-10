@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="py-4">
    <h1 class="h2 mb-4">Edit Order</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $order->order_number }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="order_number" class="form-label">Order Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('order_number') is-invalid @enderror" 
                                   id="order_number" name="order_number" value="{{ old('order_number', $order->order_number) }}" required>
                            @error('order_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
                            <select class="form-select @error('customer_id') is-invalid @enderror" 
                                    id="customer_id" name="customer_id" required>
                                <option value="">Select a customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" 
                                            {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }} ({{ $customer->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                                   id="amount" name="amount" value="{{ old('amount', $order->amount) }}" 
                                   step="0.01" min="0.01" required>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="">Select status</option>
                                <option value="Pending" {{ old('status', $order->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ old('status', $order->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Cancelled" {{ old('status', $order->status) === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order_date" class="form-label">Order Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control @error('order_date') is-invalid @enderror" 
                                   id="order_date" name="order_date" 
                                   value="{{ old('order_date', $order->order_date->format('Y-m-d\TH:i')) }}" required>
                            @error('order_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Order
                            </button>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
