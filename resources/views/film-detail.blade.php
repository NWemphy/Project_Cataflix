@extends('layout.app')

@section('content')
<div class="container mt-4">

    {{-- Bagian atas: gambar besar + trailer --}}
    <div class="row">
        <div class="col-md-8">
            <img src="{{ $film->poster }}" alt="{{ $film->title }}" class="img-fluid rounded shadow-sm" />
        </div>
        <div class="col-md-4">
            <h2 class="mb-3">{{ $film->title }}</h2>

            {{-- Rating --}}
            <p>
                @for($i = 0; $i < floor($film->rating); $i++)
                    <span style="color: gold">★</span>
                @endfor
                <span class="text-muted">{{ number_format($film->rating, 1) }}/10</span>
            </p>

            {{-- Tombol Add to Watchlist --}}
            <button class="btn btn-outline-light btn-sm mb-2">+ Add to Watchlist</button>

            {{-- Tombol Review --}}
            <a href="/film/{{ $film->id }}/reviews" class="btn btn-warning">Review</a>

            {{-- Tombol Trailer --}}
            <a href="{{ route('film.trailer', $film->id) }}" class="btn btn-danger btn-sm mb-2">▶ Watch Trailer</a>

            {{-- Informasi tambahan --}}
            <p class="mt-3"><strong>Genre:</strong> {{ $film->genre ?? 'N/A' }}</p>
            <p><strong>Tahun:</strong> {{ $film->year }}</p>
            <p><strong>Durasi:</strong> {{ $film->duration }}</p>
            <p><strong>Sutradara:</strong> {{ $film->director }}</p>
        </div>
    </div>

    {{-- Sinopsis --}}
    <div class="mt-4">
        <h4>Synopsis</h4>
        <p>{{ $film->description }}</p>
    </div>

    {{-- Tombol kembali --}}
    <a href="{{ route('dashboard') }}" class="btn btn-dark mt-4">← Kembali ke Dashboard</a>

</div>
@endsection
