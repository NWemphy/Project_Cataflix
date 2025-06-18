@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Hasil Pencarian: "{{ $keyword }}"</h2>

    @if($films->isEmpty())
        <div class="alert alert-warning">
            Tidak ada film yang ditemukan dengan kata kunci tersebut.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($films as $film)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top" alt="{{ $film->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->title }}</h5>
                            <p class="card-text">{{ Str::limit($film->description, 100) }}</p>
                            <a href="{{ route('film.detail', ['id' => $film->id]) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
