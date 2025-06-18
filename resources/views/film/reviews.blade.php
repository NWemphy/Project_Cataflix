@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Reviews for {{ $film->title }}</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form input review --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('film.reviews.store', $film->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (1–5)</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="">-- Pilih Rating --</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} ★</option>
                        @endfor
                    </select>
                    @error('rating')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Komentar</label>
                    <textarea name="content" id="content" rows="3" class="form-control" required>{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Review</button>
            </form>
        </div>
    </div>

    {{-- Daftar review --}}
    @forelse($film->reviews as $review)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="mb-0">{{ $review->user->name }}</h5>
                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>

                <p class="mt-2">
                    @for($i = 0; $i < $review->rating; $i++)
                        <span style="color: gold">★</span>
                    @endfor
                </p>

                <p>{{ $review->content }}</p>
            </div>
        </div>
    @empty
        <p>Belum ada review untuk film ini.</p>
    @endforelse

    <a href="{{ route('film.detail', $film->id) }}" class="btn btn-dark mt-4">← Kembali ke Film</a>
</div>
@endsection
