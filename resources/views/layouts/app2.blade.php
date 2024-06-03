<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiTodo</title>
  <!-- Import Google Fonts Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- Vite CSS -->
  @vite('resources/css/app.css')
  <!-- Tambahkan CSS Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Tambahkan CSS jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen font-poppins">
  <!-- Header -->
  <header class="bg-emerald-800 h-16 flex items-center justify-between px-4">
    <div>
      <a href="{{ url('/') }}" class="flex items-center">
        <img src="{{ asset('img/foto.png') }}" alt="Logo Aplikasi" class="h-8 mr-2">
        <span class="text-white font-semibold text-lg">SiToDo</span>
      </a>
    </div>
    <div class="flex items-center">
      <span class="text-white font-semibold mr-4">{{ Auth::user()->name }}</span>
      <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/userprofile.png') }}" class="w-12 h-12 rounded-full object-cover">
    </div>
  </header>

  <!-- Main Content Wrapper -->
  <div class="flex flex-grow">
    <!-- Sidebar -->
    <nav class="bg-emerald-700 w-64 min-h-screen p-4 flex flex-col">
      <ul class="flex-grow">
        <li class="mb-4">
          <a href="{{ route('home') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">cabin</span>
            Home
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('box') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">inbox</span>
            Box
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('todo-list') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">check_circle</span>
            Todo-List
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('settings') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">manage_accounts</span>
            Settings
          </a>
        </li>
      </ul>
      <div>
        <a href="#" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="material-icons-outlined mr-3">logout</span>
          Log Out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
          @csrf
        </form>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow p-8">
      @yield('content')
    </div>
  </div>

  <!-- Tambahkan JS jQuery dan jQuery UI -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Tambahkan JS Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  @stack('scripts')
</body>
</html>
