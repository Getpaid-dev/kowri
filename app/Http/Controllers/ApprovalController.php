<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function __construct()
    {
        // Add middleware to ensure only admins or managers can access this
        // $this->middleware(['auth', 'role:admin|manager']);
    }

    public function index()
    {
        $transactions = Transaction::where('status', 'pending')
            // ->where('transaction_type', 'deposit')
            ->latest()
            ->get();
        return view('approvals.index', compact('transactions'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);
        // dd('Before update:', $transaction->status);

        // Update the status of the transaction to "success"
        $transaction->status = $request->status; // status will be passed as 'success' in the form
        $transaction->save();
        // Check the status after saving
        //   dd('After update:', $transaction->status);

        // Only update the balance if the transaction's user is an admin or manager
        $user = $transaction->user; // Fetch the user associated with this transaction

        if (
            $transaction->transaction_type === 'deposit' &&
            $transaction->status === 'success' &&
            $user->hasAnyRole(['admin', 'manager']) // Check the role of the transaction's user
        ) {
            $user->increment('balance', $transaction->amount * 5);
        }

        // Redirect back to the transaction approvals page with a success message
        return redirect()->route('approvals.index')->with('success', 'Transaction status updated successfully.');
    }
}
