<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-100/5">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kowri</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <header class="mb-8 ">
            <nav class="container max-w-6xl mx-auto flex justify-between items-center p-4">

                <!-- nav logo  -->
                <div>
                    <img class="w-[9rem] lg:w-32" src="https://www.kowri.app/wp-content/uploads/2022/06/KowriLogo.png" alt="logo">
                </div>

                <!-- nav list  -->
                <div class="hidden lg:flex">
                    <ul class="flex gap-20">
                        <li>
                            <a href="#">Personal</a>
                        </li>
                        <li>
                            <a href="#">Business</a>
                        </li>
                        <li>
                            <a href="#">Partnerships</a>
                        </li>
                    </ul>
                </div>

                <!-- hamburger  -->
                <div class="lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- button -->
                <div class="hidden lg:flex">
                    <a href="{{ route('register') }}" class="py-2 px-6 text-center text-white bg-gradient-to-r from-lime-400 to-green-500 rounded-md text-lg">Get Kowri</a>
                </div>

            </nav>

        </header>

        <!-- Hero  -->
        <section>
            <div class="relative">
                <img class="w-full lg:h-[600px] h-[450px] object-cover " src="https://www.kowri.app/wp-content/uploads/2022/06/4-copy.jpg" alt="hero-img">

                <!-- CTA  -->
                <span class="text-white lg:top-40 top-28 lg:left-[280px] left-[30px] text-wrap absolute space-y-2">
                    <h1 class="lg:text-6xl text-xl lg:font-bold  font-semibold">Increase your <br /> Business Revenue</h1>
                    <p class="tracking-wider text-md text-pretty max-w-60 lg:max-w-fit">Receive payments from all mobile money wallets and cards</p>
                    <div class="flex bg-limeGreen rounded-sm lg:font-semibold lg:py-2 font-normal lg:px-4 py-2 px-2 max-w-fit items-center">
                        <a href="" class=" lg:text-2xl text-md">Sign Up</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class=" size-6">
                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </div>
                </span>

                <!-- overlay  -->
                <span class=" absolute left-0 w-full h-20 lg:h-1.5  bg-zinc-950 bg-opacity-80 p-2 top-[82%] lg:top-[100%] "></span>

            </div>
        </section>
    </div>
    <main class="mt-32">
        <div class="container max-w-6xl mx-auto">

            <!-- Section 1: Promo Image & Title/Text -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:space-y-0 space-y-28">
                <!-- Promo Image Section -->
                <div class="flex justify-center lg:justify-start">
                    <img class="object-cover rounded-md w-[500px]" src="{{ Storage::url('public/images/xmas-ad.jpeg') }}" alt="xmasad-logo">
                </div>

                <!-- Text Section -->
                <div class="p-4 flex flex-col justify-center items-center lg:items-start">
                    <h2 class="font-bold text-4xl text-primary mb-4 text-center lg:text-left">Big Rewards Awaits You!</h2>
                    <p class="tracking-wider text-gray-800 mb-6 text-xl text-center lg:text-left">
                        <span class="font-bold bg-clip-text text-transparent bg-gradient-to-r from-lime-400 to-green-500 italic text-2xl">
                            DOUBLE YOUR SMALL TOKEN
                        </span>
                        with huge rewards, exclusive bonuses, and opportunities to grow like never before!
                        <br>
                        <span class="italic text-gray-500 mt-4">Ready to make your move?</span>
                    </p>
                    <a href="#" class="bg-gradient-to-r from-lime-400 to-green-500 px-6 py-2 text-white rounded-sm mt-4">Sign Up</a>
                </div>
            </div>

            <!-- Section 2: Secure Platform and Illustration -->
            <div class="mt-32 p-4 flex flex-col-reverse lg:flex-row gap-12 lg:space-x-12">
                <!-- Secure Platform Text Section -->
                <div class="flex flex-col justify-center items-center lg:items-start w-full lg:w-[850px]">
                    <h2 class="font-bold text-4xl text-primary mb-4 text-center lg:text-left">Secure Platform</h2>
                    <p class="tracking-wider text-gray-800 mb-6 text-xl text-center lg:text-left">
                        Licensed by the Bank of Ghana and PCI DSS certified, your business is assured of the safety of each transaction made via Kowri.
                    </p>
                </div>

                <!-- Illustration Section -->
                <div class="flex justify-center lg:justify-start w-full">
                    <img class="w-full max-w-md object-cover rounded-md" src="https://www.kowri.app/wp-content/uploads/2023/03/KP-Ilustrations-01.png" alt="illustration">
                </div>
            </div>


            <!-- Section 3: Feature Blocks (KB POS & QR Codes) -->
            <div class="mt-32 flex flex-col lg:flex-row justify-between items-center p-4">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- KB POS Section -->
                    <div class="flex flex-col lg:flex-row items-center gap-8 w-full">
                        <img class="w-32 h-32 object-cover rounded-md" src="https://www.kowri.app/wp-content/uploads/2022/06/POS.png" alt="KB POS">
                        <div class="flex flex-col w-full lg:w-[350px]">
                            <h2 class="text-2xl font-semibold text-center lg:text-left">KB POS</h2>
                            <p class="tracking-wider text-md text-gray-800 text-center lg:text-left">
                                Accept payments in person and on-the-go with Kowri Business POS.
                            </p>
                        </div>
                    </div>

                    <!-- QR Codes Section -->
                    <div class="flex flex-col lg:flex-row items-center gap-8 w-full">
                        <img class="w-32 h-32 object-cover rounded-md" src="https://www.kowri.app/wp-content/uploads/2022/06/QRcode-2.png" alt="QR Codes">
                        <div class="flex flex-col w-full lg:w-[500px]">
                            <h2 class="text-2xl font-semibold text-center lg:text-left">QR Codes</h2>
                            <p class="tracking-wider text-md text-gray-800 text-center lg:text-left">
                                Get your Kowri Business QRCode and start selling.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-limeGreen1 p-20 mt-6">
            <div class="text-center flex flex-col ">
                <h1 class="lg:text-4xl text-2xl lg:font-bold font-semibold text-nowrap">Get started with Kowri today</h1>
                <div class="flex flex-col lg:flex-row  justify-center items-center gap-6 mt-4 divide-y-3 divide-gray-300">
                    <span class="text-green-500 lg:text-lg text-sm py-2 px-4 bg-white rounded-md">Contact Sales</span>
                    <span class="hidden lg:block h-14 w-[1px] bg-gray-500"></span>
                    <span class="text-sm lg:text-lg py-2 px-6 bg-gradient-to-r from-lime-400 to-green-500 text-white rounded-md ">Collect with Kowri</span>
                </div>
            </div>
        </section>

    </main>

    <footer>
    <section class="bg-gray-200 mt-6 p-8">
        <div class="container mx-auto max-w-6xl text-wrap">
            <!-- Flex Container for Logo, Social Icons, and Links -->
            <div class="container mx-auto px-4 py-2 flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0 lg:space-x-12">
                <!-- Logo Section -->
                <div class="flex justify-center lg:justify-start w-full lg:w-auto">
                    <img class="w-[9rem] lg:w-28" src="https://www.kowri.app/wp-content/uploads/2022/06/KowriLogo.png" alt="logo">
                </div>
                
                <!-- Social Icons Section -->
                <div class="flex justify-center lg:justify-start w-full lg:w-auto">
                    <div>social icons</div>
                </div>

                <!-- Links Section -->
                <div class="">
                    <ul class="flex flex-wrap justify-center lg:justify-start space-x-4 text-gray-800">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Promos</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Marketplace</a></li>
                        <li><a href="#">Merchant API</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Bottom Section with Privacy and Legal Links -->
    <section class="lg:h-14 h-auto max-h-20 bg-zinc-800/30">
        <div class="container mx-auto px-4 py-2">
            <ul class="flex flex-wrap justify-center lg:justify-end space-x-4 text-zinc-600">
                <li><a href="#" class="text-right">Privacy Policy</a></li>
                <li><a href="#">Legal Disclaimer</a></li>
                <li><a href="#">SEVN Ghana Limited trades as Kowri</a></li>
            </ul>
        </div>
    </section>
</footer>


</body>

</html>