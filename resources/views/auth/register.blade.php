@extends('layout.app')

@section('content')

<style>
    html, body {
        height: 100%;
        background-color: #000 !important;
        margin: 0;
        padding: 0;
    }

    .navbar-brand span {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .flix {
        color: #007bff;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: row;
        color: #fff;
    }

    .login-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding-left: 8%;
        padding-right: 5%;
    }

    .back-link {
        font-size: 1rem;
        color: #fff;
        text-decoration: none;
        position: absolute;
        top: 100px;
        left: 30px;
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

    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
        }

        .login-left {
            align-items: center;
            padding: 3rem 1rem;
        }

        .login-left-title {
            font-size: 3rem;
            text-align: center;
        }

        .back-link {
            position: static;
            margin-bottom: 1rem;
            align-self: flex-start;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #141414;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <span>Cata<span class="flix">flix</span></span>
        </a>
    </div>
</nav>

<!-- Back link -->
<a href="{{ url()->previous() }}" class="back-link">← Back</a>

<!-- Main Register Content -->
<div class="login-wrapper">
    <div class="login-left">
        <div class="login-left-title">
            Join<br>Cataflix<br>Now
        </div>
    </div>
    <div class="login-right">
        <div class="login-box">
            <h2 class="text-center mb-4"><strong>Cata</strong><span class="text-primary">flix</span></h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">DAFTAR</button>

                <p class="text-center text-white-50 mb-1">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>

@endsection
