@extends('layout.app')

@section('content')

<style>
    body {
        background-color: #000;
        color: #fff;
        padding-top: 80px;
    }

    .film-container {
        max-width: 960px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .film-poster {
        width: 100%;
        max-width: 400px;
        height: 600px;
        object-fit: cover;
        border-radius: 10px;
    }

    .film-info h2 {
        font-weight: bold;
    }

    .film-info p {
        margin-bottom: 8px;
    }

    .btn-back {
        margin-top: 20px;
    }
</style>

<div class="film-container">
    <div class="row">
        <!-- Poster -->
        <div class="col-md-5 text-center mb-4 mb-md-0">
            <img src="{{ asset($film['poster']) }}" alt="{{ $film['title'] }}" class="film-poster img-fluid shadow" />
        </div>

        <!-- Detail Info -->
        <div class="col-md-7 film-info">
            <h2 class="text-primary">{{ $film['title'] }}</h2>
            <p><strong>Tahun:</strong> {{ $film['year'] }}</p>
            <p><strong>Durasi:</strong> {{ $film['duration'] }} menit</p>
            <p><strong>Sutradara:</strong> {{ $film['director'] }}</p>

            <h5 class="mt-4 text-warning">Deskripsi</h5>
            <p>{{ $film['description'] }}</p>

            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm btn-back">← Kembali ke Dashboard</a>
        </div>
    </div>
</div>

@endsection