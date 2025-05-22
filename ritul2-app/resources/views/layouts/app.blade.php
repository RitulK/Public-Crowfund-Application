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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col justify-between">

            <!-- Navbar -->
            <nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center">
                <div class="text-2xl font-extrabold text-blue-600">Crowdfund</div>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('campaigns.index') }}" class="text-gray-700 hover:text-blue-600 transition">Browse Campaigns</a>
                    @auth
                        <a href="{{ route('campaigns.create') }}" class="text-gray-700 hover:text-blue-600 transition">Create Campaign</a>
                        <span class="text-gray-700">Welcome, {{ Auth::user()->name }}!</span>
                        <a href="{{ route('logout') }}" class="text-gray-700 hover:text-blue-600 transition"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 transition">Register</a>
                    @endauth
                </div>
                <button class="md:hidden text-gray-700 focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-gray-900 text-white py-8">
                <div class="text-center">
                    <p>© {{ now()->year }} Crowdfund. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
