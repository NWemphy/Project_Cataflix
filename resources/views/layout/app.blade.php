<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cataflix</title>

    <style>
        /* Untuk transisi sidebar */
        #sidebar {
            transition: transform 0.3s ease;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;" class="relative">

    <!-- Toggle Button (Hamburger) -->
    <button id="sidebarToggle" class="position-absolute top-0 start-0 m-3 p-2 text-white bg-dark rounded d-lg-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-list" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z"/>
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 h-100 w-64 bg-black text-white transform -translate-x-full z-50">
        <div class="p-4 text-xl font-bold text-blue-400">Cataflix</div>
        <ul class="space-y-4 px-4 mt-4">
            <li><a href="{{ route('dashboard') }}" class="d-block text-white hover:text-blue-400">Beranda</a></li>
            <li><a href="#" class="d-block text-white hover:text-blue-400">History</a></li>
            <li><a href="#" class="d-block text-white hover:text-blue-400">Notification</a></li>
            <li><a href="#" class="d-block text-white hover:text-blue-400">Help Center</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-white p-0 m-0">Log Out</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Cataflix</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search dan Riwayat -->
    <div class="container mt-4">
        <form action="{{ route('search') }}" method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="keyword" class="form-control" placeholder="Cari film..." required>
            <button type="submit" class="btn btn-primary">🔍 Cari</button>
        </form>

        @auth
            <div>
                <h5>Riwayat Pencarian</h5>
                <ul>
                    @foreach(Auth::user()->searchHistories()->latest()->take(5)->get() as $history)
                        <li>{{ $history->keyword }}</li>
                    @endforeach
                </ul>
            </div>
        @endauth
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
