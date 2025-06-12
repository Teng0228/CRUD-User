<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
Route::delete('/users-bulk-delete', [UserManagementController::class, 'bulkDelete'])->name('users.bulkDelete');

// Export route
Route::get('/users-export', [ExportController::class, 'exportUsers'])->name('users.export');
