@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create a New Campaign</h2>

    @guest
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 mb-6 rounded-lg">
            <p class="text-center">
                You are currently not logged in. <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Log in</a> or <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">register</a> to track your campaigns.
            </p>
        </div>
    @endguest

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-600 text-red-700 p-4 mb-6 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364a9 9 0 11-12.728 0M12 2v10m0 4h.01"></path>
                        </svg>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter campaign title" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Describe your campaign..." class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:outline-none" required></textarea>
        </div>

        <!-- Goal Amount -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Goal Amount</label>
            <input type="number" name="goal_amount" id="goal_amount" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Campaign Image -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Campaign Image</label>
            <input type="file" name="image" id="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:outline-none" accept="image/*">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-700 text-white font-semibold py-3 rounded-lg shadow-md hover:from-red-600 hover:to-red-800 transition duration-300">
            Create Campaign
        </button>
    </form>
</div>
@endsection
