<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'Completed')->count();
        $pendingOrders = Order::where('status', 'Pending')->count();
        $totalRevenue = Order::where('status', 'Completed')->sum('amount');

        $recentOrders = Order::with('customer')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentCustomers = Customer::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.index', [
            'totalCustomers' => $totalCustomers,
            'totalOrders' => $totalOrders,
            'completedOrders' => $completedOrders,
            'pendingOrders' => $pendingOrders,
            'totalRevenue' => $totalRevenue,
            'recentOrders' => $recentOrders,
            'recentCustomers' => $recentCustomers,
        ]);
    }
}
