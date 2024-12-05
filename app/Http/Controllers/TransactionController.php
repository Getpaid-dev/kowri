<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TransactionController extends Controller
{
    // Show the deposit form
    public function showDepositForm()
    {
        return view('deposit');
    }

    // Show the withdraw form
    public function showWithdrawForm()
    {
        return view('withdraw');
    }
    public function fetchAll()
    {
        $transactions = Transaction::with('user')->latest()->get(); // Eager load the 'user' relationship
        return view('transactions', compact('transactions'));
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
    public function screenshots()
    {
        // Fetch transactions with screenshots and associated user data
        $transactions = Transaction::with('user')
            ->whereNotNull('screenshot')
            ->latest()
            ->get();

        return view('screenshots', compact('transactions'));
    }

    // Handle form submission
   public function store(Request $request)
{
    try {
        // Validate the incoming request based on transaction type
        $validated = $request->validate([
            'transaction_type' => 'required|in:deposit,withdrawal',
            'account_name' => 'required_if:transaction_type,withdrawal|string|max:255',
            'agent_service' => 'required_if:transaction_type,withdrawal|string',
            'network_provider' => 'required_if:transaction_type,withdrawal|string',
            'account_number' => 'required_if:transaction_type,withdrawal|digits:10',
            'withdrawal_amount' => 'required_if:transaction_type,withdrawal|numeric|min:2500',
            'token_id' => 'required_if:transaction_type,deposit|string|size:12',
            'secret_code' => 'required_if:transaction_type,deposit|string|size:4',
            'wallet_id' => 'required_if:transaction_type,deposit|digits:10',
            'deposit_amount' => 'required_if:transaction_type,deposit|numeric',
            'screenshot' => 'required_if:transaction_type,deposit|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user(); // Get the authenticated user
        $balance = $user->balance; // Use the balance directly from the users table

        // Ensure withdrawal does not exceed the available balance
        if ($request->transaction_type === 'withdrawal' && $request->withdrawal_amount > $balance) {
            return redirect()->back()->withErrors([
                'withdrawal_amount' => 'The withdrawal amount exceeds your available balance.',
            ])->withInput();
        }

        $status = null; // Default to null
        if ($request->transaction_type === 'deposit') {
            $status = 'pending'; // Deposits are always pending
        } elseif ($request->transaction_type === 'withdrawal') {
            $status = $user->hasRole(['admin', 'manager']) ? 'success' : 'pending'; // Existing logic for withdrawals
        }
        // $transactionData['status'] = $status; // Assign status
        
        // Prepare the transaction data
        $transactionData = [
            'transaction_type' => $request->transaction_type,
            'user_id' => $user->id,
            'account_name' => $request->account_name ?? null,
            'agent_service' => $request->agent_service ?? null,
            'network_provider' => $request->network_provider ?? null,
            'account_number' => $request->account_number ?? null,
            'amount' => $request->transaction_type === 'deposit' ? $request->deposit_amount : $request->withdrawal_amount,
            'token_id' => $request->token_id ?? null,
            'secret_code' => $request->secret_code ?? null,
            'wallet_id' => $request->wallet_id ?? null,
            'status' => $status, // Add status to the transaction data
        ];

        // Handle screenshot upload for deposits
        if ($request->hasFile('screenshot')) {
            $transactionData['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }
        // dd($transactionData);
        // Save the transaction
        $transaction = Transaction::create($transactionData);

        // Update the user balance if necessary
        if ($request->transaction_type === 'withdrawal') {
            $user->decrementBalance($request->withdrawal_amount);
        }
        //  elseif ($request->transaction_type === 'deposit') {
        //     $user->incrementBalance($request->deposit_amount);
        // }

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully recorded!');
    } catch (Exception $e) {
        // Log the exception (optional)
        \Log::error('Transaction Error: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->withErrors(['error' => 'An error occurred while processing your transaction. Please try again.']);
    }
}

}
