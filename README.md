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

## Features

### 🔐 Authentication & Security
- User registration and login
- Secure session management
- Password hashing with bcrypt
- Protected routes and middleware
- CSRF protection on all forms

### 👥 Customer Management
- Complete CRUD operations (Create, Read, Update, Delete)
- Advanced search and filtering
- Soft delete functionality (recoverable)
- Customer contact information and addresses
- Pagination for large datasets
- Customer history tracking

### 📦 Order Management
- Full order lifecycle management
- Customer-to-order relationships
- Status tracking (Pending, Completed, Cancelled)
- Order search and filtering
- Revenue tracking and analytics
- Order date tracking

### 📊 Dashboard & Analytics
- Real-time statistics and metrics
- Total customers and orders count
- Revenue calculations and trends
- Recent customer and order listings
- Quick navigation links

### 🔍 Search & Filtering
- Multi-field search across customers
- Order filtering by status
- Order number search
- Real-time search results with pagination

### 📥 Data Export
- Export customers to PDF
- Export customers to CSV
- Export orders to PDF
- Export orders to CSV
- Filtered exports based on current view
- Professional formatted reports

### 🔐 REST API
- Complete RESTful API endpoints
- Sanctum token authentication
- JSON request/response format
- Proper HTTP status codes
- Error handling and validation
- Admin-only endpoints

---

## Tech Stack

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

## Installation

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0 or higher
- Composer
- Git

### Setup Instructions

1. **Clone the repository**
```bash
git clone https://github.com/ShubhamDesai2003/Customer_Mngt_Sys.git
cd Customer_Mngt_Sys
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup database**
Edit `.env` file and configure your MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=impact_guru_crm
DB_USERNAME=root
DB_PASSWORD=your_password
```

5. **Run migrations and seed data**
```bash
php artisan db:seed --force
```

6. **Start development server**
```bash
php artisan serve
```

Access the application at: **http://localhost:8000**

---

## Quick Start

### Demo Credentials
- **Email:** shubhamdesai20003@gmail.com
- **Password:** password

### First Steps
1. Visit http://localhost:8000
2. Click "Login"
3. Enter demo credentials
4. Explore the dashboard and features

---

## Database Schema

### Users Table
```
id, name, email, password, created_at, updated_at
```

### Customers Table
```
id, name, email, phone, address, city, created_by, deleted_at, created_at, updated_at
```
- Relationships: Has many orders, created by users

### Orders Table
```
id, order_number, customer_id, amount, status, order_date, created_by, created_at, updated_at
```
- Relationships: Belongs to customer, created by user
- Status: Pending, Completed, Cancelled

---

## Project Structure

```
impact-guru-crm/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                 # Authentication controllers
│   │   │   ├── CustomerController.php
│   │   │   ├── OrderController.php
│   │   │   ├── DashboardController.php
│   │   │   └── UserController.php
│   │   ├── Middleware/               # Custom middleware (RBAC)
│   │   ├── Requests/                 # Form validation
│   │   └── Kernel.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Customer.php
│   │   └── Order.php
│   └── Services/
│       └── ExportService.php         # Export functionality
├── database/
│   ├── migrations/                   # Database schema
│   └── seeders/                      # Database seeds
├── resources/
│   ├── views/
│   │   ├── layouts/                  # Base layouts
│   │   ├── auth/                     # Authentication views
│   │   ├── customers/                # Customer views
│   │   ├── orders/                   # Order views
│   │   ├── dashboard/                # Dashboard view
│   │   └── exports/                  # Export templates
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                       # Web routes
│   └── api.php                       # API routes
├── storage/
│   └── logs/                         # Application logs
└── .env                              # Environment configuration
```

---

## API Endpoints

### Authentication
All API endpoints require Sanctum token authentication.

### Customers API
```
GET     /api/customers                  - List all customers
GET     /api/customers/{id}             - Get customer details
POST    /api/customers                  - Create new customer
PUT     /api/customers/{id}             - Update customer
DELETE  /api/customers/{id}             - Delete customer
```

### Orders API
```
GET     /api/orders                     - List all orders
GET     /api/orders/{id}                - Get order details
POST    /api/orders                     - Create new order
PUT     /api/orders/{id}                - Update order
DELETE  /api/orders/{id}                - Delete order
```

### Users API (Admin Only)
```
GET     /api/users                      - List all users
GET     /api/users/{id}                 - Get user details
POST    /api/users                      - Create new user
```

---

## Validation Rules

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

## Usage Examples

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

## Error Handling

The application includes comprehensive error handling:
- Form validation with user-friendly messages
- Custom exception handling
- Logging to `storage/logs/laravel.log`
- CSRF protection on all forms
- SQL injection prevention (Eloquent ORM)
- XSS protection in templates

