<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <a href="#" class="text-xl font-bold text-white shadow">Logo</a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex">
                            <a href="#" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Home</a>
                            <a href="#" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Sobre</a>
                            <a href="#" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Serviços</a>
                            <a href="#" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Contato</a>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:items-center">
                        <a href="/login" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Login</a>
                        <a href="/register" class="text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium shadow">Registrar</a>
                    </div>
                    <div class="-mr-2 flex sm:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500" id="mobile-menu-button" aria-expanded="false">
                            <span class="sr-only">Abrir menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="sm:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Home</a>
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Sobre</a>
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Serviços</a>
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Contato</a>
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Login</a>
                    <a href="#" class="text-white hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium shadow">Registrar</a>
                </div>
            </div>
        </nav>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <script>
            const button = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            button.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>
