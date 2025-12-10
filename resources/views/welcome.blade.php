@extends('layouts.app')

@section('title', 'Welcome - ImpactGuru CRM')

@section('content')
<div class="py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">Welcome to ImpactGuru CRM</h1>
        <p class="lead mb-4">A Powerful Customer Relationship Management System</p>
        
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg me-2">
                <i class="fas fa-tachometer-alt"></i> Go to Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-user-plus"></i> Register
            </a>
        @endauth
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Manage Customers</h5>
                    <p class="card-text">Easily manage your customer database with full CRUD operations, profile images, and soft deletes.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Track Orders</h5>
                    <p class="card-text">Create, track, and manage customer orders with real-time status updates and notifications.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Business Analytics</h5>
                    <p class="card-text">Get insights with comprehensive dashboards showing statistics and order trends.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-lock fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Role-Based Access</h5>
                    <p class="card-text">Admin and Staff roles with granular permission control for secure operations.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-file-export fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Export Data</h5>
                    <p class="card-text">Export customer and order data to CSV or PDF formats for reporting.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-code fa-3x text-success mb-3"></i>
                    <h5 class="card-title">REST API</h5>
                    <p class="card-text">Secure API with token authentication for seamless third-party integrations.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 bg-light p-5 rounded">
        <div class="col-md-8">
            <h3>Key Features</h3>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check text-success"></i> User Authentication & Registration</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Customer Management with Profile Images</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Order Tracking & Management</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Advanced Search & Filtering</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Pagination for Large Datasets</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Email Notifications</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> CSV/PDF Export</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Comprehensive Dashboard</li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Technology Stack</h3>
            <ul class="list-unstyled">
                <li><strong>Laravel 10.x</strong></li>
                <li><strong>PHP 8.1+</strong></li>
                <li><strong>MySQL</strong></li>
                <li><strong>Bootstrap 5</strong></li>
                <li><strong>Laravel Sanctum</strong></li>
                <li><strong>DomPDF</strong></li>
            </ul>
        </div>
    </div>
</div>
@endsection
