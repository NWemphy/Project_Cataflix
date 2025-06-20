<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>{{ isset($film) ? 'Edit' : 'Tambah' }} Film - Cataflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #000; color: #fff; padding-top: 80px;">

    @include('layout.navbar')

    <div class="container mt-5">
        <h2 class="fw-bold mb-4 text-center">{{ isset($film) ? 'Edit' : 'Tambah' }} Film 🎬</h2>

        <div class="bg-dark p-4 rounded shadow-sm mx-auto" style="max-width: 700px;">
            <form action="{{ isset($film) ? route('films.update', $film->id) : route('films.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($film)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Film</label>
                    <input type="text" name="title" class="form-control bg-dark text-white border-secondary" required
                           value="{{ old('title', $film->title ?? '') }}">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tahun</label>
                        <input type="number" name="year" class="form-control bg-dark text-white border-secondary" required
                               value="{{ old('year', $film->year ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Durasi (menit)</label>
                        <input type="number" name="duration" class="form-control bg-dark text-white border-secondary"
                               value="{{ old('duration', $film->duration ?? '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Sutradara</label>
                    <input type="text" name="director" class="form-control bg-dark text-white border-secondary"
                           value="{{ old('director', $film->director ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="description" class="form-control bg-dark text-white border-secondary" rows="4">{{ old('description', $film->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Poster Film</label>
                    <input type="file" name="poster" class="form-control bg-dark text-white border-secondary">
                    @if (isset($film) && $film->poster)
                        <img src="{{ asset($film->poster) }}" alt="Poster Preview" class="mt-2 rounded" style="max-height: 300px;">
                    @endif
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('films.index') }}" class="btn btn-outline-light">← Kembali</a>
                    <button type="submit" class="btn btn-primary">{{ isset($film) ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
