# ImpactGuru CRM

A professional Customer Relationship Management (CRM) system built with Laravel 10 and Bootstrap 5. Manage customers, track orders, and monitor business relationships with ease.

![Laravel](https://img.shields.io/badge/Laravel-10.50.0-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.5.0-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0-purple?logo=bootstrap)
![Status](https://img.shields.io/badge/Status-Production%20Ready-green)

---

## Overview

ImpactGuru CRM is a full-featured customer relationship management solution designed for businesses of all sizes. It provides comprehensive tools for managing customer information, tracking orders, monitoring business metrics, and generating reports.

---

## ✨ Features

### 🔐 Authentication & Security
- User registration and login with email validation
- Secure session management with bcrypt password hashing
- Protected routes with auth middleware
- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- XSS protection in Blade templates

### 👥 Customer Management
- Complete CRUD operations (Create, Read, Update, Delete)
- Soft delete functionality (recoverable deleted records)
- Advanced search by name/email with pagination
- Customer contact information and addresses
- Customer history and associated orders tracking
- Form validation with error messages

### 📦 Order Management
- Full order lifecycle management with status tracking
- Customer-to-order relationships
- Status options: Pending, Completed, Cancelled
- Order search and filtering capabilities
- Revenue tracking and analytics
- Order date tracking and history

### 📊 Dashboard & Analytics
- Real-time statistics and key metrics
- Total customers and orders count with revenue calculation
- Pending orders count and status overview
- Recent customers and orders listings
- Quick navigation links to all modules

### 🔍 Search & Filtering
- Multi-field customer search (name, email)
- Order filtering by status
- Order number search
- Real-time search results with pagination

### 📥 Data Export
- Export customers to PDF and CSV formats
- Export orders to PDF and CSV formats
- Filtered exports based on current view
- Professional formatted reports with metadata

### 🔐 REST API
- Complete RESTful API endpoints (GET, POST, PUT, DELETE)
- Sanctum token authentication
- JSON request/response format
- Proper HTTP status codes and error handling
- Admin-only endpoints for user management
- CORS support enabled

---

## 🛠️ Tech Stack

| Component | Technology |
|-----------|-----------|
| **Framework** | Laravel 10.50.0 |
| **Language** | PHP 8.5.0 |
| **Database** | MySQL 8.0 |
| **Frontend** | Bootstrap 5, Blade Templating |
| **Authentication** | Laravel Session Auth, Sanctum |
| **ORM** | Eloquent |
| **PDF Generation** | DOMPDF |
| **Version Control** | Git & GitHub |

---

## 📦 Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0 or higher
- Composer
- Git

### Installation Steps

```bash
# Clone the repository
git clone https://github.com/ShubhamDesai2003/Customer_Mngt_Sys.git
cd Customer_Mngt_Sys

# Install PHP dependencies
composer install

# Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# Configure database in .env file
# DB_DATABASE=impact_guru_crm
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Seed the database with demo data
php artisan db:seed --force

# Start development server
php artisan serve
```

Access the application at: **http://localhost:8000**

---

## 🚀 Quick Start

### Demo Credentials
- **Email:** shubhamdesai20003@gmail.com
- **Password:** password

### First Steps
1. Visit http://localhost:8000
2. Click "Login"
3. Enter demo credentials
4. Explore the Dashboard, Customers, and Orders

---

## 📚 Database Schema

### Users Table
- Columns: id, name, email, password, created_at, updated_at
- Purpose: Store application user accounts

### Customers Table
- Columns: id, name, email, phone, address, city, created_by, deleted_at, created_at, updated_at
- Relationships: Created by users, has many orders
- Features: Soft delete functionality for data recovery

### Orders Table
- Columns: id, order_number, customer_id, amount, status, order_date, created_by, created_at, updated_at
- Relationships: Belongs to customer and user
- Status Options: Pending, Completed, Cancelled

**Entity Relationships:**
- Users → Customers (one-to-many)
- Customers → Orders (one-to-many)

---

## 🗂️ Project Structure

```
impact-guru-crm/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                    # Authentication controllers
│   │   │   ├── CustomerController.php
│   │   │   ├── OrderController.php
│   │   │   ├── DashboardController.php
│   │   │   └── UserController.php
│   │   ├── Middleware/                  # Custom middleware (RBAC)
│   │   ├── Requests/                    # Form request validation
│   │   └── Kernel.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Customer.php
│   │   └── Order.php
│   ├── Services/
│   │   └── ExportService.php            # Export functionality
│   └── Exceptions/
├── database/
│   ├── migrations/                      # Database schema
│   └── seeders/
│       └── DatabaseSeeder.php           # Demo data seeding
├── resources/
│   ├── views/
│   │   ├── layouts/                     # Base layouts
│   │   ├── auth/                        # Authentication views
│   │   ├── customers/                   # Customer management views
│   │   ├── orders/                      # Order management views
│   │   ├── dashboard/                   # Dashboard view
│   │   └── exports/                     # Export templates
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                          # Web routes
│   └── api.php                          # API routes
├── storage/
│   └── logs/                            # Application logs
├── config/
│   ├── app.php                          # Application configuration
│   ├── database.php                     # Database configuration
│   ├── auth.php                         # Authentication configuration
│   └── ...
└── .env                                 # Environment variables
```

---

## 🔄 REST API Endpoints

### Customers API
```
GET     /api/customers              - List all customers
GET     /api/customers/{id}         - Get customer details
POST    /api/customers              - Create new customer
PUT     /api/customers/{id}         - Update customer
DELETE  /api/customers/{id}         - Delete customer
```

### Orders API
```
GET     /api/orders                 - List all orders
GET     /api/orders/{id}            - Get order details
POST    /api/orders                 - Create new order
PUT     /api/orders/{id}            - Update order
DELETE  /api/orders/{id}            - Delete order
```

### Users API (Admin Only)
```
GET     /api/users                  - List all users
GET     /api/users/{id}             - Get user details
POST    /api/users                  - Create new user
```

### Authentication
All API endpoints require Sanctum token authentication:
```
Header: Authorization: Bearer {sanctum-token}
```

---

## 📝 Validation Rules

### Customer Validation
- **Name:** Required, max 255 characters
- **Email:** Required, unique, valid email format
- **Phone:** Required, max 20 characters
- **Address:** Required, max 500 characters
- **City:** Required, max 100 characters

### Order Validation
- **Order Number:** Required, unique
- **Customer:** Required, must exist in customers table
- **Amount:** Required, numeric, minimum 0.01
- **Status:** Required, must be Pending, Completed, or Cancelled
- **Order Date:** Required, valid date format

---

## 🎯 Usage Examples

### Login
1. Navigate to `/login`
2. Enter your credentials
3. Click "Login" button

### Create Customer
1. Go to Customers section
2. Click "Add Customer" button
3. Fill in customer details
4. Click "Save"

### Create Order
1. Go to Orders section
2. Click "Create Order" button
3. Select customer and enter order details
4. Click "Save"

### Export Data
1. Navigate to Customers or Orders page
2. Click "Export PDF" or "Export CSV" button
3. File will download to your device

### Search & Filter
1. Use search bar to find customers by name or email
2. Use status filter for orders (Pending, Completed, Cancelled)
3. Results update in real-time

---

## 🔐 Security Features

- ✅ Password hashing with bcrypt
- ✅ CSRF token protection on all forms
- ✅ SQL injection prevention via Eloquent ORM
- ✅ XSS protection in Blade templates
- ✅ Session-based authentication
- ✅ Auth middleware on protected routes
- ✅ Role-Based Access Control (RBAC) foundation

---

## 🐛 Error Handling & Validation

The application includes comprehensive error handling:
- Form request validation with user-friendly error messages
- Custom exception handling with proper logging
- Application logs in `storage/logs/laravel.log`
- CSRF protection on all forms
- SQL injection prevention through Eloquent ORM
- XSS protection in all templates

---

## 💾 Demo Data

The application comes pre-loaded with sample data:
- **5 Demo Customers:** Rajesh Kumar, Priya Sharma, Amit Patel, Neha Singh, Vikram Gupta
- **7 Demo Orders:** Various orders with different statuses and dates
- **Admin User:** shubhamdesai20003@gmail.com / password

---

## 🧪 Development Commands

### Run Tests
```bash
php artisan test
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
```

### View Application Logs
```bash
tail -f storage/logs/laravel.log
```

### Generate New App Key
```bash
php artisan key:generate
```

---

## 🚀 Deployment

For production deployment:

1. Set `APP_DEBUG=false` in `.env`
2. Run `composer install --no-dev`
3. Configure proper MySQL database on your server
4. Set proper file permissions (storage/, bootstrap/cache/)
5. Configure web server (Apache/Nginx) with proper document root
6. Set up HTTPS with SSL certificates
7. Configure secure headers and environment variables
8. Set up automated database backups
9. Enable application monitoring and error tracking

---

## 🔗 Important Links

- **GitHub Repository:** https://github.com/ShubhamDesai2003/Customer_Mngt_Sys
- **Application URL:** http://localhost:8000
- **Laravel Documentation:** https://laravel.com/docs
- **Bootstrap Documentation:** https://getbootstrap.com/docs

---

## 📋 Future Enhancements

Potential improvements for future versions:

- [ ] Advanced role-based access control with multiple user roles
- [ ] Email notification system for order updates
- [ ] Advanced reporting with charts and analytics
- [ ] API documentation with Swagger/OpenAPI
- [ ] Automated testing with PHPUnit
- [ ] Performance optimization and caching strategies
- [ ] Multi-language support (i18n)
- [ ] Two-factor authentication (2FA)
- [ ] Integration with payment gateways
- [ ] Mobile app or progressive web app (PWA)
