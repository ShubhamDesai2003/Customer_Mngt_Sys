@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="py-5 text-center">
    <div class="error-content">
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <h2 class="h2 mb-3">Page Not Found</h2>
        <p class="lead mb-4">The page you're looking for doesn't exist or has been moved.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-home"></i> Go Back Home
        </a>
    </div>
</div>
@endsection
