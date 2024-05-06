<?php

use Illuminate\Support\Facades\Route;

// admin controllers
use App\Http\Controllers\{
    ProfileController,
    DashboardController,
    UserController,
    OrderController,
    CouponController,
    CategoryController,
    ProductController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function() {
    return redirect(route('login'));
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User routes
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/update-status', [UserController::class, 'deactivate_user'])->name('users.update-status');
    Route::any('/users/edit/{slug}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::post('/users/restore', [UserController::class, 'restore'])->name('users.restore');

    // Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    // Coupon routes
    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons');

    // Product routes
    Route::get('/inventory', [ProductController::class, 'index'])->name('products');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
