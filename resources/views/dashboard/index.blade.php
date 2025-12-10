@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-4">
    <h1 class="h2 mb-4">Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card customers">
                <h3>{{ $totalCustomers }}</h3>
                <p>Total Customers</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat-card orders">
                <h3>{{ $totalOrders }}</h3>
                <p>Total Orders</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat-card revenue">
                <h3>${{ number_format($totalRevenue, 2) }}</h3>
                <p>Total Revenue</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat-card pending">
                <h3>{{ $pendingOrders }}</h3>
                <p>Pending Orders</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Customers -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Recent Customers</h5>
                </div>
                <div class="card-body">
                    @if($recentCustomers->count())
                        <div class="table-responsive">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentCustomers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No customers yet</p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('customers.index') }}" class="btn btn-sm btn-primary">View All Customers</a>
                </div>
            </div>
        </div>

        <!-- Orders by Status -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Orders by Status</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <strong>Pending</strong>
                                <span class="badge bg-warning">{{ $ordersByStatus['Pending'] }}</span>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <strong>Completed</strong>
                                <span class="badge bg-success">{{ $ordersByStatus['Completed'] }}</span>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <strong>Cancelled</strong>
                                <span class="badge bg-danger">{{ $ordersByStatus['Cancelled'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">View All Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
