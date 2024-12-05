<?php
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

Route::get('/transactions', [DashboardController::class, 'index'])->name('transactions.index');
    // Route::get('dashboard', [UserController::class, 'userDashboard'])->middleware('verified')->name('userdashboard');
    Route::view('profile', 'profile')->name('profile');
    
    // Fetch recent transactions (optional, if you want a specific route for it)
    // Route::get('transactions/recent', [TransactionController::class, 'recentTransactions'])->name('transactions.recent');
});

// Routes for admin access (role: admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/update-balance', [UserController::class, 'updateBalance'])->name('users.update.balance');
    Route::get('transactions/screenshots', [TransactionController::class, 'screenshots'])->name('transactions.screenshots');

// Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
// Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');



    // You can add routes for managing transactions and assigning roles
    // Route::get('admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    // Route::get('admin/assign-roles', [UserController::class, 'showAssignRolesPage'])->name('admin.assignRoles');
});

Route::middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/update-balance', [UserController::class, 'updateBalance'])->name('users.update.balance');
    Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::put('/approvals/{id}', [ApprovalController::class, 'updateStatus'])->name('approvals.update');


Route::get('/alltransactions', [TransactionController::class, 'fetchAll'])->name('transactions.fetchAll');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

// Routes for manager access (role: manager)
// Route::middleware(['auth', 'permission:view manager dashboard'])->get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');

// Routes for viewing transactions (if this is needed for managers/admins)
Route::middleware(['auth', 'permission:view transactions'])->get('transactions/view', [TransactionController::class, 'view'])->name('transactions.view');

// Authentication routes (Laravel Breeze)
require __DIR__ . '/auth.php';
