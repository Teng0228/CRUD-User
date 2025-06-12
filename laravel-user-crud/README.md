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

### 1.Run XAMPP and Download file for link

- Click start the Apache and Mysql
- create empty file to put downloaded file

--- 

### 2. Open VsCode

- Open file "laravel-user-crud"
- Click "new Terminal"
- cd the file path until find "laravel-user-crud"

--- 


### 3. Install PHP dependencies

- composer install

---

### 4. Generate the application key

- php artisan key:generate

---

### 5. Configure .env for XAMPP MySQL

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=user_crud
- DB_USERNAME=root
- DB_PASSWORD=

---


### 6.Database migrations

- Import the database given that name "user_crud.sql"
- Or use command "php artisan migrate" to try add by own

--- 


### 7.Serve the application

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
│ │ ├── Api/UserController.php # API logic
│ │ ├── ExportController.php # Excel export
│ │ └── UserManagementController.php # Web interface
│ └── Requests/
│ ├── StoreUserRequest.php # Store user validation
│ └── UpdateUserRequest.php # Update user validation

routes/
├── web.php # Web (Blade) routes
└── api.php # API routes

tests/
└── Feature/UserApiTest.php # Feature tests for the API

resources/views/users/
├── index.blade.php # User list view
├── create.blade.php # Create user view
├── edit.blade.php # Edit user view
└── form.blade.php # Shared form partial

user_crud.sql # Sample MySQL export
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


