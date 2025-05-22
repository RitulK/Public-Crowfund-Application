@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
    </div>
    <div>
        <button type="submit">Update Profile</button>
    </div>
</form>

<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Account</button>
</form>
@endsection
