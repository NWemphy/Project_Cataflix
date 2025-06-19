@extends('layout.app')

@section('content')

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
        margin-bottom: 2rem;
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

        .login-left-title {
            font-size: 3rem;
            text-align: center;
        }

        .back-link {
            align-self: flex-start;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-left">
        <a href="{{ url()->previous() }}" class="back-link">← Back</a>
        <div class="login-left-title">
            Get<br>Started<br>Now
        </div>
    </div>
    <div class="login-right">
        <div class="login-box">
            <h2 class="text-center mb-4"><strong>Cata</strong><span class="text-primary">flix</span></h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">Email atau password salah.</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="text-white-50 small">Forget Password?</a>
                </div>
                <button type="submit" class="btn btn-login w-100 mb-3">LOGIN</button>
                <p class="text-center text-white-50 mb-1">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Daftar di sini</a>
                </p>                
                <p class="text-center text-white-50">Or sign up with</p>
                <div class="d-flex justify-content-center gap-3 social-btns">
                    <button type="button" class="btn btn-outline-light"><i class="bi bi-google"></i></button>
                    <button type="button" class="btn btn-outline-light"><i class="bi bi-facebook"></i></button>
                    <button type="button" class="btn btn-outline-light"><i class="bi bi-apple"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
