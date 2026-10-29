<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\CourseController;

// 1. FRONTEND
Route::get('/', [FrontController::class, 'index'])->name('home');

// 2. ROUTE LOGIN & LOGOUT
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// 3. BACKEND (ADMIN) - Dilindungi oleh Middleware Auth
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class);
    Route::resource('education', EducationController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('organization', OrganizationController::class);
    Route::resource('certification', CertificationController::class);
    Route::resource('course', CourseController::class);
});
