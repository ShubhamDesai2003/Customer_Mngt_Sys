<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index(Request $request): View
    {
        $query = Order::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Search by order number
        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->input('search') . '%');
        }

        $orders = $query->with('customer')->orderBy('created_at', 'desc')->paginate(15);
        $statuses = ['Pending', 'Completed', 'Cancelled'];

        return view('orders.index', compact('orders', 'statuses'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create(): View
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();

        Order::create($data);

        // Trigger notification
        $customer = Customer::find($data['customer_id']);
        $customer->notify(new \App\Notifications\NewOrderNotification());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order): View
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $data = $request->validated();
        $order->update($data);

        return redirect()->route('orders.show', $order)->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        // Only admins can delete
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    /**
     * Export orders as CSV
     */
    public function exportCsv(Request $request)
    {
        $query = Order::query();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->input('search') . '%');
        }

        $orders = $query->with('customer')->get();

        $filename = 'orders_' . date('Y-m-d_H-i-s') . '.csv';
        $path = storage_path("app/{$filename}");

        $handle = fopen($path, 'w');
        fputcsv($handle, ['ID', 'Order Number', 'Customer', 'Amount', 'Status', 'Order Date']);

        foreach ($orders as $order) {
            fputcsv($handle, [
                $order->id,
                $order->order_number,
                $order->customer->name,
                $order->amount,
                $order->status,
                $order->order_date,
            ]);
        }

        fclose($handle);

        return response()->download($path, $filename)->deleteFileAfterSend(true);
    }

    /**
     * Export orders as PDF
     */
    public function exportPdf(Request $request)
    {
        $query = Order::query();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->input('search') . '%');
        }

        $orders = $query->with('customer')->get();

        $pdf = \PDF::loadView('orders.pdf', compact('orders'));
        return $pdf->download('orders_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
