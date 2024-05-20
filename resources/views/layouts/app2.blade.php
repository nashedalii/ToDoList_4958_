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
</head>
<body class="flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-emerald-800 h-16 flex items-center justify-between px-4">
    <div></div> <!-- This div is used to push the user info to the right -->
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
            <span class="material-icons-outlined mr-3">settings</span>
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

  <script>
    // Tambahkan script JavaScript jika diperlukan
  </script>
</body>
</html>
