# Impact Guru CRM - Testing Guide

## Application Overview
This is a complete Customer Relationship Management (CRM) system built with Laravel 10 and Bootstrap 5. It includes user authentication, customer management, order tracking, and a dashboard with statistics.

---

## 🌐 Access the Application
**URL:** `http://localhost:8000`

---

## 📋 Test Data Available
The application comes pre-loaded with test data:
- **Test User:** 
  - Email: `test@example.com`
  - Password: `password`
- **Test Customer:** John Doe
- **Test Order:** ORD-001 ($250.50, Pending status)

---

## ✅ Feature Testing Checklist

### 1. **Authentication System**

#### A. Welcome Page (Public)
- **Navigate to:** `http://localhost:8000`
- **Expected Result:** 
  - Professional landing page with feature highlights
  - "Login" and "Register" buttons visible for unauthenticated users
  - Feature cards showing: Manage Customers, Track Orders, Analytics, Secure Access

#### B. User Registration
- **Navigate to:** `http://localhost:8000/register`
- **Test Steps:**
  1. Click "Register" button or use direct URL
  2. Fill in the form:
     - Name: `John Developer`
     - Email: `developer@test.com`
     - Password: `TestPassword123`
     - Confirm Password: `TestPassword123`
  3. Click "Register" button
- **Expected Result:**
  - New user account created
  - Automatically logged in
  - Redirected to dashboard
  - Welcome message appears

#### C. User Login
- **Navigate to:** `http://localhost:8000/login`
- **Test Steps:**
  1. Enter email: `test@example.com`
  2. Enter password: `password`
  3. Check "Remember Me" (optional)
  4. Click "Login" button
- **Expected Result:**
  - Login successful
  - Redirected to dashboard
  - Navigation shows username in top-right dropdown

#### D. User Profile
- **Navigate to:** After login, click profile icon → "My Profile" or go to `http://localhost:8000/profile`
- **Test Steps:**
  1. View current profile information (name, email)
  2. Click "Edit Profile" 
  3. Modify name (e.g., "Test User Updated")
  4. Click "Update Profile"
- **Expected Result:**
  - Profile updated successfully
  - Success message displayed
  - Changes reflected in next page load

#### E. User Logout
- **Navigate to:** Click profile icon in top-right → "Logout"
- **Expected Result:**
  - Session terminated
  - Redirected to home page
  - Login/Register buttons visible again

---

### 2. **Dashboard**

#### A. View Dashboard
- **Navigate to:** After login, `http://localhost:8000/dashboard`
- **Expected Result:**
  - 4 statistics cards displaying:
    1. **Total Customers:** Shows count (should show 1 with test data)
    2. **Total Orders:** Shows count (should show 1 with test data)
    3. **Pending Orders:** Shows pending count
    4. **Revenue:** Shows total revenue amount
  - Recent Orders table with order details
  - Recent Customers table with customer details
  - Quick action links to manage data

---

### 3. **Customer Management**

#### A. View All Customers
- **Navigate to:** Dashboard → "Customers" or `http://localhost:8000/customers`
- **Expected Result:**
  - Table with all customers
  - Columns: ID, Name, Email, Phone, Address, Actions
  - Test customer "John Doe" should be visible
  - Search bar at top
  - "Add Customer" button

#### B. Search Customers
- **On Customers page:**
  1. Enter "John" in search field
  2. Click "Search" button
- **Expected Result:**
  - Table filtered to show only matching customers
  - Search is case-insensitive

#### C. Create New Customer
- **Navigate to:** Customers page → "Add Customer" button or `http://localhost:8000/customers/create`
- **Test Steps:**
  1. Fill in form:
     - **Name:** `Alice Johnson`
     - **Email:** `alice@company.com`
     - **Phone:** `555-0123`
     - **Address:** `123 Main St, New York, NY 10001`
     - **Profile Image:** (optional - leave blank or upload)
  2. Click "Create Customer" button
- **Expected Result:**
  - Customer created successfully
  - Redirected to customer list
  - New customer appears in table
  - Success message shown

#### D. View Customer Details
- **Navigate to:** Customers page → Click "View" button for any customer
- **Expected Result:**
  - Customer detail page with:
    - Customer name and information
    - Contact details (email, phone, address)
    - Profile image (if uploaded)
    - Associated orders table
    - Edit and Delete buttons

