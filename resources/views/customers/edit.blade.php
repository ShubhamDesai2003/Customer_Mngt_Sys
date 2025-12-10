@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>Edit Customer</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $customer->name }}" required>
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $customer->email }}" required>
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $customer->phone }}" required>
                @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ $customer->address }}</textarea>
                @error('address')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3">
                <label for="profile_image" class="form-label">Profile Image</label>
                @if($customer->profile_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="Profile" style="max-width: 100px;">
                    </div>
                @endif
                <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image" accept="image/*">
                @error('profile_image')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection
