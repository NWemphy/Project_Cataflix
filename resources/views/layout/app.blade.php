<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Cataflix')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    @if (Request::is('login'))
    <style>
        html, body {
            height: 100%;
            background-color: #000 !important;
            margin: 0;
            padding: 0;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
            color: #fff;
        }

        .login-left {
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-left: 8%;
            padding-right: 5%;
        }

        .back-link {
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
        }

        .login-left-title {
            font-size: 5rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000;
            padding: 2rem;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
        }

        .btn-login {
            background-color: #0056ff;
            color: #fff;
            letter-spacing: 2px;
        }

        .btn-login:hover {
            background-color: #0041c2;
        }

        .social-btns button {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }

            .login-left {
                align-items: center;
                padding: 3rem 1rem;
            }

            .back-link {
                position: absolute;
                top: 1rem;
                left: 1rem;
            }

            .login-left-title {
                font-size: 3rem;
                text-align: center;
            }

            .card-img-top {
                transition: transform 0.3s ease;
            }

            .card:hover .card-img-top {
                transform: scale(1.05);
            }
        }
    </style>
    @endif

    @stack('styles')
</head>
<body style="background-color: {{ Request::is('login') ? '#000' : '#f8f9fa' }}; margin: 0; padding: 0;">

    {{-- Navbar (hanya jika bukan halaman login) --}}
    @if (!Request::is('login'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Cataflix</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    {{-- Main Content --}}
    <main class="{{ Request::is('login') ? '' : 'py-4' }}">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
