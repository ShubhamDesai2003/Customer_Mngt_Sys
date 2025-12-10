<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                   href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" 
                   href="{{ route('customers.index') }}">
                    <i class="fas fa-users"></i> Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" 
                   href="{{ route('orders.index') }}">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
            </li>

            @if(auth()->user()->isAdmin())
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users-cog"></i> User Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>
            @endif

            <hr>
            <li class="nav-item">
                <span class="nav-link text-muted small">
                    <strong>Role:</strong> {{ auth()->user()->role }}
                </span>
            </li>
        </ul>
    </div>
</nav>
