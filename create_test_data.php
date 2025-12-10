<?php
require __DIR__.'/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create database connection
$pdo = new PDO(
    'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD']
);

// Create a test user if not exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute(['test@example.com']);

if ($stmt->rowCount() == 0) {
    // Create user
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
    $password = password_hash('password', PASSWORD_BCRYPT);
    $stmt->execute(['Test User', 'test@example.com', $password]);
    echo "✓ Test user created successfully\n";
    echo "Email: test@example.com\n";
    echo "Password: password\n";
} else {
    echo "Test user already exists\n";
}

// Create a test customer
$stmt = $pdo->prepare("SELECT id FROM customers WHERE email = ?");
$stmt->execute(['john@example.com']);

if ($stmt->rowCount() == 0) {
    $stmt = $pdo->prepare("INSERT INTO customers (name, email, phone, address, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, 1, NOW(), NOW())");
    $stmt->execute(['John Doe', 'john@example.com', '555-1234', '123 Main St, City, State']);
    echo "✓ Test customer created successfully\n";
}

// Create a test order
$stmt = $pdo->prepare("SELECT id FROM orders WHERE order_number = ?");
$stmt->execute(['ORD-001']);

if ($stmt->rowCount() == 0) {
    $stmt = $pdo->prepare("INSERT INTO orders (order_number, customer_id, amount, status, order_date, created_by, created_at, updated_at) VALUES (?, 1, 250.50, 'Pending', NOW(), 1, NOW(), NOW())");
    $stmt->execute(['ORD-001']);
    echo "✓ Test order created successfully\n";
}

echo "\n✓ Database setup with test data complete!\n";
