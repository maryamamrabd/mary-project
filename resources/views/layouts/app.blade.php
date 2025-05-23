<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Optics App')</title>
    <!-- Include CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
<nav class="bg-gray-100 fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/image/mh-optics.png" class="h-8" alt="Logo Optics">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">MH Optics</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-4">
            <a href="{{ route('cart.index') }}"
                class="text-gray-600 items-center flex gap-4 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center relative">
                <span>Panier</span>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    <!-- Badge showing number of items in cart -->
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-medium rounded-full h-5 w-5 flex items-center justify-center">
                        {{ \Gloudemans\Shoppingcart\Facades\Cart::count() }}
                    </span>
                </div>
            </a>
            @if (auth()->user())
         <div class="flex items-center gap-4 flex-wrap">
                <!-- User Button with Dropdown -->
                <button type="button" data-dropdown-toggle="language-dropdown-menu"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 dark:text-white bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 me-2 rounded-full" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                    <span class="truncate max-w-[150px]">{{ auth()->user()->full_name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ms-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Logout Link -->
                <a href="{{ route('logout') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-lg transition-colors dark:text-red-400 dark:hover:bg-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>
                    <span>Déconnexion</span>
                </a>
            </div>
            @else
                <a href="{{ route("login") }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Rejoignez-nous
                </a>

            @endif
            <a href="/menu" data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Ouvrir le menu principal</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </a>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
         <ul
            class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
            <li>
                <a href="{{ route('home') }}"
                    class="block py-2 px-3 rounded-sm md:p-0
                   {{ request()->is('/') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700' }}">
                    Accueil
                </a>
            </li>

            <li>
                <a href="{{ route('appointments.index') }}"
                    class="block py-2 px-3 rounded-sm md:p-0
                   {{ request()->routeIs('appointments.index') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700' }}">
                    Rendez-vous
                </a>
            </li>

            <li>
                <a href="{{ route('category.index') }}"
                    class="block py-2 px-3 rounded-sm md:p-0
                   {{ request()->routeIs('category.index') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700' }}">
                    Catégories
                </a>
            </li>

            <li>
                <a href="{{ route('contact.create') }}"
                    class="block py-2 px-3 rounded-sm md:p-0
                   {{ request()->routeIs('contact.create') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700' }}">
                    Contact
                </a>
            </li>
        </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    <!-- Pied de page -->
    <footer class="bg-white rounded-lg shadow-sm m-4 border border-gray-300">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-md text-gray-500 sm:text-center dark:text-gray-400">&copy; {{ date('Y') }}
                <a href="/" class="hover:underline">Optics App™</a>. Tous droits réservés.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="/" class="hover:underline me-4 md:me-6">Accueil</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">À propos</a>
                </li>
                <li>
                    <a href="/contact" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
