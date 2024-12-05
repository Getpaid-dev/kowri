<x-app-layout>
    <div class="relative isolate flex min-h-svh w-full max-lg:flex-col">
        <!-- sidebar -->
        <div class="fixed w-64 inset-y-auto left-0 max-lg:hidden ">
            <nav class="flex h-lvh min-h-0 flex-col ">

                <div class="flex flex-1 flex-col p-4 overflow-y-auto">
                    <div class="flex flex-col gap-0.5]">
                        <span class="relative">
                            <a href="/admin/dashboard"
                                class="flex w-full items-center gap-3 rounded-lg hover:bg-white/5 px-2 py-2.5 text-sm text-left ">
                                <span class="absolute inset-y-2 w-0.5 rounded-full bg-white -left-4 "></span>
                                <span
                                    class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)]  -translate-x-1/2 -translate-y-1/2"></span>
                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Home</span>
                            </a>
                        </span>
                        <span class="relative">
                            <a href="/users"
                                class="flex w-full items-center gap-3 rounded-lg hover:bg-white/5 px-2 py-2.5 text-sm text-left">
                                <span
                                    class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)]  -translate-x-1/2 -translate-y-1/2"></span>
                                <svg class="w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path
                                        d="M2 4.25A2.25 2.25 0 0 1 4.25 2h6.5A2.25 2.25 0 0 1 13 4.25V5.5H9.25A3.75 3.75 0 0 0 5.5 9.25V13H4.25A2.25 2.25 0 0 1 2 10.75v-6.5Z">
                                    </path>
                                    <path
                                        d="M9.25 7A2.25 2.25 0 0 0 7 9.25v6.5A2.25 2.25 0 0 0 9.25 18h6.5A2.25 2.25 0 0 0 18 15.75v-6.5A2.25 2.25 0 0 0 15.75 7h-6.5Z">
                                    </path>
                                </svg>
                                <span>Users</span>
                            </a>
                        </span>
                        <span class="relative">
                            <a href="/approvals"
                                class="flex w-full items-center gap-3 rounded-lg hover:bg-white/5 px-2 py-2.5 text-sm text-left">
                                <span
                                    class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)]  -translate-x-1/2 -translate-y-1/2"></span>
                                <svg class="w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path
                                        d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z">
                                    </path>
                                </svg>
                                <span>Approvals</span>
                            </a>
                        </span>
                        <span class="relative">
                            <a href="/alltransactions"
                                class="flex w-full items-center gap-3 rounded-lg hover:bg-white/5 px-2 py-2.5 text-sm text-left ">
                                <span
                                    class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)]  -translate-x-1/2 -translate-y-1/2"></span>
                                <svg class="w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M15.75 3A2.25 2.25 0 0 1 18 5.25v1.214c0 .423-.277.788-.633 1.019A2.997 2.997 0 0 0 16 10c0 1.055.544 1.982 1.367 2.517.356.231.633.596.633 1.02v1.213A2.25 2.25 0 0 1 15.75 17H4.25A2.25 2.25 0 0 1 2 14.75v-1.213c0-.424.277-.789.633-1.02A2.998 2.998 0 0 0 4 10a2.997 2.997 0 0 0-1.367-2.517C2.277 7.252 2 6.887 2 6.463V5.25A2.25 2.25 0 0 1 4.25 3h11.5ZM13.5 7.396a.75.75 0 0 0-1.5 0v1.042a.75.75 0 0 0 1.5 0V7.396Zm0 4.167a.75.75 0 0 0-1.5 0v1.041a.75.75 0 0 0 1.5 0v-1.041Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Transactions</span>
                            </a>
                        </span>

                        @can('view screenshots')

                        <span class="relative">
                            <a href="/transactions/screenshots"
                                class="flex w-full items-center gap-3 rounded-lg hover:bg-white/5 px-2 py-2.5 text-sm text-left ">
                                <span
                                    class="absolute top-1/2 left-1/2 size-[max(100%,2.75rem)]  -translate-x-1/2 -translate-y-1/2"></span>
                                <svg class="w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M15.75 3A2.25 2.25 0 0 1 18 5.25v1.214c0 .423-.277.788-.633 1.019A2.997 2.997 0 0 0 16 10c0 1.055.544 1.982 1.367 2.517.356.231.633.596.633 1.02v1.213A2.25 2.25 0 0 1 15.75 17H4.25A2.25 2.25 0 0 1 2 14.75v-1.213c0-.424.277-.789.633-1.02A2.998 2.998 0 0 0 4 10a2.997 2.997 0 0 0-1.367-2.517C2.277 7.252 2 6.887 2 6.463V5.25A2.25 2.25 0 0 1 4.25 3h11.5ZM13.5 7.396a.75.75 0 0 0-1.5 0v1.042a.75.75 0 0 0 1.5 0V7.396Zm0 4.167a.75.75 0 0 0-1.5 0v1.041a.75.75 0 0 0 1.5 0v-1.041Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Screenshots</span>
                            </a>
                        </span>
                        @endcan



                    </div>


                </div>

            </nav>
        </div>

        <main class="flex flex-1 flex-col pb-2 lg:pt-2 lg:pl-64 lg:min-w-0 lg:pr-2 text-gray-200">
            <div class="grow lg:p-10 p-6 bg-gray-900 lg:ring-white/10 lg:ring-1 shadow-sm lg:rounded-lg">
                <h1 class="text-2xl font-semibold mb-6">User Screenshots</h1>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse ($transactions as $transaction)
                    <div
                        class="relative bg-gray-800 rounded-lg overflow-hidden shadow-lg cursor-pointer"
                        onclick="showImage('{{ asset('storage/' . $transaction->screenshot) }}')">
                        <img
                            src="{{ asset('storage/' . $transaction->screenshot) }}"
                            alt="Screenshot for transaction {{ $transaction->id }}"
                            class="w-full h-48 object-cover">
                        <div class="p-4 text-gray-200">
                            <h3 class="text-lg font-semibold truncate">{{ $transaction->user->name }}</h3>
                            <p class="text-sm text-gray-400">
                                Transaction ID: {{ $transaction->id }}
                            </p>
                            <p class="text-sm text-gray-400">
                                Amount: GHS {{ number_format($transaction->amount, 2) }}
                            </p>
                            <p class="text-sm text-gray-400">
                                Uploaded: {{ $transaction->created_at->format('M d, Y | h:i A') }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-full text-center text-gray-500">No screenshots available.</p>
                    @endforelse
                </div>

                <!-- Full Image Display -->
                <div
                    id="fullscreenImage"
                    class="fixed inset-0 flex items-center justify-center bg-black/75 hidden z-50"
                    onclick="hideImage()">
                    <img
                        id="fullImageElement"
                        src=""
                        alt="Full Screenshot"
                        class="w-auto max-w-[90%] max-h-[80%] rounded-lg shadow-md"
                        onclick="event.stopPropagation()">
                </div>
            </div>
        </main>



    </div>
    <script>
        function showImage(imageUrl) {
            const fullscreenContainer = document.getElementById('fullscreenImage');
            const fullImageElement = document.getElementById('fullImageElement');
            fullImageElement.src = imageUrl;
            fullscreenContainer.classList.remove('hidden');
        }

        function hideImage() {
            const fullscreenContainer = document.getElementById('fullscreenImage');
            fullscreenContainer.classList.add('hidden');
        }
    </script>





</x-app-layout>