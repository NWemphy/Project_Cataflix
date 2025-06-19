{{-- show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-white">

    {{-- Detail Film --}}
    <div class="mb-4">
        <h1 class="text-2xl font-bold">{{ $film->judul }}</h1>
        <p>{{ $film->deskripsi }}</p>
        <p><strong>Durasi:</strong> {{ $film->durasi }} menit</p>
        <p><strong>Genre:</strong> {{ $film->genre }}</p>
    </div>

    {{-- Tombol Watchlist --}}
    @auth
        @php
            $inWatchlist = $film->watchlists->contains('user_id', auth()->id());
        @endphp

        <form method="POST" action="{{ $inWatchlist 
            ? route('watchlist.destroy', $film->watchlists->firstWhere('user_id', auth()->id())->id) 
            : route('watchlist.store', $film->id) }}">
            @csrf
            @if($inWatchlist)
                @method('DELETE')
                <button class="bg-red-600 px-3 py-1 rounded">Hapus dari Watchlist</button>
            @else
                <button class="bg-blue-600 px-3 py-1 rounded">Tambah ke Watchlist</button>
            @endif
        </form>
    @endauth

    {{-- Form Review --}}
    <div class="mt-6">
        <h2 class="text-xl font-semibold">Ulasan Anda</h2>

        @auth
            @php
                $userReview = $film->reviews->firstWhere('user_id', auth()->id());
            @endphp

            @if(!$userReview)
                <form method="POST" action="{{ route('reviews.store', $film->id) }}">
                    @csrf
                    <div class="mb-2">
                        <label>Rating (1–10)</label>
                        <input type="number" name="rating" class="w-full text-black" min="1" max="10" required>
                    </div>
                    <div class="mb-2">
                        <label>Komentar</label>
                        <textarea name="comment" class="w-full text-black" rows="3" required></textarea>
                    </div>
                    <button class="bg-green-600 px-3 py-1 rounded">Kirim Review</button>
                </form>
            @else
                <div class="mt-2">
                    <p><strong>Rating Anda:</strong> {{ $userReview->rating }}</p>
                    <p><strong>Komentar:</strong> {{ $userReview->comment }}</p>

                    <form action="{{ route('reviews.destroy', $userReview->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 px-2 py-1 text-sm rounded">Hapus Review</button>
                    </form>
                </div>
            @endif
        @else
            <p>Login untuk memberikan review.</p>
        @endauth
    </div>

    {{-- Semua Review --}}
    <div class="mt-6">
        <h2 class="text-xl font-semibold">Review Lainnya</h2>
        @forelse ($film->reviews as $review)
            <div class="border-t border-gray-600 mt-2 pt-2">
                <p><strong>{{ $review->user->name }}</strong> – Rating: {{ $review->rating }}</p>
                <p>{{ $review->comment }}</p>
            </div>
        @empty
            <p>Belum ada review.</p>
        @endforelse
    </div>

</div>
@endsection
