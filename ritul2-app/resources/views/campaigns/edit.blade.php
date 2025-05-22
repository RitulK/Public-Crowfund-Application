<!-- filepath: c:\laravelproject1\ritul2-app\ritul2-app\resources\views\campaigns\edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Campaign')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Campaign</h1>

    @auth
    <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Title -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ $campaign->title }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>{{ $campaign->description }}</textarea>
        </div>

        <!-- Goal Amount -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Goal Amount</label>
            <input type="number" name="goal_amount" value="{{ $campaign->goal_amount }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none" required>
        </div>

        <!-- Image -->
        <div>
            <label class="block text-lg font-semibold text-gray-700 mb-2">Campaign Image</label>
            <input type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Update Campaign</button>
    </form>
    @else
    <p class="text-gray-600 italic">You must <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to edit this campaign.</p>
    @endauth
</div>
@endsection