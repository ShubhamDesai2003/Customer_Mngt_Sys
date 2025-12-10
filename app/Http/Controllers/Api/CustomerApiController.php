<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    /**
     * Get all customers
     */
    public function index(Request $request): JsonResponse
    {
        $customers = Customer::paginate(15);
        return response()->json($customers);
    }

    /**
     * Get a specific customer
     */
    public function show(Customer $customer): JsonResponse
    {
        return response()->json($customer);
    }

    /**
     * Create a new customer (Admin only)
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = $request->validated();
        $data['created_by'] = auth()->id();

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        $customer = Customer::create($data);

        return response()->json($customer, 201);
    }

    /**
     * Update a customer (Admin only)
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            if ($customer->profile_image) {
                \Storage::disk('public')->delete($customer->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('customers', 'public');
        }

        $customer->update($data);

        return response()->json($customer);
    }

    /**
     * Delete a customer (Admin only)
     */
    public function destroy(Customer $customer): JsonResponse
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
