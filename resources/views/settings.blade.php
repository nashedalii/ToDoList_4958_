@extends('layouts.app2')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Settings</h1>

    @if (session('success'))
        <div id="success-notification" class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Buttons to toggle profile picture and name -->
    <div class="flex space-x-4 mb-6">
        <button id="showProfileButton" class="bg-green-600 text-white py-2 px-4 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">
            Show Profile Info
        </button>
        <button id="editProfileButton" class="bg-green-600 text-white py-2 px-4 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">
            Edit Profile
        </button>
    </div>

    <!-- Profile Picture and Name Display -->
    <div id="profileInfo" style="display: none;">
        @if(Auth::user()->profile_picture)
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-24 h-24 rounded-full object-cover shadow-lg">
            </div>
        @endif
        <div class="text-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">{{ Auth::user()->name }}</h2>
        </div>
    </div>

    <!-- Form to update profile picture -->
    <form id="profilePictureForm" action="{{ route('settings.updateProfilePicture') }}" method="POST" enctype="multipart/form-data" class="mb-8" style="display: none;">
        @csrf
        <div class="mb-6">
            <label for="profile_picture" class="block text-lg font-medium text-gray-700 mb-2">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="mt-2 p-2 border rounded w-full">
            @error('profile_picture')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">
                Update Profile Picture
            </button>
        </div>
    </form>

    <!-- Form to update name -->
    <form id="nameForm" action="{{ route('settings.updateName') }}" method="POST" style="display: none;">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="mt-2 p-2 border rounded w-full">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">
                Update Name
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showProfileButton = document.getElementById('showProfileButton');
        var editProfileButton = document.getElementById('editProfileButton');
        var profileInfo = document.getElementById('profileInfo');
        var profilePictureForm = document.getElementById('profilePictureForm');
        var nameForm = document.getElementById('nameForm');

        showProfileButton.addEventListener('click', function() {
            profileInfo.style.display = 'block';
            profilePictureForm.style.display = 'none';
            nameForm.style.display = 'none';
        });

        editProfileButton.addEventListener('click', function() {
            profileInfo.style.display = 'none';
            profilePictureForm.style.display = 'block';
            nameForm.style.display = 'block';
        });
    });
</script>
@endsection
