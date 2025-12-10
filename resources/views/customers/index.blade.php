@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Customers</h1>
        <div>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Customer
            </a>
            <div class="btn-group ms-2" role="group">
                <a href="{{ route('customers.export-csv', request()->query()) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-download"></i> CSV
                </a>
                <a href="{{ route('customers.export-pdf', request()->query()) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-download"></i> PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="form-inline">
                <div class="input-group w-100">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search by name or email..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>
                                <img src="{{ $customer->getProfileImageUrl() }}" 
                                     alt="{{ $customer->name }}" 
                                     class="rounded-circle" width="40" height="40">
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ Str::limit($customer->address, 30) }}</td>
                            <td>
                                <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @if(auth()->user()->isAdmin())
                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" 
                                          style="display: inline;" 
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No customers found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $customers->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
