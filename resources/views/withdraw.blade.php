<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-32">
        <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 p-4">

                <!-- Hidden Input for Transaction Type -->
                <input type="hidden" name="transaction_type" value="withdrawal">

                <!-- Account Name -->
                <div>
                    <label for="account_name" class="block text-sm font-semibold text-gray-700">Account Name</label>
                    <input type="text" id="account_name" name="account_name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Account Name" 
                        required>
                </div>

                <!-- Agent Services -->
                <div>
                    <label for="agent_service" class="block text-sm font-semibold text-gray-700">Agent Services</label>
                    <select id="agent_service" name="agent_service" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                        <option value="KOWRI OVA">KOWRI OVA</option>
                        <option value="EXPRESS OVA">EXPRESS OVA</option>
                    </select>
                </div>

                <!-- Network Provider -->
                <div>
                    <label for="network_provider" class="block text-sm font-semibold text-gray-700">Network Provider</label>
                    <select id="network_provider" name="network_provider" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                        <option value="MTN">MTN</option>
                        <option value="Telecel">Telecel</option>
                        <option value="AirtelTigo">AirtelTigo</option>
                    </select>
                </div>

                <!-- Account Number -->
                <div>
                    <label for="account_number" class="block text-sm font-semibold text-gray-700">Account Number</label>
                    <input type="text" id="account_number" name="account_number" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Account Number" 
                        required 
                        pattern="^\d{10}$" 
                        title="Account number must be exactly 10 digits"  inputmode="numeric">
                </div>

                <!-- Deposit Amount (Minimum 2500) -->
                <div>
                    <label for="withdrawal_amount" class="block text-sm font-semibold text-gray-700">Amount</label>
                    <input type="number" id="withdrawal_amount" name="withdrawal_amount" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Amount" min="2500" required  inputmode="numeric">
                    <small class="text-red-500">Amount must be greater than or equal to 2500</small>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
