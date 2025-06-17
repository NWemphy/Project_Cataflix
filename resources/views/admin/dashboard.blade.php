@extends('layout.app')

@section('content')
<div class="container mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>

    @foreach ($films as $id => $film)
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $film['poster'] }}" class="img-fluid rounded-start" alt="{{ $film['title'] }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $film['title'] }} ({{ $film['year'] }})</h2>
                        <p><strong>Durasi:</strong> {{ $film['duration'] }}</p>
                        <p><strong>Sutradara:</strong> {{ $film['director'] }}</p>
                        <p>{{ $film['description'] }}</p>
                        <a href="{{ route('film.detail', ['id' => $id]) }}" class="btn btn-primary mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
