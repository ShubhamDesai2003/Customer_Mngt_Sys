<?php
// Load Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create database connection
$pdo = new PDO(
    'mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD']
);

// Create database if not exists
$pdo->exec('CREATE DATABASE IF NOT EXISTS ' . $_ENV['DB_DATABASE']);

// Select database
$pdo->exec('USE ' . $_ENV['DB_DATABASE']);

// Create tables
$tables = [
    // Users table
    "CREATE TABLE IF NOT EXISTS users (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        email_verified_at TIMESTAMP NULL,
        password VARCHAR(255) NOT NULL,
        remember_token VARCHAR(100),
        created_at TIMESTAMP NULL,
        updated_at TIMESTAMP NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    // Cache table
    "CREATE TABLE IF NOT EXISTS cache (
        key VARCHAR(255) PRIMARY KEY,
        value LONGTEXT NOT NULL,
        expiration INT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    // Jobs table
    "CREATE TABLE IF NOT EXISTS jobs (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        queue VARCHAR(255) NOT NULL,
        payload LONGTEXT NOT NULL,
        attempts TINYINT UNSIGNED NOT NULL,
        reserved_at INT UNSIGNED,
        available_at INT UNSIGNED NOT NULL,
        created_at INT UNSIGNED NOT NULL,
        KEY `jobs_queue_index` (queue)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    // Customers table
    "CREATE TABLE IF NOT EXISTS customers (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        phone VARCHAR(20) NOT NULL,
        address TEXT NOT NULL,
        profile_image VARCHAR(255),
        created_by BIGINT UNSIGNED NOT NULL,
        deleted_at TIMESTAMP NULL,
        created_at TIMESTAMP NULL,
        updated_at TIMESTAMP NULL,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
        KEY `customers_created_by_index` (created_by)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    // Orders table
    "CREATE TABLE IF NOT EXISTS orders (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        order_number VARCHAR(255) UNIQUE NOT NULL,
        customer_id BIGINT UNSIGNED NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        status ENUM('Pending', 'Completed', 'Cancelled') NOT NULL DEFAULT 'Pending',
        order_date TIMESTAMP NOT NULL,
        created_by BIGINT UNSIGNED NOT NULL,
        created_at TIMESTAMP NULL,
        updated_at TIMESTAMP NULL,
        FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
        FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
        KEY `orders_customer_id_index` (customer_id),
        KEY `orders_created_by_index` (created_by)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
];

foreach ($tables as $sql) {
    try {
        $pdo->exec($sql);
        echo "✓ Table created successfully\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

echo "\n✓ Database setup complete!\n";
