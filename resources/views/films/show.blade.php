@auth
    @if (!$film->reviews->where('user_id', auth()->id())->count())
        <form action="{{ route('reviews.store', $film->id) }}" method="POST">
            @csrf
            <label>Rating:</label>
            <select name="rating" required>
                <option value="">Pilih</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>

            <label>Komentar:</label>
            <textarea name="comment" rows="3"></textarea>

            <button type="submit">Kirim Review</button>
        </form>
    @else
        <p>Kamu sudah mereview film ini.</p>
    @endif
@endauth

@auth
    @if (auth()->user()->watchlist->contains($film->id))
        <form method="POST" action="{{ route('watchlist.destroy', $film->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus dari Watchlist</button>
        </form>
    @else
        <form method="POST" action="{{ route('watchlist.store', $film->id) }}">
            @csrf
            <button type="submit">Tambah ke Watchlist</button>
        </form>
    @endif
@endauth
