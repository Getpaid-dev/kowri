<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="hidden lg:block font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
        </h2> -->
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight ">Welcome {{ auth()->user()->name }} 🎉</h2>
    </x-slot>

    <div class="lg:py-12 py-0">
        
        <div class="max-w-4xl mx-auto sm:px-6 lpx-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative h-32 lg:h-52 p-6 text-gray-900 bg-gradient-to-r from-lime-400 to-green-400"></div>
                <div class="absolute top-42 left-1/2 w-96 transform -translate-x-1/2 h-32 -translate-y-16 rounded-md shadow-sm bg-gray-100">
                    <h3 class="text-sm text-gray-700 font-semibold mt-16 ml-12">Total balance</h3>
                    <span class="ml-12">GHS <span class="text-2xl text-green-500">{{ number_format($balance, 2) }}</span></span>
                </div>

            </div>
            <!-- CTA -->
            <div class="relative">
                <div class="absolute flex justify-center items-center gap-10 lg:gap-20 top-72 left-1/2 transform -translate-x-1/2 h-32 -translate-y-52">
                    <a href="{{route('deposit')}}" class="py-4 px-8 text-white font-semibold rounded-md bg-orange-400">DepositToken</a>
                    <a href="{{route('withdraw')}}" class="py-4 px-8 text-white font-semibold rounded-md bg-green-500">Withdraw</a>
                </div>
            </div>

            <div class="relative bg-gray-200/35 w-96 lg:w-[800px] h-auto max-h-[500px] overflow-y-auto  top-42 left-1/2 transform -translate-x-1/2 translate-y-52 lg:translate-y-96 p-4 space-y-2">
                <span class="flex justify-between items-center space-y-1">
                    <h3 class="text-sm p-2 text-gray-600 font-semibold">Recent Transactions</h3>
                    <a
                        href="{{ route('transactions.index', ['show_all' => !$showAll]) }}"
                        class="text-sm p-2 text-green-500">
                        {{ $showAll ? 'Show Less' : 'See All' }}
                    </a>
                </span>

                @forelse ($transactions as $transaction)
                <div class="flex justify-between py-2 rounded-md border">
                    <div class="flex flex-col text-xs p-2">
                        <h3 class="text-sm">{{ ucfirst($transaction->transaction_type) }}</h3>
                        <p>{{ $transaction->created_at->format('d M Y | H:i') }}</p>
                        @if($transaction->network_provider)
                        <p>Network Provider: {{ $transaction->network_provider }}</p>
                        @endif
                    </div>
                    <div class="flex flex-col space-y-2 items-center">
                        <h3 class="text-sm pr-2 font-semibold">
                            <span class="text-xs">{{ $transaction->transaction_type == 'deposit' ? '+ GHS' : '- GHS' }}</span>
                            {{ number_format($transaction->amount, 2) }}
                        </h3>
                        <div>
                            @if($transaction->status === 'pending')
                            <span class="inline-flex items-center rounded-full bg-yellow-200/20 px-2 py-1 text-xs font-medium text-yellow-500 ring-1 ring-inset ring-yellow-400/20">
                                <div class="mt-1 flex items-center gap-x-1.5 pr-1">
                                    <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                        <div class="rounded-full h-1 w-1 bg-yellow-500"></div>
                                    </div>
                                </div>
                                Pending
                            </span>
                            @elseif($transaction->status === 'success')
                            <span class="inline-flex items-center rounded-full bg-green-200/20 px-2 py-1 text-xs font-medium text-green-500 ring-1 ring-inset ring-green-400/20">
                                <div class="mt-1 flex items-center gap-x-1.5 pr-1">
                                    <div class="flex-none rounded-full bg-green-500/20 p-1">
                                        <div class="rounded-full h-1 w-1 bg-green-500"></div>
                                    </div>
                                </div>
                                Success
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex justify-center items-center">
                    <span class="text-center py-4 text-gray-500">No recent transactions found.</span>
                </div>
                @endforelse



            </div>

        </div>
    </div>
</x-app-layout>