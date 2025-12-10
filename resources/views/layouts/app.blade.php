<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'ImpactGuru CRM')</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            :root {
                --primary-color: #2c3e50;
                --secondary-color: #3498db;
                --success-color: #27ae60;
                --danger-color: #e74c3c;
                --warning-color: #f39c12;
            }

            body {
                background-color: #f8f9fa;
            }

            .navbar {
                background-color: var(--primary-color);
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .sidebar {
                background-color: var(--primary-color);
                min-height: 100vh;
                color: white;
            }

            .sidebar .nav-link {
                color: rgba(255,255,255,0.8);
                border-left: 3px solid transparent;
                padding: 10px 20px;
                transition: all 0.3s;
            }

            .sidebar .nav-link:hover,
            .sidebar .nav-link.active {
                background-color: rgba(255,255,255,0.1);
                color: white;
                border-left-color: var(--secondary-color);
            }

            .card {
                border: none;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                margin-bottom: 20px;
            }

            .card-header {
                background-color: var(--primary-color);
                color: white;
                border: none;
            }

            .btn-primary {
                background-color: var(--secondary-color);
                border-color: var(--secondary-color);
            }

            .btn-primary:hover {
                background-color: #2980b9;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(52, 152, 219, 0.1);
            }

            .stat-card {
                padding: 20px;
                border-radius: 8px;
                color: white;
                text-align: center;
            }

            .stat-card h3 {
                font-size: 2rem;
                margin-bottom: 10px;
            }

            .stat-card p {
                margin: 0;
                opacity: 0.9;
            }

            .stat-card.customers {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .stat-card.orders {
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            }

            .stat-card.revenue {
                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            }

            .stat-card.pending {
                background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            }

            .alert-success {
                background-color: #d4edda;
                border-color: #c3e6cb;
                color: #155724;
            }

            .alert-error {
                background-color: #f8d7da;
                border-color: #f5c6cb;
                color: #721c24;
            }

            @media (max-width: 768px) {
                .sidebar {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        @include('layouts.navbar')

        <div class="container-fluid">
            <div class="row">
                @auth
                    @include('layouts.sidebar')
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @else
                    <main class="col-12">
                @endauth
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Please correct the errors below</h4>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @yield('content')
                    </main>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @yield('scripts')
    </body>
</html>
