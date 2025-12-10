# ImpactGuru Mini CRM - Customer Management System

![Laravel](https://img.shields.io/badge/Laravel-10.50.0-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.5.0-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0-purple?logo=bootstrap)

## 📋 Project Overview

**ImpactGuru Mini CRM** is a professional Customer Relationship Management system built with **Laravel 10** and **Bootstrap 5**. This application demonstrates practical implementation of Laravel fundamentals including authentication, routing, Eloquent ORM, Blade templating, middleware, and database management.

---

## ✨ Key Features Implemented

### 🔐 Authentication System ✅
- User registration with validation
- Secure login with session management
- User profile management
- Logout functionality
- Protected routes with auth middleware

### 👥 Customer Management ✅
- Full CRUD operations (Create, Read, Update, Delete)
- Soft delete functionality
- Customer search by name/email
- Pagination (15 records per page)
- Profile image upload support
- Comprehensive form validation

### 📦 Order Management ✅
- Complete order lifecycle management
- Customer-to-order relationships
- Status filtering (Pending, Completed, Cancelled)
- Order search by order number
- Pagination support
- Revenue tracking

### 📊 Dashboard ✅
- Total customers count
- Total orders count
- Pending orders count
- Total revenue calculation
- Recent customers table
- Recent orders table
- Quick action links

### 🔍 Search & Filtering ✅
- Customer search by name/email
- Order filtering by status
- Real-time search results

### 🎨 User Interface ✅
- Responsive Bootstrap 5 design
- Mobile-friendly navigation
- Professional styling
- Font Awesome icons
- Smooth animations

---

## 🛠️ Technical Stack

| Component | Technology |
|-----------|-----------|
| Framework | Laravel 10.50.0 |
| Language | PHP 8.5.0 |
| Database | MySQL 8.0 |
| Frontend | Bootstrap 5, Blade |
| Authentication | Session-based |
| ORM | Eloquent |
| Validation | Form Request Validation |

---

## 📦 Installation

### Prerequisites
- PHP 8.1+
- MySQL 8.0+
- Composer

### Steps
```bash
# Clone repository
git clone https://github.com/ShubhamDesai2003/Customer_Mngt_Sys.git
cd Customer_Mngt_Sys

# Install dependencies
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Setup database
# Edit .env with your MySQL credentials
php artisan migrate

# Seed test data (optional)
php create_test_data.php

# Start server
php artisan serve
```

Access at: `http://localhost:8000`

---

## 🚀 Quick Start

**Test Login:**
- Email: `test@example.com`
- Password: `password`

---

## 📚 Project Structure

```
impact-guru-crm/
├── app/Models/              # Eloquent models
├── app/Http/Controllers/    # Controllers for each module
├── app/Http/Requests/       # Form validation
├── resources/views/         # Blade templates
├── routes/                  # Web & API routes
├── database/migrations/     # Database schemas
└── storage/logs/           # Application logs
```

---

## 📋 Assignment Requirements Compliance

### ✅ COMPLETED

| Requirement | Status |
|-------------|--------|
| Authentication (Register, Login, Logout) | ✅ Complete |
| Customer CRUD | ✅ Complete |
| Order CRUD | ✅ Complete |
| Customer-Order Relationships | ✅ Complete |
| Search & Filtering | ✅ Complete |
| Dashboard with Statistics | ✅ Complete |
| Pagination | ✅ Complete |
| Form Validation | ✅ Complete |
| Soft Deletes | ✅ Complete |
| Error Handling | ✅ Complete |
| GitHub Repository | ✅ Complete |
| Blade Templating | ✅ Complete |

### ⚠️ PARTIAL/NOT IMPLEMENTED

| Requirement | Status | Notes |
|-------------|--------|-------|
| REST API Endpoints | ⚠️ Partial | Structure exists, not fully implemented |
| Role-Based Access Control | ❌ Not implemented | Optional for mini project |
| CSV/PDF Export | ❌ Not implemented | Enhancement feature |
| Email Notifications | ❌ Not implemented | Enhancement feature |

---

## 🗂️ Database Schema

### Users Table
- id, name, email, password, timestamps

### Customers Table
- id, name, email, phone, address, profile_image, created_by, soft deletes

### Orders Table
- id, order_number, customer_id, amount, status, order_date, created_by, timestamps

---

## ✅ Features Checklist

- ✅ User Authentication
- ✅ Customer Management (Full CRUD)
- ✅ Order Management (Full CRUD)
- ✅ Search & Filtering
- ✅ Dashboard with Real-time Stats
- ✅ Pagination
- ✅ Form Validation
- ✅ Soft Deletes
- ✅ Database Relationships
- ✅ Error Handling
- ✅ Responsive UI
- ✅ GitHub Repository
- ✅ Middleware Protection
- ✅ Eloquent ORM
- ✅ Blade Templating

---

## 📄 Documentation

For detailed information, refer to:
- **TESTING_GUIDE.md** - Complete testing scenarios
- **QUICK_FLOW.md** - Navigation flows
- **PROJECT_REVIEW.md** - Full assignment review

---

## 🔗 Links

- **GitHub:** https://github.com/ShubhamDesai2003/Customer_Mngt_Sys
- **Laravel Docs:** https://laravel.com/docs

---

**Last Updated:** December 10, 2025  
**Status:** ✅ Fully Functional  
**Version:** 1.0.0
