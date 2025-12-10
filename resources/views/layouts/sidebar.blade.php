<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky pt-3">
        <div style="padding: 0 20px 20px 20px; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <h6 style="color: #95a5a6; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Main Menu</h6>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                   href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" 
                   href="{{ route('customers.index') }}">
                    <i class="fas fa-users"></i> <span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" 
                   href="{{ route('orders.index') }}">
                    <i class="fas fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>

            @if(auth()->user()->isAdmin())
                <hr>
                <div style="padding: 0 20px 10px 20px;">
                    <h6 style="color: #95a5a6; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;">Administration</h6>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users-cog"></i> <span>User Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cogs"></i> <span>Settings</span>
                    </a>
                </li>
            @endif

            <hr>
            <li class="nav-item">
                <div class="text-muted" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-user-tag" style="font-size: 12px;"></i>
                    <span><strong>Role:</strong> {{ auth()->user()->role }}</span>
                </div>
            </li>
        </ul>
    </div>
</nav>
