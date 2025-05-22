@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w bg-yellow-500 text-black font-semibold py-2 px-4 text-center rounded-lg shadow-md hover:bg-yellow-600 transition block">Login</button>
        </div>
    </form>

    <!-- Additional Links -->
    <p class="text-center text-gray-600 mt-4">
        Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>
    <p class="text-center text-gray-600 mt-2">
        Forgot your password? <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Reset it</a>
    </p>
</div>
@endsection