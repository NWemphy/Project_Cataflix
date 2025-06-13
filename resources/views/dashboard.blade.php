@extends('layout.app')

@section('content')
<div class="container-fluid bg-black text-white py-5 px-4" style="min-height: 100vh;">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white">Welcome to <span class="text-primary">Cataflix</span></h2>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-light">← Dashboard</a>
    </div>

    {{-- Grid Film --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($films as $id => $film)
            <div class="col">
                <div class="card bg-dark border-0 shadow-sm h-100">
                    <img src="{{ $film['poster'] }}" alt="{{ $film['title'] }}" class="card-img-top" style="height: 300px; object-fit: cover;">
                    <div class="card-body d-flex flex-column text-white">
                        <h5 class="fw-bold mb-1">{{ $film['title'] }}</h5>
                        <div class="mb-2 text-warning">
                            ★★★★☆ <span class="text-white ms-1 small">({{ rand(70, 95)/10 }}/10)</span>
                        </div>
                        <p class="small text-muted mb-1"><strong>Durasi:</strong> {{ $film['duration'] }}</p>
                        <p class="small text-muted mb-1"><strong>Genre:</strong> {{ $film['genre'] ?? 'Family' }}</p>
                        <a href="{{ route('film.detail', ['id' => $id]) }}" class="btn btn-outline-light btn-sm mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
