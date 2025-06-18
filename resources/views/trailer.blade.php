@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center text-dark">Watch Trailer: {{ $film->judul }}</h2>

    <div class="ratio ratio-16x9 mb-3">
        <video autoplay controls>
            <source src="{{ asset('video/' . $film->trailer) }}" type="video/mp4">
            Browser tidak mendukung pemutaran video.
        </video>
    </div>

    <div class="text-center">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
