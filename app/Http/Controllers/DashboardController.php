<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the request is for all transactions
        $showAll = request()->query('show_all', false);

        // Get transactions: limited to 3 or all based on $showAll
        $transactions = Auth::user()
            ->transactions()
            ->latest()
            ->when(!$showAll, fn ($query) => $query->limit(3))
            ->get();

        // Get the total balance from the users table
        $balance = Auth::user()->balance;

        return view('userdashboard', compact('transactions', 'balance', 'showAll'));
    }
}
