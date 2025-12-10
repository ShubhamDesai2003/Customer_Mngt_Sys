@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<div class="py-5 text-center">
    <div class="error-content">
        <h1 class="display-1 fw-bold text-danger">500</h1>
        <h2 class="h2 mb-3">Server Error</h2>
        <p class="lead mb-4">Something went wrong on our end. Please try again later.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-home"></i> Go Back Home
        </a>
    </div>
</div>
@endsection
