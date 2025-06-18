@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $film['title'] }}</h2>
    <img src="{{ $film['poster'] }}" alt="{{ $film['title'] }}" class="img-fluid mb-3" />
    <p><strong>Tahun:</strong> {{ $film['year'] }}</p>
    <p><strong>Durasi:</strong> {{ $film['duration'] }}</p>
    <p><strong>Sutradara:</strong> {{ $film['director'] }}</p>
    <p>{{ $film['description'] }}</p>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">← Kembali ke Dashboard</a>
</div>
@endsection
