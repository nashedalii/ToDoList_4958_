@extends('layouts.app2')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Settings</h1>

    @if (session('success'))
        <div id="success-notification" class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="profile_picture" class="block text-gray-700">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="mt-2 p-2 border rounded">
            @error('profile_picture')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @if(Auth::user()->profile_picture)
            <div class="mb-4">
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-24 h-24 rounded-full object-cover">
            </div>
        @endif
        <button type="submit" class="bg-emerald-700 text-white p-2 rounded">Update Profile Picture</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var notification = document.getElementById('success-notification');
        if (notification) {
            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
@endsection
