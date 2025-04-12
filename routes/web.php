<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('admin/login', [AdminController::class, 'login']); // Show login form
Route::post('admin/login', [AdminController::class, 'submit_login']); // Handle login
Route::get('admin', [AdminController::class, 'index']); // Dashboard after login
Route::get('admin/logout', [AdminController::class, 'logout']); // Logout

// Department CRUD using resource controller
Route::resource('depart', DepartmentController::class);
