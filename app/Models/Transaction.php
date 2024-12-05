<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'agent_service',
        'network_provider',
        'account_number',
        'amount',
        'balance',
        'token_id',
        'secret_code',
        'wallet_id',
        'transaction_type',
        'user_id',
        'screenshot',
        'status', // Added screenshot to the fillable array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
