<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;


// Landing page route
Route::view('/', 'kowri');

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    
    // Deposit form route
    Route::get('deposit', [TransactionController::class, 'showDepositForm'])->name('deposit');
    
    // Withdraw form route
    Route::get('withdraw', [TransactionController::class, 'showWithdrawForm'])->name('withdraw');
    
    // Route to store the transaction (POST request)
    Route::post('transaction/store', [TransactionController::class, 'store'])
        ->name('transaction.store');

    // User dashboard and profile routes
    Route::view('dashboard', 'dashboard')->middleware('verified')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    
    // Fetch recent transactions
    // Route::get('transactions/recent', [TransactionController::class, 'recentTransactions'])->name('transactions.recent');
});

// Routes for admin access (role: admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    // Route::get('admin/assign-roles', [UserController::class, 'showAssignRolesPage'])->name('admin.assignRoles');
});

// Routes for manager access (role: manager)
// Example Route for Manager
Route::middleware(['auth', 'permission:view manager dashboard'])->get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');


// Routes with permission middleware (example)
Route::middleware(['auth', 'permission:view transactions'])->get('transactions/view', [TransactionController::class, 'view'])->name('transactions.view');

// Authentication routes (Laravel Breeze)
require __DIR__ . '/auth.php';
