<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type');
            $table->unsignedBigInteger('user_id');
            $table->string('account_name')->nullable();
            $table->string('agent_service')->nullable();
            $table->string('network_provider')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('token_id')->nullable();
            $table->string('secret_code')->nullable();
            $table->string('wallet_id')->nullable();
            $table->string('screenshot')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
