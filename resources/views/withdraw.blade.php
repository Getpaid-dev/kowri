<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-32">
        <!-- General Error Display -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded shadow mb-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Transaction Form -->
        <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 p-4">
                <!-- Transaction Type -->
                <input type="hidden" name="transaction_type" value="withdrawal">

                <!-- Account Name -->
                <div>
                    <label for="account_name" class="block text-sm font-semibold text-gray-700">Account Name</label>
                    <input type="text" id="account_name" name="account_name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Account Name" 
                        value="{{ old('account_name') }}" 
                        required>
                    @error('account_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agent Services -->
                <div>
                    <label for="agent_service" class="block text-sm font-semibold text-gray-700">Agent Services</label>
                    <select id="agent_service" name="agent_service" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                        <option value="" disabled selected>Select an agent service</option>
                        <option value="KOWRI OVA" {{ old('agent_service') == 'KOWRI OVA' ? 'selected' : '' }}>KOWRI OVA</option>
                        <option value="EXPRESS OVA" {{ old('agent_service') == 'EXPRESS OVA' ? 'selected' : '' }}>EXPRESS OVA</option>
                    </select>
                    @error('agent_service')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Network Provider -->
                <div>
                    <label for="network_provider" class="block text-sm font-semibold text-gray-700">Network Provider</label>
                    <select id="network_provider" name="network_provider" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        required>
                        <option value="" disabled selected>Select a network provider</option>
                        <option value="MTN" {{ old('network_provider') == 'MTN' ? 'selected' : '' }}>MTN</option>
                        <option value="Telecel" {{ old('network_provider') == 'Telecel' ? 'selected' : '' }}>Telecel</option>
                        <option value="AirtelTigo" {{ old('network_provider') == 'AirtelTigo' ? 'selected' : '' }}>AirtelTigo</option>
                    </select>
                    @error('network_provider')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Number -->
                <div>
                    <label for="account_number" class="block text-sm font-semibold text-gray-700">Account Number</label>
                    <input type="text" id="account_number" name="account_number" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Account Number" 
                        value="{{ old('account_number') }}" 
                        pattern="^\d{10}$" 
                        title="Account number must be exactly 10 digits" 
                        required>
                    @error('account_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Withdrawal Amount -->
                <div>
                    <label for="withdrawal_amount" class="block text-sm font-semibold text-gray-700">Withdrawal Amount</label>
                    <input type="number" id="withdrawal_amount" name="withdrawal_amount" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter Amount (min 2500)" 
                        min="2500" 
                        value="{{ old('withdrawal_amount') }}" 
                        required>
                    <!-- @error('withdrawal_amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror -->
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
