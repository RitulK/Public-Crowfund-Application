@extends('layouts.app')

@section('title', 'Home - Crowdfunding')

@section('content')

    <!-- Hero Section -->
    <div class="relative bg-red-900 text-white py-20 px-6 md:px-12 text-center">
    <h1 class="text-5xl font-extrabold leading-tight">Discover and Fund Amazing Projects</h1>
    <p class="text-lg mt-4">Join thousands of backers supporting innovative ideas.</p>
    <button class="mt-6 px-6 py-3 bg-yellow-400 text-blue-900 font-semibold rounded-lg shadow-md hover:bg-yellow-500 transition">
        Start a Campaign
    </button>
</div>

    <!-- Featured Campaigns -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
    @if(isset($campaigns) && count($campaigns) > 0)
        @foreach($campaigns as $campaign)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
            <img src="{{ $campaign->image && file_exists(public_path('storage/' . $campaign->image)) ? asset('storage/' . $campaign->image) : $campaign->image }}" class="w-full h-48 object-cover">
            <div class="p-4">
                    <h3 class="text-xl font-semibold">{{ $campaign->title }}</h3>
                    <p class="text-gray-600">{{ Str::limit($campaign->description, 100) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-blue-600 font-semibold">${{ $campaign->amount_raised }} raised</span>
                        <a href="#" class="text-blue-500 hover:underline">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-600">No campaigns found.</p>
    @endif
</div>

    <section class="py-16 bg-gray-100 text-center">
    <h2 class="text-3xl font-bold">What Our Backers Say</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-600 italic">"This platform is worth investing!"</p>
            <h4 class="font-bold mt-2">- Anupam Mittal</h4>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-600 italic">"Easy to use, and I found amazing campaigns to support!"</p>
            <h4 class="font-bold mt-2">- Azim Premji</h4>
        </div>
    </div>
</section>

@endsection
