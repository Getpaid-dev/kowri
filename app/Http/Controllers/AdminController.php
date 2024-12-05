<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch total users excluding admins and managers
        $totalUsers = User::count();

        // Calculate the total deposits by excluding users with 'admin' and 'manager' roles
        $totalDeposits = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['admin', 'manager']); // Exclude users with 'admin' and 'manager' roles
        })->sum('balance');
        
        // Calculate total withdrawals
        $totalWithdrawals = Transaction::where('transaction_type', 'withdrawal')
        ->whereHas('user', function ($query) {
            $query->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['admin', 'manager']); // Exclude users with 'admin' and 'manager' roles
            });
        })
        ->sum('amount');
        
        // Fetch recent deposit transactions
        $recentTransactions = Transaction::where('transaction_type', 'deposit')->latest()->get();
        
        // Pass the data to the view
        return view('dashboard', compact(
            'totalUsers',
            'totalDeposits',
            'totalWithdrawals',
            'recentTransactions'
        ));
    }
}
