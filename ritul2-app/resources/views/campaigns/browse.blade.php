@extends('layouts.app')

@section('title', 'Browse Campaigns')

@section('content')
<div class="max-w-7xl mx-auto mt-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Browse Campaigns</h1>

    <!-- Search Bar -->
    <form action="{{ route('campaigns.browse') }}" method="GET" class="mb-6">
        <div class="flex items-center">
            <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Search campaigns..." class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:ring focus:ring-blue-200 focus:outline-none">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-r-lg hover:bg-blue-700 transition">
                Search
            </button>
        </div>
    </form>

    <!-- Campaigns List -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @if(isset($campaigns) && count($campaigns) > 0)
            @foreach($campaigns as $campaign)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ $campaign->image && file_exists(public_path('storage/' . $campaign->image)) ? asset('storage/' . $campaign->image) : $campaign->image }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $campaign->title }}</h3>
                        <p class="text-gray-600">{{ Str::limit($campaign->description, 100) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-blue-600 font-semibold">${{ $campaign->amount_raised }} raised</span>
                            <a href="{{ route('campaigns.show', $campaign) }}" class="text-blue-500 hover:underline">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-600">No campaigns found.</p>
        @endif
    </div>
</div>
@endsection