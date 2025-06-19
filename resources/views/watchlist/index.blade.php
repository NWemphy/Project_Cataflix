{{-- index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-white">
    <h1 class="text-2xl font-bold mb-4">Watchlist Anda</h1>

    @if($watchlists->isEmpty())
        <p>Watchlist kosong.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($watchlists as $item)
                <div class="border border-gray-600 rounded p-4">
                    <h2 class="text-lg font-semibold">{{ $item->film->judul }}</h2>
                    <p>{{ Str::limit($item->film->deskripsi, 100) }}</p>

                    <form action="{{ route('watchlist.destroy', $item->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 px-3 py-1 rounded text-sm">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
