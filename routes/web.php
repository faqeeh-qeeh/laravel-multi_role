<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\UserManagementController as AdminUserManagementController;
use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Lecturer\AuthController as LecturerAuthController;
use App\Http\Controllers\Lecturer\DashboardController as LecturerDashboardController;
use App\Http\Controllers\Lecturer\ProfileController as LecturerProfileController;

// Home page
Route::get('/', function () {
    return view('welcome');
});


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AdminAuthController::class, 'register']);
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Protected Routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Profile Routes
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [AdminProfileController::class, 'show'])->name('show');
            Route::get('/edit', [AdminProfileController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminProfileController::class, 'update'])->name('update');
            Route::delete('/photo', [AdminProfileController::class, 'deletePhoto'])->name('delete.photo');
        });
        
        // User Management Routes
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/students', [AdminUserManagementController::class, 'students'])->name('students');
            Route::get('/lecturers', [AdminUserManagementController::class, 'lecturers'])->name('lecturers');
            Route::get('/student/{id}', [AdminUserManagementController::class, 'showStudent'])->name('student.show');
            Route::get('/lecturer/{id}', [AdminUserManagementController::class, 'showLecturer'])->name('lecturer.show');
            Route::delete('/student/{id}', [AdminUserManagementController::class, 'deleteStudent'])->name('student.delete');
            Route::delete('/lecturer/{id}', [AdminUserManagementController::class, 'deleteLecturer'])->name('lecturer.delete');
        });

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    // Authentication Routes
    Route::middleware('guest:student')->group(function () {
        Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [StudentAuthController::class, 'register']);
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [StudentAuthController::class, 'login']);
    });

    // Protected Routes
    Route::middleware('student.auth')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        // Profile Routes
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [StudentProfileController::class, 'show'])->name('show');
            Route::get('/edit', [StudentProfileController::class, 'edit'])->name('edit');
            Route::put('/update', [StudentProfileController::class, 'update'])->name('update');
            Route::delete('/photo', [StudentProfileController::class, 'deletePhoto'])->name('delete.photo');
        });
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');
    });
});

// Lecturer Routes
Route::prefix('lecturer')->name('lecturer.')->group(function () {
    // Authentication Routes
    Route::middleware('guest:lecturer')->group(function () {
        Route::get('/register', [LecturerAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [LecturerAuthController::class, 'register']);
        Route::get('/login', [LecturerAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LecturerAuthController::class, 'login']);
    });

    // Protected Routes
    Route::middleware('lecturer.auth')->group(function () {
        Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');
        // Profile Routes
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [LecturerProfileController::class, 'show'])->name('show');
            Route::get('/edit', [LecturerProfileController::class, 'edit'])->name('edit');
            Route::put('/update', [LecturerProfileController::class, 'update'])->name('update');
            Route::delete('/photo', [LecturerProfileController::class, 'deletePhoto'])->name('delete.photo');
        });
        Route::post('/logout', [LecturerAuthController::class, 'logout'])->name('logout');
    });
});