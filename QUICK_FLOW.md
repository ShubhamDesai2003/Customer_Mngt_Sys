# Impact Guru CRM - Quick Start Flow

## 🚀 Getting Started Flow

### **Step 1: Open Application**
```
http://localhost:8000
         ↓
    Welcome Page
    (Features displayed)
```

---

## 📍 Complete User Journey Flow

### **FLOW A: New User (Registration Path)**
```
http://localhost:8000
         ↓
    Click "Register"
         ↓
    http://localhost:8000/register
         ↓
    Fill Registration Form:
    - Name
    - Email
    - Password
    - Confirm Password
         ↓
    Click "Register" Button
         ↓
    Auto Login & Redirect to Dashboard
         ↓
    http://localhost:8000/dashboard ✅
```

---

### **FLOW B: Existing User (Login Path)**
```
http://localhost:8000
         ↓
    Click "Login"
         ↓
    http://localhost:8000/login
         ↓
    Enter Email: test@example.com
    Enter Password: password
         ↓
    Click "Login" Button
         ↓
    Redirect to Dashboard
         ↓
    http://localhost:8000/dashboard ✅
```

---

## 🏠 Dashboard & Main Features Flow

### **FLOW C: After Login - Dashboard Overview**
```
Dashboard (http://localhost:8000/dashboard)
         ↓
    ┌────────────────────────────────────┐
    │  📊 Statistics Cards               │
    │  - Total Customers                 │
    │  - Total Orders                    │
    │  - Pending Orders                  │
    │  - Total Revenue                   │
    └────────────────────────────────────┘
         ↓
    ┌────────────────────────────────────┐
    │  📋 Recent Orders Table            │
    │  📋 Recent Customers Table         │
    └────────────────────────────────────┘
         ↓
    Click on any section to navigate
```

---

## 👥 Customer Management Flow

### **FLOW D: View All Customers**
```
Dashboard
   ↓
Click "Customers" (Sidebar)
   ↓
http://localhost:8000/customers
   ↓
View Customer List Table:
- ID | Name | Email | Phone | Address | Actions
   ↓
Options:
├─→ Click "View" → See Customer Details
├─→ Click "Edit" → Edit Customer Info
├─→ Click "Delete" → Remove Customer
└─→ Use Search Box → Filter Customers
```

---

### **FLOW E: Create New Customer**
```
Customers Page
   ↓
Click "Add Customer" Button
   ↓
http://localhost:8000/customers/create
   ↓
Fill Form:
├─ Name: John Smith
├─ Email: john@example.com
├─ Phone: 555-0123
├─ Address: 789 Oak St
└─ Profile Image: (optional)
   ↓
Click "Create Customer"
   ↓
Success Message ✅
   ↓
Redirect to Customers List
```

---

### **FLOW F: View Customer Details**
```
Customers List
   ↓
Click "View" Button
   ↓
http://localhost:8000/customers/{id}
   ↓
Display:
├─ Customer Info Card
├─ Contact Details
├─ Profile Image
├─ Associated Orders Table
└─ Action Buttons
   ↓
Options:
├─→ Click "Edit" → Update Information
├─→ Click "Delete" → Remove Customer
└─→ Click on Order → View Order Details
```

---

### **FLOW G: Edit Customer**
```
Customer Details Page
   ↓
Click "Edit" Button
   ↓
http://localhost:8000/customers/{id}/edit
   ↓
Modify:
├─ Name
├─ Email
├─ Phone
├─ Address
└─ Profile Image
   ↓
Click "Update Customer"
   ↓
Success Message ✅
   ↓
Redirect to Customers List
```

---

### **FLOW H: Delete Customer**
```
Customers List (or Customer Details)
   ↓
Click "Delete" Button
   ↓
Confirm in Popup: "Are you sure?"
   ↓
Click "OK"
   ↓
Customer Removed ✅
   ↓
Success Message
   ↓
Redirect to Customers List
```

---

## 📦 Order Management Flow

### **FLOW I: View All Orders**
```
Dashboard
   ↓
Click "Orders" (Sidebar)
   ↓
http://localhost:8000/orders
   ↓
View Orders Table:
- Order # | Customer | Amount | Status | Date | Actions
   ↓
Options:
├─→ Click "View" → See Order Details
├─→ Click "Edit" → Edit Order Info
├─→ Click "Delete" → Remove Order
├─→ Use Status Filter → Filter by Pending/Completed/Cancelled
└─→ Use Search Box → Search by Order Number
```

---

### **FLOW J: Create New Order**
```
Orders Page
   ↓
Click "Create Order" Button
   ↓
http://localhost:8000/orders/create
   ↓
Fill Form:
├─ Customer: (Select from dropdown)
├─ Order Number: ORD-001
├─ Amount: 250.50
├─ Order Date: (Select date)
└─ Status: (Pending/Completed/Cancelled)
   ↓
Click "Create Order"
   ↓
Success Message ✅
   ↓
Redirect to Orders List
```

