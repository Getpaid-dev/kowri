<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('users', compact('users')); // Pass users to the view
    }

    // public function userDashboard()
    // {
       
    //     return view('userdashboard'); 
    // }
    
    public function updateBalance(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'balance' => 'required|numeric|min:0',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->balance = $request->balance;
        $user->save();

        return redirect()->back()->with('success', 'User balance updated successfully.');
    }

}
