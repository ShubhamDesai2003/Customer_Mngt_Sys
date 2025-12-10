@extends('layouts.app')

@section('title', $order->order_number)

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">{{ $order->order_number }}</h1>
        <div>
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            @if(auth()->user()->isAdmin())
                <form action="{{ route('orders.destroy', $order) }}" method="POST" 
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
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Order Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-5">Order Number:</dt>
                        <dd class="col-sm-7">{{ $order->order_number }}</dd>

                        <dt class="col-sm-5">Customer:</dt>
                        <dd class="col-sm-7">
                            <a href="{{ route('customers.show', $order->customer) }}">
                                {{ $order->customer->name }}
                            </a>
                        </dd>

                        <dt class="col-sm-5">Amount:</dt>
                        <dd class="col-sm-7"><strong>${{ number_format($order->amount, 2) }}</strong></dd>

                        <dt class="col-sm-5">Status:</dt>
                        <dd class="col-sm-7">
                            <span class="badge bg-{{ $order->getStatusColor() }}">
                                {{ $order->status }}
                            </span>
                        </dd>

                        <dt class="col-sm-5">Order Date:</dt>
                        <dd class="col-sm-7">{{ $order->order_date->format('M d, Y H:i A') }}</dd>

                        <dt class="col-sm-5">Created By:</dt>
                        <dd class="col-sm-7">{{ $order->creator->name }}</dd>

                        <dt class="col-sm-5">Created At:</dt>
                        <dd class="col-sm-7">{{ $order->created_at->format('M d, Y H:i A') }}</dd>

                        <dt class="col-sm-5">Updated At:</dt>
                        <dd class="col-sm-7">{{ $order->updated_at->format('M d, Y H:i A') }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Customer Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-5">Name:</dt>
                        <dd class="col-sm-7">{{ $order->customer->name }}</dd>

                        <dt class="col-sm-5">Email:</dt>
                        <dd class="col-sm-7">
                            <a href="mailto:{{ $order->customer->email }}">
                                {{ $order->customer->email }}
                            </a>
                        </dd>

                        <dt class="col-sm-5">Phone:</dt>
                        <dd class="col-sm-7">
                            <a href="tel:{{ $order->customer->phone }}">
                                {{ $order->customer->phone }}
                            </a>
                        </dd>

                        <dt class="col-sm-5">Address:</dt>
                        <dd class="col-sm-7">{{ $order->customer->address }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