#### E. Edit Customer
- **Navigate to:** Customer detail page → "Edit" button or Customers list → "Edit" button
- **Test Steps:**
  1. Modify customer information (e.g., change phone number)
  2. Click "Update Customer" button
- **Expected Result:**
  - Customer information updated
  - Redirected to customer list
  - Changes visible in customer details

#### F. Delete Customer
- **Navigate to:** Customers page → "Delete" button for a customer
- **Test Steps:**
  1. Click "Delete" button
  2. Confirm deletion in popup
- **Expected Result:**
  - Customer soft-deleted (still in database but marked as deleted)
  - Removed from customer list
  - Success message shown

---

### 4. **Order Management**

#### A. View All Orders
- **Navigate to:** Dashboard → "Orders" or `http://localhost:8000/orders`
- **Expected Result:**
  - Table with all orders
  - Columns: Order #, Customer, Amount, Status, Date, Actions
  - Test order "ORD-001" should be visible
  - Status badges (Pending = yellow, Completed = green, Cancelled = red)
  - Filters for status and search

#### B. Filter Orders by Status
- **On Orders page:**
  1. Click status dropdown filter
  2. Select "Pending"
- **Expected Result:**
  - Table shows only pending orders

#### C. Search Orders
- **On Orders page:**
  1. Enter "ORD" in search field
  2. Click "Search" button
- **Expected Result:**
  - Table filtered by order number

#### D. Create New Order
- **Navigate to:** Orders page → "Create Order" button or `http://localhost:8000/orders/create`
- **Test Steps:**
  1. Fill in form:
     - **Customer:** Select "John Doe" (or any existing customer)
     - **Order Number:** `ORD-002`
     - **Amount:** `500.99`
     - **Order Date:** Select today's date
     - **Status:** Select "Pending"
  2. Click "Create Order" button
- **Expected Result:**
  - Order created successfully
  - Redirected to orders list
  - New order appears in table
  - Success message shown

#### E. View Order Details
- **Navigate to:** Orders page → Click "View" button for any order
- **Expected Result:**
  - Order detail page with:
    - Order number and ID
    - Associated customer information
    - Order amount and date
    - Current status with badge
    - Edit and Delete buttons

#### F. Edit Order
- **Navigate to:** Order detail page → "Edit" button or Orders list → "Edit" button
- **Test Steps:**
  1. Change order details:
     - Change amount (e.g., `750.50`)
     - Change status to "Completed"
  2. Click "Update Order" button
- **Expected Result:**
  - Order updated successfully
  - Redirected to orders list
  - Changes reflected in order details
  - Status badge color changes (Completed = green)

#### G. Delete Order
- **Navigate to:** Orders page → "Delete" button for an order
- **Test Steps:**
  1. Click "Delete" button
  2. Confirm deletion
- **Expected Result:**
  - Order deleted
  - Removed from orders list
  - Success message shown

---

### 5. **UI/UX Features**

#### A. Responsive Navigation
- **Test on different screen sizes:**
  - Desktop (1920x1080)
  - Tablet (768x1024)
  - Mobile (375x667)
- **Expected Result:**
  - Navigation collapses on mobile
  - Sidebar hides on smaller screens
  - All content remains readable and functional

#### B. Sidebar Navigation
- **When logged in, check sidebar shows:**
  - Dashboard (home icon)
  - Customers (people icon)
  - Orders (clipboard icon)
  - Profile (user icon)
  - Logout option
- **Click each link:**
  - All links navigate correctly

#### C. Alert Messages
- **Create/Update/Delete operations show:**
  - Green success alerts
  - Messages disappear after 5 seconds (or manually)
  - Content clearly describes the action performed

#### D. Form Validation
- **Test on create/edit forms:**
  1. Leave required fields empty
  2. Click submit
- **Expected Result:**
  - Validation errors displayed
  - Form not submitted
  - Required fields highlighted

#### E. Buttons and Links
- **Check all buttons are:**
  - Properly styled (Bootstrap classes)
  - Responsive (clickable on all devices)
  - Show hover effects
  - Have appropriate icons

---

### 6. **Database Features**

#### A. Soft Deletes
- **Delete a customer:**
  1. Note the customer ID
  2. Delete the customer
  3. Try to view it directly - should not appear
