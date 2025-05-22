@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
    <!-- Campaign Image -->
    <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : 'default-image-path.jpg' }}" alt="{{ $campaign->title }}" class="w h-64 object-cover rounded-lg mb-6">

    <!-- Campaign Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $campaign->title }}</h1>

    <!-- Campaign Description -->
    <p class="text-gray-700 mb-6">{{ $campaign->description }}</p>

    <!-- Amount Raised -->
    <p class="text-blue-600 font-semibold mb-6">${{ $campaign->amount_raised }} raised</p>

    <!-- Contribute Form -->
    <form action="{{ route('campaigns.contribute', $campaign->id) }}" method="POST" class="mb-6">
        @csrf
        <div class="flex items-center space-x-2">
            <input type="number" name="amount" placeholder="Enter amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
            <button type="submit" class="w bg-yellow-500 text-black font-semibold py-2 px-4 text-center rounded-lg shadow-md hover:bg-yellow-600 transition block">Contribute</button>
        </div>
    </form>

    <!-- Buttons -->
    <div class="space-y-4">
        <!-- Edit Button -->
        @auth
        <a href="{{ route('campaigns.edit', $campaign->id) }}" 
           class="w bg-yellow-500 text-black font-semibold py-2 px-4 text-center rounded-lg shadow-md hover:bg-yellow-600 transition block">
           Edit
        </a>
        @else
        <p class="text-gray-600 italic">You must <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to edit this campaign.</p>
        @endauth

        <!-- Delete Button -->
        @auth
        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this campaign?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="w bg-yellow-500 text-black font-semibold py-2 px-4 text-center rounded-lg shadow-md hover:bg-yellow-600 transition block">Delete</button>
        </form>
        @else
        <p class="text-gray-600 italic">You must <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to delete this campaign.</p>
        @endauth
    </div>
</div>
@endsection