---

### **FLOW K: View Order Details**
```
Orders List
   ↓
Click "View" Button
   ↓
http://localhost:8000/orders/{id}
   ↓
Display:
├─ Order ID & Number
├─ Customer Info Card
├─ Order Amount
├─ Order Date
├─ Current Status Badge
└─ Action Buttons
   ↓
Options:
├─→ Click "Edit" → Update Order
├─→ Click "Delete" → Remove Order
└─→ Click Customer Name → View Customer Profile
```

---

### **FLOW L: Edit Order**
```
Order Details Page
   ↓
Click "Edit" Button
   ↓
http://localhost:8000/orders/{id}/edit
   ↓
Modify:
├─ Customer
├─ Order Number
├─ Amount
├─ Order Date
└─ Status (Pending → Completed, etc.)
   ↓
Click "Update Order"
   ↓
Success Message ✅
   ↓
Status Badge Updates (Color Changes)
   ↓
Redirect to Orders List
```

---

### **FLOW M: Delete Order**
```
Orders List (or Order Details)
   ↓
Click "Delete" Button
   ↓
Confirm in Popup: "Are you sure?"
   ↓
Click "OK"
   ↓
Order Removed ✅
   ↓
Success Message
   ↓
Redirect to Orders List
```

---

## 👤 User Profile Flow

### **FLOW N: View/Edit Profile**
```
Any Logged-In Page
   ↓
Click Profile Icon (Top-Right)
   ↓
┌──────────────────────┐
│ ▼ Dropdown Menu      │
├──────────────────────┤
│ 📋 My Profile        │
│ 🚪 Logout            │
└──────────────────────┘
   ↓
Click "My Profile"
   ↓
http://localhost:8000/profile
   ↓
View Current Information:
├─ Name
└─ Email
   ↓
Click "Edit Profile"
   ↓
Modify:
├─ Name
└─ Email
   ↓
Click "Update Profile"
   ↓
Success Message ✅
```

---

## 🚪 Logout Flow

### **FLOW O: Logout**
```
Any Logged-In Page
   ↓
Click Profile Icon (Top-Right)
   ↓
Click "Logout"
   ↓
Session Terminated
   ↓
Redirect to Home Page
   ↓
http://localhost:8000 (Welcome Page)
   ↓
"Login" & "Register" Buttons Visible Again ✅
```

---

## 🔄 Complete Round-Trip Flow Example

```
START
  ↓
http://localhost:8000 (Welcome)
  ↓
Click "Login"
  ↓
Enter test@example.com / password
  ↓
Dashboard (View Statistics)
  ↓
Click "Customers"
  ↓
View List → Click "View" on Customer
  ↓
See Customer Details & Associated Orders
  ↓
Click "Orders"
  ↓
View List → Click "Edit" on an Order
  ↓
Change Status to "Completed"
  ↓
Update Order
  ↓
Back to Dashboard (Statistics Updated) ✅
  ↓
Click Profile Icon → "My Profile"
  ↓
View Your Profile
  ↓
Click Profile Icon → "Logout"
  ↓
Back to Welcome Page
  ↓
END ✅
```

---

## 📱 Quick Navigation Reference

**From Any Page:**

| Goal | Path |
|------|------|
| Dashboard | Click "Dashboard" in Sidebar or Logo |
| Customers | Click "Customers" in Sidebar |
| Orders | Click "Orders" in Sidebar |
| Profile | Click Profile Icon → "My Profile" |
| Logout | Click Profile Icon → "Logout" |
| Home | Click "ImpactGuru" Logo |

---

## 🎯 Common Tasks Quick Links

| Task | Direct URL |
|------|-----------|
| Login | `http://localhost:8000/login` |
| Register | `http://localhost:8000/register` |
| Dashboard | `http://localhost:8000/dashboard` |
| View Customers | `http://localhost:8000/customers` |
| Add Customer | `http://localhost:8000/customers/create` |
| View Orders | `http://localhost:8000/orders` |
| Add Order | `http://localhost:8000/orders/create` |
| My Profile | `http://localhost:8000/profile` |

---

## ✨ Status Badges Reference

| Status | Color | Meaning |
|--------|-------|---------|
| **Pending** | 🟡 Yellow | Order awaiting fulfillment |
| **Completed** | 🟢 Green | Order completed successfully |
| **Cancelled** | 🔴 Red | Order cancelled |

---

## 💡 Tips

✅ Use **Search Boxes** to find customers or orders quickly
✅ Use **Status Filters** to view specific types of orders
✅ Click **View** buttons to see detailed information
✅ Check **Dashboard** to see overall statistics
✅ Use **Recent Tables** on Dashboard for quick access
✅ All forms have **validation** - follow error messages
✅ All pages are **responsive** - works on mobile/tablet too

---

**Created:** December 10, 2025 | **Status:** ✅ Ready to Use
