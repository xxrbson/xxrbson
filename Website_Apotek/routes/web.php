<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Redirect to HomeController index after login
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Profile Routes (Authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource Routes for Obat, Brand, Category
Route::resource('obats', ObatController::class);
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);

require __DIR__.'/auth.php';
