<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create users table
        DB::statement("CREATE TABLE IF NOT EXISTS users (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            email_verified_at TIMESTAMP NULL,
            password VARCHAR(255) NOT NULL,
            remember_token VARCHAR(100) NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create customers table
        DB::statement("CREATE TABLE IF NOT EXISTS customers (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            phone VARCHAR(20) NOT NULL,
            address TEXT NOT NULL,
            city VARCHAR(100) NOT NULL,
            created_by BIGINT UNSIGNED NOT NULL,
            deleted_at TIMESTAMP NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            KEY idx_created_by (created_by),
            CONSTRAINT customers_created_by_foreign FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create orders table
        DB::statement("CREATE TABLE IF NOT EXISTS orders (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            order_number VARCHAR(255) NOT NULL UNIQUE,
            customer_id BIGINT UNSIGNED NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            status VARCHAR(255) NOT NULL DEFAULT 'Pending',
            order_date DATE NOT NULL,
            created_by BIGINT UNSIGNED NOT NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            KEY idx_customer_id (customer_id),
            KEY idx_created_by (created_by),
            CONSTRAINT orders_customer_id_foreign FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
            CONSTRAINT orders_created_by_foreign FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Insert test user
        if (!DB::table('users')->where('email', 'shubhamdesai20003@gmail.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Shubham Desai',
                'email' => 'shubhamdesai20003@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $userId = DB::table('users')->where('email', 'shubhamdesai20003@gmail.com')->first()->id;

        // Insert demo customers
        $customers = [
            [
                'name' => 'Rajesh Kumar',
                'email' => 'rajesh.kumar@example.com',
                'phone' => '+91-9876543210',
                'address' => '123 Business Park, Tech Street',
                'city' => 'Mumbai',
                'created_by' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Priya Sharma',
                'email' => 'priya.sharma@example.com',
                'phone' => '+91-9123456789',
                'address' => '456 Commerce Lane, Market Area',
                'city' => 'Delhi',
                'created_by' => $userId,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'name' => 'Amit Patel',
                'email' => 'amit.patel@example.com',
                'phone' => '+91-9234567890',
                'address' => '789 Industrial Zone, Port Road',
                'city' => 'Bangalore',
                'created_by' => $userId,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'name' => 'Neha Singh',
                'email' => 'neha.singh@example.com',
                'phone' => '+91-9345678901',
                'address' => '321 Corporate Tower, Finance District',
                'city' => 'Pune',
                'created_by' => $userId,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'name' => 'Vikram Gupta',
                'email' => 'vikram.gupta@example.com',
                'phone' => '+91-9456789012',
                'address' => '654 Shopping Mall, Downtown',
                'city' => 'Hyderabad',
                'created_by' => $userId,
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
        ];

        foreach ($customers as $customer) {
            if (!DB::table('customers')->where('email', $customer['email'])->exists()) {
                DB::table('customers')->insert($customer);
            }
        }

        // Insert demo orders
        $orders = [
            [
                'order_number' => 'ORD-2025-001',
                'customer_id' => 1,
                'amount' => 45999.50,
                'status' => 'Completed',
                'order_date' => now()->subDays(8)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'order_number' => 'ORD-2025-002',
                'customer_id' => 2,
                'amount' => 12500.00,
                'status' => 'Pending',
                'order_date' => now()->subDays(2)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'order_number' => 'ORD-2025-003',
                'customer_id' => 3,
                'amount' => 87650.75,
                'status' => 'Completed',
                'order_date' => now()->subDays(12)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ],
            [
                'order_number' => 'ORD-2025-004',
                'customer_id' => 4,
                'amount' => 23400.00,
                'status' => 'Pending',
                'order_date' => now()->subDays(1)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'order_number' => 'ORD-2025-005',
                'customer_id' => 5,
                'amount' => 156200.00,
                'status' => 'Completed',
                'order_date' => now()->subDays(25)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(25),
            ],
            [
                'order_number' => 'ORD-2025-006',
                'customer_id' => 1,
                'amount' => 34500.50,
                'status' => 'Pending',
                'order_date' => now()->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_number' => 'ORD-2025-007',
                'customer_id' => 2,
                'amount' => 67800.00,
                'status' => 'Cancelled',
                'order_date' => now()->subDays(30)->format('Y-m-d'),
                'created_by' => $userId,
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(30),
            ],
        ];

        foreach ($orders as $order) {
            if (!DB::table('orders')->where('order_number', $order['order_number'])->exists()) {
                DB::table('orders')->insert($order);
            }
        }
    }
}
