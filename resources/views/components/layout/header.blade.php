<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
  </head>
<body class="font-sans antialiased bg-gray-200 dark:text-white/50">

  <header
        class="fixed top-0 left-0 w-full bg-transparent text-white transition-colors duration-300 z-50"
        :class="{ 'bg-black': scrolled }"
        x-data="{ scrolled: false, menuOpen: false }"
        @scroll.window="scrolled = (window.scrollY > 50)"
    >
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="text-lg font-bold">
                <a href="/" class="hover:text-gray-300">MyApp</a>
            </div>

            <!-- Botão de Toggle do Menu -->
            <button class="lg:hidden text-gray-300 focus:outline-none" @click="menuOpen = !menuOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Menu Responsivo -->
            <div x-show="menuOpen" class="absolute top-16 left-0 w-full bg-gray-800 lg:bg-transparent lg:w-auto lg:flex lg:space-x-6 lg:items-center">
                <nav class="lg:hidden lg:space-x-6 lg:items-center">
                    <a href="#home" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Home</a>
                    <a href="#about" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">About</a>
                    <a href="#services" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Services</a>
                    <a href="#contact" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Contact</a>
                </nav>
            </div>

            <!-- Menu Desktop -->
            <nav class="hidden lg:flex lg:space-x-6 lg:items-center">
                <a href="#home" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Home</a>
                <a href="#about" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">About</a>
                <a href="#services" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Services</a>
                <a href="#contact" class="block py-2 px-4 hover:bg-gray-700 lg:hover:bg-transparent lg:hover:text-gray-300">Contact</a>
            </nav>
        </div>
    </header>
