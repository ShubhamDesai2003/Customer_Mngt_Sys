<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index(Request $request): View
    {
        $query = Customer::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        // Pagination
        $customers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['created_by'] = auth()->id();

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        Customer::create($data);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer): View
    {
        $orders = $customer->orders()->paginate(10);
        return view('customers.show', compact('customer', 'orders'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($customer->profile_image) {
                \Storage::disk('public')->delete($customer->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        $customer->update($data);

        return redirect()->route('customers.show', $customer)->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage (soft delete).
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        // Only admins can delete
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    /**
     * Export customers as CSV
     */
    public function exportCsv(Request $request): BinaryFileResponse
    {
        $query = Customer::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        $customers = $query->get();

        $filename = 'customers_' . date('Y-m-d_H-i-s') . '.csv';
        $path = storage_path("app/{$filename}");

        $handle = fopen($path, 'w');
        fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'Address', 'Created At']);

        foreach ($customers as $customer) {
            fputcsv($handle, [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone,
                $customer->address,
                $customer->created_at,
            ]);
        }

        fclose($handle);

        return response()->download($path, $filename)->deleteFileAfterSend(true);
    }

    /**
     * Export customers as PDF
     */
    public function exportPdf(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        $customers = $query->get();

        $pdf = \PDF::loadView('customers.pdf', compact('customers'));
        return $pdf->download('customers_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