---

## Demo Data

The application comes with sample data:
- **5 Demo Customers:** Rajesh Kumar, Priya Sharma, Amit Patel, Neha Singh, Vikram Gupta
- **7 Demo Orders:** Various orders with different statuses
- **Admin User:** shubhamdesai20003@gmail.com (password: password)

---

## Development

### Run Tests
```bash
php artisan test
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
```

### View Logs
```bash
tail -f storage/logs/laravel.log
```

---

## Deployment

For production deployment:

1. Set `APP_DEBUG=false` in `.env`
2. Run `composer install --no-dev`
3. Configure proper MySQL database
4. Set up proper file permissions
5. Configure web server (Apache/Nginx)
6. Use HTTPS and secure headers
7. Set up automated backups
8. Monitor application logs

---

## ✨ Features

### 🔐 Authentication System ✅
- User registration with email validation
- Secure login with session management
- User profile view and edit functionality
- Logout with session cleanup
- Protected routes with auth middleware
- Password hashing with bcrypt

### 👥 Customer Management ✅
- Full CRUD operations (Create, Read, Update, Delete)
- Soft delete functionality (recoverable)
- Customer search by name/email
- Pagination (15 records per page)
- Profile image upload field
- Form validation with error messages
- Customer details with associated orders

### 📦 Order Management ✅
- Complete order lifecycle management
- Customer-to-order relationships
- Status filtering (Pending, Completed, Cancelled)
- Order search by order number
- Pagination support
- Revenue tracking
- Full CRUD operations

### 📊 Dashboard ✅
- Total customers count
- Total orders count
- Pending orders count
- Total revenue calculation
- Recent customers table (5 most recent)
- Recent orders table (5 most recent)
- Quick action navigation links
- Real-time statistics

### 🔍 Search & Filtering ✅
- Customer search by name/email
- Order filtering by status
- Order search by order number
- Real-time search results

### 🎨 User Interface ✅
- Responsive Bootstrap 5 design
- Mobile-friendly navigation
- Professional color scheme
- Font Awesome icons
- Smooth animations
- Alert notifications

### ✔️ Error Handling & Validation ✅
- Form request validation
- Error message display
- Custom exception handling
- Logging to laravel.log
- CSRF protection on all forms

### 📥 Export Functionality ✅
- Export customers to PDF
- Export customers to CSV
- Export orders to PDF
- Export orders to CSV
- Export with filters applied
- Formatted reports with metadata

### 🔐 REST API ✅
- Full RESTful API endpoints (GET, POST, PUT, DELETE)
- Sanctum token authentication
- JSON request/response format
- Proper HTTP status codes
- Error handling and validation
- Admin-only endpoints for user management
- CORS support

---

## 🛠️ Technical Stack

| Component | Technology |
|-----------|-----------|
| **Framework** | Laravel 10.50.0 |
| **Language** | PHP 8.5.0 |
| **Database** | MySQL 8.0 |
| **Frontend** | Bootstrap 5, Blade Templating |
| **Authentication** | Laravel Session Auth |
| **ORM** | Eloquent |
| **Validation** | Form Request Validation |
| **Version Control** | Git & GitHub |

---

## 📦 Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0 or higher
- Composer
- Node.js (optional)

### Installation Steps

```bash
# Clone the repository
git clone https://github.com/ShubhamDesai2003/Customer_Mngt_Sys.git
cd Customer_Mngt_Sys

# Install PHP dependencies
composer install

# Install Node dependencies (optional)
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
# DB_DATABASE=impact_guru_crm
# DB_USERNAME=root
# DB_PASSWORD=root

# Run migrations
php artisan migrate

# Create test user account
php artisan db:seed

# Start development server
php artisan serve
```

Access the application at: **http://localhost:8000**

---

## 🚀 Quick Start

### Test Credentials
- **Email:** `shubhamdesai20003@gmail.com`
- **Password:** `password`

### First Steps
1. Open http://localhost:8000
2. Click "Login"
3. Use test credentials
4. Explore Dashboard, Customers, and Orders

---

## 📚 Database Schema

### Users Table
- id, name, email, password, timestamps

### Customers Table
- id, name, email, phone, address, profile_image, created_by, soft_deletes, timestamps

### Orders Table
- id, order_number, customer_id, amount, status, order_date, created_by, timestamps

**Relationships:**
- Users → Customers (one-to-many)
- Customers → Orders (one-to-many)

---

## 🗂️ Project Structure

