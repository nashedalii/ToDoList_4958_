<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SITODO</title>
  <!-- Import Google Fonts Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- Vite CSS -->
  @vite('resources/css/app.css')
  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- CSS jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    .sidebar {
      width: 250px;
      transition: width 0.3s;
      overflow: hidden;
    }
    .sidebar.collapsed {
      width: 60px;
    }
    .sidebar ul li a .material-icons-outlined {
      transition: transform 0.3s, opacity 0.3s;
    }
    .sidebar.collapsed ul li a .material-icons-outlined {
      transform: translateX(-100%);
      opacity: 0;
    }
    .sidebar ul li a span.text {
      transition: opacity 0.3s;
      white-space: nowrap;
    }
    .sidebar.collapsed ul li a span.text {
      opacity: 0;
    }
    .content {
      transition: margin-left 0.3s;
    }
    .content.collapsed {
      margin-left: 60px;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen font-poppins">
  <!-- Header -->
  <header class="bg-emerald-800 h-16 flex items-center justify-between px-4">
    <div class="flex items-center">
      <button id="toggle-sidebar" class="text-white mr-4">
        <span class="material-icons-outlined">menu</span>
      </button>
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
    <nav id="sidebar" class="sidebar bg-emerald-700 min-h-screen p-4 flex flex-col">
      <ul class="flex-grow">
        <li class="mb-4">
          <a href="{{ route('home') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">cabin</span>
            <span class="text">Home</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('box') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">inbox</span>
            <span class="text">Box</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('todo-list') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">check_circle</span>
            <span class="text">Todo-List</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('settings') }}" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800">
            <span class="material-icons-outlined mr-3">manage_accounts</span>
            <span class="text">Settings</span>
          </a>
        </li>
      </ul>
      <div>
        <a href="#" class="text-white flex items-center p-2 rounded-lg hover:bg-emerald-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="material-icons-outlined mr-3">logout</span>
          <span class="text">Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
          @csrf
        </form>
      </div>
    </nav>

    <!-- Main Content -->
    <div id="content" class="content flex-grow p-8">
      @yield('content')
    </div>
  </div>

  <!-- JS jQuery and jQuery UI -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- JS Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#toggle-sidebar').click(function() {
        $('#sidebar').toggleClass('collapsed');
        $('#content').toggleClass('collapsed');
      });
    });
  </script>
  @stack('scripts')
</body>
</html>
