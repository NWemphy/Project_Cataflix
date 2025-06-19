<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom border-secondary">
    <style>
        .navbar-brand span {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .flix {
            color: #007bff;
        }

        .nav-link {
            color: #fff !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #007bff !important;
        }

        .btn-logout {
            padding: 4px 10px;
        }
    </style>

    <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('films.index') }}">
            <span>Cata<span class="flix">flix</span></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.index') }}">📁 Semua Film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.create') }}">➕ Tambah</a>
                </li>

                @auth
                    <li class="nav-item">
                        <span class="nav-link disabled">👤 {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger btn-logout">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