```
impact-guru-crm/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/              # Authentication controllers
│   │   ├── CustomerController.php
│   │   ├── OrderController.php
│   │   └── DashboardController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Customer.php
│   │   └── Order.php
│   └── Http/Requests/         # Form validation
├── resources/views/
│   ├── layouts/               # Base layout templates
│   ├── auth/                  # Authentication views
│   ├── customers/             # Customer management views
│   ├── orders/                # Order management views
│   └── dashboard/             # Dashboard view
├── routes/
│   ├── web.php                # Web application routes
│   └── api.php                # API routes (structure)
├── database/
│   ├── migrations/            # Database schema
│   └── seeders/
├── storage/logs/              # Application logs
└── .env.example               # Environment template
```

---

## 🔄 REST API Endpoints

### Customers API
```
GET    /api/customers              - List all customers
GET    /api/customers/{id}         - Get customer details
POST   /api/customers              - Create new customer
PUT    /api/customers/{id}         - Update customer
DELETE /api/customers/{id}         - Delete customer
```

### Orders API
```
GET    /api/orders                 - List all orders
GET    /api/orders/{id}            - Get order details  
POST   /api/orders                 - Create new order
PUT    /api/orders/{id}            - Update order
DELETE /api/orders/{id}            - Delete order
```

### Users API (Admin Only)
```
GET    /api/users                  - List all users
GET    /api/users/{id}             - Get user details
POST   /api/users                  - Create new user
```

### Authentication
All API endpoints require Sanctum token authentication:
```
Header: Authorization: Bearer {sanctum-token}
```

**Status:** Fully implemented and working

---

## 📝 Validation Rules

### Customer Registration
- Email: unique, valid format
- Password: minimum 8 characters, confirmed
- Name: required, maximum 255 characters

### Customer Management
- Name: required, string, max 255
- Email: required, unique, email format
- Phone: required, max 20
- Address: required, max 500

### Order Management
- Customer: required, exists in customers table
- Order Number: required, unique
- Amount: required, numeric, min 0.01
- Status: required, in [Pending, Completed, Cancelled]

---

## 🧪 Testing the Application

### Authentication Flow
1. Register new account
2. Login with credentials
3. View and edit profile
4. Logout

### Customer Operations
1. Navigate to Customers
2. Create new customer
3. Search customers
4. View customer details
5. Edit customer
6. Delete customer

### Order Operations
1. Navigate to Orders
2. Create new order
3. Filter orders by status
4. Search orders
5. View order details
6. Edit order
7. Delete order

### Dashboard
1. View statistics
2. Monitor recent data
3. Access management modules

---

## 🎯 How to Use

### Login Page
- Navigate to `/login`
- Enter credentials
- Click "Login"

### Customer Management
- Click "Customers" in sidebar
- View list with search and pagination
- Click "Add Customer" to create
- Click "View", "Edit", or "Delete" for operations

### Order Management
- Click "Orders" in sidebar
- View list with filtering and search
- Click "Create Order" to add new
- Click "View", "Edit", or "Delete" for operations

### Dashboard
- Default page after login
- Shows key statistics
- Quick access to all modules

---

## 🐛 Error Handling

The application includes:
- Form validation with user-friendly error messages
- Custom exception handling
- Logging to `storage/logs/laravel.log`
- CSRF protection on all forms
- SQL injection prevention through Eloquent ORM
- XSS protection in Blade templates

---

## 🔐 Security Features

- ✅ Password hashing with bcrypt
- ✅ CSRF token protection
- ✅ SQL injection prevention
- ✅ XSS protection
- ✅ Session-based authentication
- ✅ Auth middleware on protected routes

---

## 🔗 Important Links

- **GitHub Repository:** https://github.com/ShubhamDesai2003/Customer_Mngt_Sys
- **Application URL:** http://localhost:8000
- **Laravel Documentation:** https://laravel.com/docs

---

## 🎓 Learning Outcomes

This project successfully demonstrates:

✅ **Laravel Framework Mastery**
- Routing and controller architecture
- Eloquent ORM and relationships
- Blade templating and layouts
- Middleware and authentication

✅ **Database Design**
- Schema design with migrations
- Relationship implementation
- Soft delete functionality

✅ **Web Development**
- MVC architecture principles
- Form validation
- Error handling
- RESTful structure

✅ **Version Control**
- Git repository management
- Meaningful commits
- GitHub collaboration

✅ **Best Practices**
- Code organization
- Security implementation
- Clean code principles

---

## 📋 Future Enhancements

Potential improvements for future versions:

- [ ] Complete REST API implementation
- [ ] Role-Based Access Control (Admin/Staff)
- [ ] CSV/PDF export functionality
- [ ] Email notifications
- [ ] Advanced reporting
- [ ] API documentation (Swagger)
- [ ] Automated testing
- [ ] Performance optimization
