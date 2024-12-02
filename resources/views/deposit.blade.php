<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-32">
        <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 p-4">

                <!-- Hidden Input for Transaction Type -->
                <input type="hidden" name="transaction_type" value="deposit">
               
                <!-- Token ID -->
                <div>
                    <label for="token_id" class="block text-sm font-semibold text-gray-700">Token ID</label>
                    <input type="text" id="token_id" name="token_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Token ID" 
                        required minlength="12" maxlength="12">
                </div>

                <!-- Secret Code -->
                <div>
                    <label for="secret_code" class="block text-sm font-semibold text-gray-700">Secret Code</label>
                    <input type="password" id="secret_code" name="secret_code" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Secret Code" 
                        required minlength="4" maxlength="4">
                </div>

                <!-- Wallet ID -->
                <div>
                    <label for="wallet_id" class="block text-sm font-semibold text-gray-700">Wallet ID</label>
                    <input type="text" id="wallet_id" name="wallet_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Wallet ID" 
                        required pattern="^\d{10}$" title="Wallet ID must be exactly 10 digits.">
                </div>

                <!-- Withdrawal Amount -->
                <div>
                    <label for="deposit_amount" class="block text-sm font-semibold text-gray-700">Amount</label>
                    <select id="deposit_amount" name="deposit_amount" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                    </select>
                </div>

                <!-- Screenshot Upload -->
                <div>
                    <label for="screenshot" class="block text-sm font-semibold text-gray-700">Upload Screenshot</label>
                    <input type="file" id="screenshot" name="screenshot" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Claim Reward 🎉
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