- **Expected Result:**
  - Customer hidden from list views
  - Still exists in database (soft delete)
  - Can be restored if needed

#### B. Relationships
- **View customer detail page:**
  1. Orders associated with customer should display
- **Expected Result:**
  - Shows all orders for that customer
  - Clicking order takes you to order details

---

### 7. **Security Features**

#### A. Authentication Required
- **Try to access protected pages without login:**
  1. Use URL: `http://localhost:8000/dashboard`
  2. Or: `http://localhost:8000/customers`
  3. Or: `http://localhost:8000/orders`
- **Expected Result:**
  - Redirected to login page
  - Cannot access without authentication

#### B. Session Management
- **After logging in:**
  1. Close browser tab (don't logout)
  2. Return to application
  3. You should still be logged in
- **After 2+ hours:**
  1. Session expires
  2. Redirected to login

#### C. CSRF Protection
- **All forms include CSRF tokens:**
  1. Check form source code
  2. Should see `@csrf` directive
- **Expected Result:**
  - All forms have CSRF token
  - Protection against cross-site attacks

---

### 8. **Error Handling**

#### A. 404 Not Found
- **Navigate to:** `http://localhost:8000/nonexistent`
- **Expected Result:**
  - Error page displayed
  - Helpful message
  - Link to go back home

#### B. 500 Server Error
- **Try to view deleted customer directly (if ID known)**
- **Expected Result:**
  - Proper error handling
  - Graceful error page
  - No exposing of sensitive information

---

## 📊 Complete Testing Workflow Example

### Scenario: Create and manage a new customer order

1. **Login**
   - Go to `http://localhost:8000/login`
   - Email: `test@example.com`, Password: `password`
   - Click Login

2. **Create New Customer**
   - Click "Customers" in sidebar
   - Click "Add Customer" button
   - Fill: Name: `Acme Corp`, Email: `contact@acme.com`, Phone: `555-9999`, Address: `456 Business Ave`
   - Click "Create Customer"

3. **Create New Order for Customer**
   - Click "Orders" in sidebar
   - Click "Create Order" button
   - Select Customer: `Acme Corp`
   - Order Number: `ORD-ACME-001`
   - Amount: `1500.00`
   - Status: `Pending`
   - Click "Create Order"

4. **View Dashboard**
   - Click "Dashboard"
   - Verify new customer appears in "Recent Customers"
   - Verify new order appears in "Recent Orders"
   - Check statistics updated (Total Customers: 2, Total Orders: 2)

5. **Update Order Status**
   - Click "Orders"
   - Click "View" on the new order
   - Click "Edit"
   - Change Status to "Completed"
   - Update Amount to `1575.50` (after discount)
   - Click "Update Order"

6. **Verify Changes**
   - Go to Dashboard
   - Check revenue calculation updated
   - Check "Completed Orders" count increased

7. **Logout**
   - Click profile icon → "Logout"
   - Verify redirected to home page

---

## 🎯 Success Criteria

Your CRM is working correctly if:

- ✅ All authentication features work (register, login, logout, profile)
- ✅ Can create, read, update, delete customers
- ✅ Can create, read, update, delete orders
- ✅ Customer-Order relationships work correctly
- ✅ Dashboard statistics update accurately
- ✅ Search and filters function properly
- ✅ UI is responsive on all devices
- ✅ Form validation works
- ✅ Alert messages display correctly
- ✅ Protected routes require authentication
- ✅ No errors in console or server logs

---

## 🔧 Troubleshooting

**Issue: Login fails with "could not find driver"**
- Solution: Clear Laravel cache via terminal
- Command: `php artisan cache:clear` or delete storage/framework/cache contents

**Issue: Customers page shows error**
- Solution: The issue was the `Str::limit()` function - this has been fixed
- The address field will now properly truncate long text

**Issue: Forms not submitting**
- Solution: Check browser console for CSRF token errors
- Ensure cookies are enabled

**Issue: Customers/Orders not appearing**
- Solution: Run `php create_test_data.php` to seed test data
- Or use the UI to create new records

---

## 📞 Support
For issues or questions about the CRM, refer to the application logs at:
- Server Terminal (PHP Development Server output)
- `storage/logs/laravel.log`

---

**Last Updated:** December 10, 2025
**Application Version:** Laravel 10.50.0
**Status:** ✅ Fully Functional
