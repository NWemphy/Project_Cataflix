@extends('layout.app')

@section('content')

<style>
    .navbar-brand span {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .flix {
        color: #007bff;
    }

    body {
        background-color: #000 !important;
        color: #fff;
        padding-top: 80px;
    }

    .search-form {
        width: 500px;
        max-width: 90vw;
    }

    .search-bar {
        width: 100%;
        max-width: none;
    }

    .card-img-top {
        height: 320px;
        object-fit: cover;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #141414;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <span>Cata<span class="flix">flix</span></span>
        </a>

        <!-- Search in navbar for large screens -->
        <form method="GET" action="{{ route('search') }}" class="form-inline mx-auto search-form d-none d-sm-block">
            <input name="query" type="search" class="form-control search-bar" placeholder="Search" />
        </form>

        <div class="ml-auto d-flex align-items-center gap-3">
            @auth
                <span class="me-2 d-none d-md-inline">Hi, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container-fluid bg-black text-white py-5 px-4" style="min-height: 100vh;">

    <!-- Title and Search -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-white">Welcome to <span class="text-primary">Cataflix</span></h2>

        <!-- Search in content for small screens -->
        <form method="GET" action="{{ route('search') }}" class="d-block d-sm-none mt-3">
            <div class="input-group mx-auto search-form">
                <input type="text" name="query" class="form-control" placeholder="Cari judul film..." />
                <div class="input-group-append">
                    <button class="btn btn-outline-light" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Grid Film -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($films as $id => $film)
            <div class="col">
                <div class="card bg-dark border-0 shadow-sm h-100">
                    <img src="{{ $film['poster'] }}" alt="{{ $film['title'] }}" class="card-img-top">
                    <div class="card-body text-white">
                        <h5 class="fw-bold mb-1">{{ $film['title'] }}</h5>
                        <div class="mb-2 text-warning">
                            ★★★★☆ <span class="text-white ms-1 small">({{ rand(70, 95)/10 }}/10)</span>
                        </div>
                        <p class="small text-muted mb-1"><strong>Durasi:</strong> {{ $film['duration'] }} menit</p>
                        <p class="small text-muted mb-2"><strong>Genre:</strong> {{ $film['genre'] ?? 'Family' }}</p>
                        <a href="{{ route('film.detail', ['id' => $id]) }}" class="btn btn-outline-light btn-sm w-100 mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection