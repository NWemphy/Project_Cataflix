<h2>Watchlist Saya</h2>
<ul>
    @foreach ($films as $film)
        <li>
            <a href="{{ route('film.show', $film->id) }}">{{ $film->title }}</a>

            <form action="{{ route('watchlist.destroy', $film->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
