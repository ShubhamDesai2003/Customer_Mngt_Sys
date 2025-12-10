# ImpactGuru Mini CRM - Customer Management System

A modern, feature-rich Customer Relationship Management (CRM) application built with Laravel 10, designed for managing customers, orders, and user roles with comprehensive access control.

## Project Overview

ImpactGuru Mini CRM is a web-based application that helps businesses manage their customers and orders efficiently. The system provides role-based access control with Admin and Staff roles, comprehensive CRUD operations, reporting capabilities, and a REST API for integration.

## Features

### 1. **Authentication & Authorization**
- User registration and login system using Laravel Breeze
- Password reset functionality
- Role-Based Access Control (RBAC) with two roles:
  - **Admin**: Full access to all modules (Customers, Orders, Users)
  - **Staff**: Can view/add/edit customers and orders but cannot delete
- Middleware-based route protection (`IsAdmin`, `VerifyRole`)

### 2. **Customer Management**
- **CRUD Operations**: Create, Read, Update, Delete customers
- **Profile Management**: Upload and display customer profile images
- **Soft Deletes**: Safe data removal with recovery options
- **Search & Filtering**: Find customers by name or email
- **Pagination**: Display customers with pagination (15 per page)
- **Export Options**: Download customer lists as CSV or PDF
- **Validation**: Form request validation for all inputs

### 3. **Order Management**
- **Order Tracking**: Create and manage orders linked to customers
- **One-to-Many Relationship**: Each customer can have multiple orders
- **Status Management**: Track orders as Pending, Completed, or Cancelled
- **Search & Filtering**: Filter orders by status and order number
- **Pagination**: Display orders with pagination (15 per page)
- **Export Options**: Download order reports as CSV or PDF
- **Notifications**: Email alerts for new orders

### 4. **Dashboard**
- **Key Statistics**:
  - Total Customers count
  - Total Orders count
  - Total Revenue calculation
  - Pending Orders count
- **Order Status Overview**: Visual breakdown of orders by status
- **Recent Customers**: Display last 5 added customers
- **Role-based Views**: Different dashboard content for Admin and Staff

### 5. **REST API**
- **Sanctum Authentication**: Secure API token-based authentication
- **Customer Endpoints**:
  - `GET /api/customers` - List all customers
  - `GET /api/customers/{id}` - Get specific customer
  - `POST /api/customers` - Create new customer (Admin only)
  - `PUT /api/customers/{id}` - Update customer (Admin only)
  - `DELETE /api/customers/{id}` - Delete customer (Admin only)
- **Role-based Access**: Admin-only restrictions on create/update/delete

### 6. **Error Handling & Validation**
- Form request validation for cleaner code
- Custom validation messages
- Comprehensive error display
- Logging to `storage/logs/laravel.log`

### 7. **User Interface**
- Bootstrap 5 responsive design
- Font Awesome icons
- Clean navigation and sidebar
- Mobile-friendly layout
- Status badges with color coding

## Technical Stack

| Component | Technology |
|-----------|------------|
| **Framework** | Laravel 10.x |
| **PHP Version** | PHP >= 8.1 |
| **Database** | MySQL |
| **Frontend** | Blade Templating, Bootstrap 5, Font Awesome |
| **Authentication** | Laravel Breeze |
| **API Security** | Laravel Sanctum |
| **PDF Export** | DomPDF |
| **CSV Export** | Native PHP with League/CSV |
| **Notifications** | Laravel Notifications/Mail |
| **Version Control** | Git & GitHub |

## Installation & Setup

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Git

### Step 1: Clone the Repository
```bash
git clone https://github.com/yourusername/impact-guru-crm.git
cd impact-guru-crm
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Database Setup
Edit `.env` file and configure your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=impact_guru_crm
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 6: Create Storage Link
```bash
php artisan storage:link
```

### Step 7: Run the Application
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Default Credentials

The application comes with a seeder that creates a default admin user:
- **Email**: admin@example.com
- **Password**: password123

(Optional: Create a custom seeder or manually create users via registration)

## Database Structure

### Users Table
- id (Primary Key)
- name (string)
- email (unique)
- password (hashed)
- role (enum: Admin, Staff)
- timestamps

### Customers Table
- id (Primary Key)
- name (string)
- email (unique)
- phone (string)
- address (text)
- profile_image (nullable, string)
- created_by (Foreign Key to users)
- soft_deletes
- timestamps

### Orders Table
- id (Primary Key)
- order_number (unique)
- customer_id (Foreign Key)
- amount (decimal)
- status (enum: Pending, Completed, Cancelled)
- order_date (timestamp)
- created_by (Foreign Key to users)
- timestamps

## API Usage

### Authentication
First, get your API token from your user profile.

### Example Requests

#### Get All Customers
```bash
curl -H "Authorization: Bearer YOUR_TOKEN" \
     http://localhost:8000/api/customers
