@extends('layout.app')

@section('content')
<div class="col-md-8 offset-md-2 text-center">
            @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-warning">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
        </div>

<div class="film-container">
    <div class="row">
        
                

        <!-- Poster -->
        <div class="col-md-5 text-center mb-4 mb-md-0">
            <img src="{{ asset($film->poster) }}" alt="{{ $film->title }}" class="film-poster img-fluid shadow" />
        </div>

        <!-- Detail Info -->
        <div class="col-md-7 film-info">
            <h2 class="text-primary">{{ $film->title }}</h2>
            <p><strong>Tahun:</strong> {{ $film->year }}</p>
            <p><strong>Durasi:</strong> {{ $film->duration }} menit</p>
            <p><strong>Sutradara:</strong> {{ $film->director }}</p>

            <h5 class="mt-4 text-warning">Deskripsi</h5>
            <p>{{ $film->description }}</p>

            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm btn-back">← Kembali ke Dashboard</a>

            <form action="{{ route('watchlist.toggle', $film->id) }}" method="POST" style="display:inline;">
                @csrf
                @php
                $inWatchlist = isset($inWatchlist) ? $inWatchlist : false;
                @endphp

                <button type="submit" class="btn btn-back btn-sm {{ $inWatchlist ? 'btn-danger' : 'btn-success' }}">
                    {{ $inWatchlist ? 'Hapus dari Watchlist' : 'Tambahkan ke Watchlist' }}
                </button>

            </form>


        </div>
    </div>

    <!-- Form Review -->
    <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h4 class="mb-3 text-success">Beri Penilaian untuk Film Ini</h4>

                
            

            <!-- Form Review -->
            <form action="{{ route('review.submit', $film->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (1-5)</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="">Pilih rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="review" class="form-label">Komentar</label>
                    <textarea name="content" id="content" class="form-control" rows="4" required>{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">*Rating hanya bisa diberikan 1 kali</label>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Review</button>
            </form>
        </div>
    </div>
</div>

@endsection