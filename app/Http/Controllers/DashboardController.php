<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index(): View
    {
        $user = auth()->user();

        // Get statistics
        $totalCustomers = Customer::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('amount');
        $recentCustomers = Customer::orderBy('created_at', 'desc')->limit(5)->get();

        // Pending orders count
        $pendingOrders = Order::where('status', 'Pending')->count();

        // Orders by status
        $ordersByStatus = [
            'Pending' => Order::where('status', 'Pending')->count(),
            'Completed' => Order::where('status', 'Completed')->count(),
            'Cancelled' => Order::where('status', 'Cancelled')->count(),
        ];

        return view('dashboard.index', compact(
            'totalCustomers',
            'totalOrders',
            'totalRevenue',
            'recentCustomers',
            'pendingOrders',
            'ordersByStatus'
        ));
    }
}
