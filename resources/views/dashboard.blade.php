<x-app-layout>
    <x-slot name="header">
        <h2 class="hidden lg:block font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard 🎉') }}
        </h2>
        <h2 class="lg:hidden font-semibold text-xl text-gray-800 leading-tight ">Welcome {{ auth()->user()->name }} 🎉</h2>
    </x-slot>

    <div class="lg:py-12 py-0">
        <div class="max-w-4xl mx-auto sm:px-6 lpx-8 ">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative h-32 lg:h-52 p-6 text-gray-900 bg-gradient-to-r from-lime-400 to-green-400"></div>
                <div class="absolute top-42 left-1/2 w-96 transform -translate-x-1/2 h-32 -translate-y-16 rounded-md shadow-sm bg-gray-100">
                   <h3 class="text-sm text-gray-700 font-semibold mt-16 ml-12">Total balance</h3>
                   <span class="ml-12">GHS <span class="text-2xl text-green-500">2,500.00</span></span>
                </div>
                
            </div>
            <!-- CTA -->
            <div class="relative ">
                   <div class="absolute flex justify-center items-center gap-10 lg:gap-20 top-72 left-1/2  transform -translate-x-1/2 h-32 -translate-y-52">
                     <a href="{{route('deposit')}}" class="py-4 px-8 text-white font-semibold rounded-md bg-orange-400">DepositToken</a>
                     <a href="{{route('withdraw')}}" class="py-4 px-8 text-white font-semibold rounded-md bg-green-500">Withdraw</a>
                   </div>
            </div>
            

            <div class="relative  bg-gray-200/35 w-96 lg:w-[800px]  h-96 top-42 left-1/2  transform -translate-x-1/2  translate-y-52 lg:translate-y-96 p-4 space-y-2">
                <span class="flex justify-between items-center space-y-1">
                    <h3 class="text-sm p-2 text-gray-600 font-semibold">Recent Transactions</h3>
                    <h3 class="text-sm p-2 text-green-500">See all</h3>
                </span>
                
                   <div class="flex justify-between py-2 rounded-md border">
                       <div class="flex flex-col text-xs p-2 ">
                           <h3 class="text-sm">Deposit</h3>
                           <p>30 Nov 2024 | 04:28</p>
                           <p>Network Provider: MTN</p>
                       </div>
                       <h3 class="text-sm pr-2 text-green-500 font-semibold ">
                           <span class="text-xs">+ GHS </span>500.00
                       </h3>
                   </div>
                  
                <div class=" space-y-4 ">
                    <div class="flex justify-between py-2 rounded-md border">
                        <div class="flex flex-col text-xs p-2 ">
                            <h3 class="text-sm">Withdrawal</h3>
                            <p>30 Nov 2024 | 04:40</p>
                            <p>Network Provider: Telecel</p>
                        </div>
                        <h3 class="text-sm pr-2 text-red-500 font-semibold">
                            <span class="text-xs">- GHS </span>2,500.00
                        </h3>
                    </div>
                  
                </div>
                <div class="flex justify-between py-2 rounded-md border">
                       <div class="flex flex-col text-xs p-2 ">
                           <h3 class="text-sm">Deposit</h3>
                           <p>30 Nov 2024 | 04:50</p>
                           <p>Network Provider: MTN</p>
                       </div>
                       <h3 class="text-sm pr-2 text-green-500 font-semibold ">
                           <span class="text-xs">+ GHS </span>500.00
                       </h3>
                   </div>
            </div>

           </div>

        </div>
    </div>
</x-app-layout>
