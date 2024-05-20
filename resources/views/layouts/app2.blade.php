<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> SiTodo</title>
  <!-- Vite CSS -->
  @vite('resources/css/app.css')
</head>
<body>
  <nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <div class="flex-shrink-0">
          <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-800">SiTodo</a>
        </div>
        <div class="hidden md:block">
          <ul class="ml-4 flex items-center space-x-4">
            <!-- Opsi Login/Logout -->
            @guest
              <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a></li>
              <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a></li>
            @else
              <li class="relative">
                <button id="navbarDropdown" class="text-gray-600 hover:text-gray-800 focus:outline-none" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" x-cloak x-show="open">
                  <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </div>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
              </form>
            @endguest
          </ul>
        </div>
      </div>
    </div>
  </nav>
  `
  <!-- Ini adalah bagian content yang akan diisi oleh view yang menggunakan layout ini -->
  @yield('content')
</body>
</html>
