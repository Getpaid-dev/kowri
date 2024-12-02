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

            // Prepare data dynamically based on the form type
            $transactionData = [
                'transaction_type' => $request->transaction_type,
                'user_id' => Auth::id(),
                'account_name' => $request->transaction_type === 'withdrawal' ? $request->account_name : null,
                'agent_service' => $request->transaction_type === 'withdrawal' ? $request->agent_service : null,
                'network_provider' => $request->transaction_type === 'withdrawal' ? $request->network_provider : null,
                'account_number' => $request->transaction_type === 'withdrawal' ? $request->account_number : null,
                'amount' => $request->transaction_type === 'deposit' ? $request->deposit_amount : $request->withdrawal_amount,
                'token_id' => $request->transaction_type === 'deposit' ? $request->token_id : null,
                'secret_code' => $request->transaction_type === 'deposit' ? $request->secret_code : null,
                'wallet_id' => $request->transaction_type === 'deposit' ? $request->wallet_id : null,
            ];

            // Handle screenshot upload
            if ($request->hasFile('screenshot')) {
                $transactionData['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
            }

            // Debugging: Dump the transaction data and stop execution
            // dd($transactionData);

            // Save transaction
            Transaction::create($transactionData);

            return redirect()->route('transactions.index')->with('success', 'Transaction successfully recorded!');
        } catch (Exception $e) {
            // Debugging: Dump the exception and stop execution
            // dd($e);

            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing your transaction. Please try again.']);
        }
    }
}
