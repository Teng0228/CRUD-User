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

### 5.Database migrations

- Import the database give name "user_crud.sql"
- Or use command "php artisan migrate" to try add by own


### 6.Serve the application

php artisan serve
- Visit: http://localhost:8000

---

🔗 API Endpoints Documentation
Base URL: http://localhost:8000/users

- Method	Endpoint	            Description
- GET	    /api/users	            List users
- POST	    /api/users	            Create a new user
- GET	    /api/users/{id}	        Get single user by ID
- PUT	    /api/users/{id}	        Update existing user
- DELETE	/api/users/{id}	        Delete user
- DELETE	/api/users/bulk-delete	Bulk delete multiple
- GET	    /api/users-export	    Export users to Excel

All requests expect and return JSON.

---

📄 Swagger API Documentation
To generate Swagger documentation:

php artisan l5-swagger:generate

Then open in browser:
http://localhost:8000/api/documentation

---

🧪 Run Unit Tests

php artisan test
Ensure UserFactory.php exists and matches your actual database schema.

---

📁 Folder Structure
app/
├── Http/
│ ├── Controllers/
│ │ ├── Api/
│ │ │ └── UserController.php # API logic
│ │ ├── ExportController.php # Excel export
│ │ └── UserManagementController.php # Web interface
│ └── Requests/
│ ├── StoreUserRequest.php # Validation for create
│ └── UpdateUserRequest.php # Validation for update

routes/
├── web.php # Blade view routes
└── api.php # API routes

tests/
└── Feature/
└── UserApiTest.php # API feature tests

resources/views/users/
├── index.blade.php # List view
├── create.blade.php # Create form
├── edit.blade.php # Edit form
└── form.blade.php # Shared form partial

user_crud.sql # MySQL sample data


---

✅ Assumptions and Design Choices

- Database Structure: The users table uses Laravel's default migration.
- Authentication: API routes are public for demo purposes.
- Excel Export: Done using PhpSpreadsheet, outputting a users_export.xlsx file with basic columns.
- Separation of Concerns:
- Web views managed in UserManagementController
- API logic lives in Api\UserController
- Testing: PHPUnit used for API feature tests. Data is seeded using UserFactory.
- Swagger: All API methods are annotated with OpenAPI for L5 Swagger.