```

#### Create Customer
```bash
curl -X POST http://localhost:8000/api/customers \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{
       "name": "John Doe",
       "email": "john@example.com",
       "phone": "123-456-7890",
       "address": "123 Main St"
     }'
```

#### Update Customer
```bash
curl -X PUT http://localhost:8000/api/customers/1 \
     -H "Authorization: Bearer YOUR_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{
       "name": "Jane Doe",
       "email": "jane@example.com"
     }'
```

#### Delete Customer
```bash
curl -X DELETE http://localhost:8000/api/customers/1 \
     -H "Authorization: Bearer YOUR_TOKEN"
```

## File Structure

```
impact-guru-crm/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CustomerController.php
│   │   │   ├── OrderController.php
│   │   │   ├── DashboardController.php
│   │   │   └── Api/
│   │   │       └── CustomerApiController.php
│   │   ├── Middleware/
│   │   │   ├── IsAdmin.php
│   │   │   └── VerifyRole.php
│   │   └── Requests/
│   │       ├── StoreCustomerRequest.php
│   │       ├── UpdateCustomerRequest.php
│   │       ├── StoreOrderRequest.php
│   │       └── UpdateOrderRequest.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Customer.php
│   │   └── Order.php
│   └── Notifications/
│       └── NewOrderNotification.php
├── database/
│   └── migrations/
│       ├── 2024_01_01_000000_create_users_table.php
│       ├── 2024_01_02_000000_create_customers_table.php
│       └── 2024_01_03_000000_create_orders_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── navbar.blade.php
│       │   └── sidebar.blade.php
│       ├── dashboard/
│       │   └── index.blade.php
│       ├── customers/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── show.blade.php
│       │   └── pdf.blade.php
│       └── orders/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           ├── show.blade.php
│           └── pdf.blade.php
├── routes/
│   ├── web.php
│   └── api.php
├── .env.example
├── composer.json
└── README.md
```

## Role Permissions Summary

### Admin Role
- ✅ View Dashboard
- ✅ View/Create/Edit/Delete Customers
- ✅ View/Create/Edit/Delete Orders
- ✅ Export Customer & Order Data
- ✅ Access User Management
- ✅ API Access (Full)

### Staff Role
- ✅ View Dashboard (Filtered)
- ✅ View/Create/Edit Customers
- ✅ View/Create/Edit Orders
- ✅ Export Data
- ❌ Delete Customers
- ❌ Delete Orders
- ❌ Access User Management
- ⚠️ API Access (Read-only)

## Key Features in Detail

### Export Functionality
- **CSV Export**: Lightweight, spreadsheet-compatible format
- **PDF Export**: Professional reports with branding
- Both support filters (search, status) applied during export

### Search & Filtering
- **Customer Search**: By name or email
- **Order Filtering**: By status (Pending, Completed, Cancelled)
- **Order Search**: By order number
- **AJAX-Ready**: Can be enhanced with AJAX filtering

### Soft Deletes
- Deleted customers are not shown in listings
- Data remains in database for recovery
- Admins can restore if needed

## Error Handling

The application includes:
- Validation error display on forms
- Success/error flash messages
- Proper HTTP status codes
- Database transaction support
- Activity logging

## Security Features

- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- Password hashing with bcrypt
- API token authentication with Sanctum
- Role-based authorization checks
- File upload validation
- Input validation and sanitization

## Future Enhancements

- [ ] AJAX-based filtering for better UX
- [ ] Advanced reporting with charts
- [ ] Email notifications configuration
- [ ] User management interface
- [ ] Activity logs
- [ ] Bulk operations
- [ ] Custom fields
- [ ] Multi-language support
- [ ] Dark mode
- [ ] Mobile app (React Native/Flutter)

## Troubleshooting

### Database Connection Error
Ensure your `.env` file has correct database credentials and MySQL is running.

### Storage Link Error
Run: `php artisan storage:link`

### Permission Issues
```bash
chmod -R 775 storage bootstrap/cache
```

### Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
```

## Testing

Run tests with:
```bash
php artisan test
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support & Contact

For support, please contact your mentor or create an issue in the GitHub repository.

## Changelog

### Version 1.0.0 (Initial Release)
- Core CRM functionality
- Authentication & RBAC
- Customer & Order management
- Dashboard with statistics
- REST API with Sanctum
- CSV/PDF export
- Email notifications

---

**Project Status**: ✅ Complete & Production-Ready

**Last Updated**: December 10, 2024

**GitHub Repository**: [Your GitHub Link]

**Live Demo**: [Your Live Demo Link]
