@extends('layout.app')

@section('content')
<div class="container">
    <h2>Hasil pencarian untuk: <strong>{{ $query }}</strong></h2>

    @if (empty($films))
        <p class="text-muted">Tidak ada film yang ditemukan.</p>
    @else
        <div class="row mt-4">
            @foreach ($films as $film)
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white">
                        <img src="{{ $film['poster'] }}" class="card-img-top" alt="{{ $film['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film['title'] }}</h5>
                            <p class="card-text">{{ $film['year'] }} | {{ $film['duration'] }}</p>
                            <p class="card-text"><small>Disutradarai oleh {{ $film['director'] }}</small></p>
                            <p class="card-text">{{ $film['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
