<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

// Redirect root to admin dashboard
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Authentication Routes
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'submit_login'])->name('admin.login.submit');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard Route
Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Department CRUD
Route::get('depart/{id}/delete', [DepartmentController::class, 'destroy'])->name('depart.delete');
Route::resource('depart', DepartmentController::class);

// Employee CRUD
Route::get('employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.delete');

// Use resource routing for employee (this automatically handles index, create, store, show, edit, update, and destroy)
Route::resource('employee', EmployeeController::class);

// Alternatively, if you want to manually specify show and edit methods:
Route::get('employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');  // Show Employee details
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit'); // Edit Employee details
