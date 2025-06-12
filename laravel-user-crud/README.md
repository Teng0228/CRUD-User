<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<h2 align="center">Laravel User Management CRUD + API + Swagger + Excel Export</h2>

---

## 📦 Project Overview

This is a Laravel-based application that provides both a web interface and a RESTful API for managing users. Features include:

- Full **CRUD** operations for users
- API routes following REST standards
- **Swagger** documentation using `l5-swagger`
- **Excel export** functionality using PhpSpreadsheet
- **PHPUnit feature tests** for API endpoints

---

## ⚙️ Project Setup Instructions (using XAMPP + VSCode)

### 1. Clone the repository

- git clone https://github.com/Teng0228/CRUD-User.git
- cd laravel-user-crud

---

### 2. Install PHP dependencies

- composer install

---

### 3. Generate the application key

- php artisan key:generate

---

### 4. Configure .env for XAMPP MySQL

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_crud
DB_USERNAME=root
DB_PASSWORD=

---

### 5.Run database migrations

php artisan migrate

### 6.Serve the application

php artisan serve
- Visit: http://localhost:8000

---

🔗 API Endpoints Documentation
Base URL: http://localhost:8000/api/users

Method	Endpoint	Description
GET	/api/users	List users
POST	/api/users	Create a new user
GET	/api/users/{id}	Get single user by ID
PUT	/api/users/{id}	Update existing user
DELETE	/api/users/{id}	Delete user
DELETE	/api/users/bulk-delete	Bulk delete multiple
GET	/api/users-export	Export users to Excel

All requests expect and return JSON.

---

📄 Swagger API Documentation
To generate Swagger documentation:


Copy
Edit
php artisan l5-swagger:generate
Then open in browser:

bash
Copy
Edit
http://localhost:8000/api/documentation
🧪 Run Unit Tests
bash
Copy
Edit
php artisan test
Ensure UserFactory.php exists and matches your actual database schema.

📁 Folder Structure
bash
Copy
Edit
├── app/
│   └── Http/
│       ├── Controllers/
│       │   ├── Api/UserController.php     # API logic
│       │   ├── ExportController.php       # Excel export
│       │   └── UserManagementController.php # Web interface
│
├── routes/
│   ├── web.php       # Blade view routes
│   └── api.php       # API routes
│
├── tests/
│   └── Feature/UserApiTest.php
│
├── resources/views/users/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php




