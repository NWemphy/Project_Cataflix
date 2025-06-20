<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Manajemen Film - Cataflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #000; color: #fff; padding-top: 80px;">

    @include('layout.navbar')

    <div class="container-fluid py-5 px-4" style="min-height: 100vh;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-white">🎬 Manajemen <span class="text-primary">Film</span></h2>
            <a href="{{ route('films.create') }}" class="btn btn-outline-light mt-3">+ Tambah Film</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (count($films))
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($films as $film)
                    <div class="col">
                        <div class="card bg-dark border-0 shadow-sm h-100">
                            <img src="{{ asset($film->poster) }}" alt="{{ $film->title }}">
                            <div class="card-body text-white">
                                <h5 class="fw-bold mb-1">{{ $film->title }}</h5>
                                <p class="small text-muted mb-1"><strong>Tahun:</strong> {{ $film->year }}</p>
                                <p class="small text-muted mb-1"><strong>Durasi:</strong> {{ $film->duration }} menit</p>
                                <p class="small text-muted mb-1"><strong>Sutradara:</strong> {{ $film->director }}</p>

                                <div class="film-actions d-flex justify-content-between mt-3">
                                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-sm btn-outline-info w-50 me-1">Edit</a>
                                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="w-50 ms-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Yakin ingin hapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted mt-5">Belum ada film tersedia.</div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
