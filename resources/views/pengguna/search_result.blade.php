@extends('layouts.app') {{-- jika ada layout, atau gunakan HTML biasa --}}

@section('content')
<div class="container text-white">
    <h3>Hasil pencarian: "{{ $query }}"</h3>

    @if(count($results) > 0)
        <div class="row">
            @foreach($results as $film)
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white">
                        <img src="{{ $film['poster'] }}" class="card-img-top" alt="{{ $film['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film['title'] }}</h5>
                            <p class="card-text">{{ $film['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada film yang ditemukan.</p>
    @endif
</div>
@endsection
