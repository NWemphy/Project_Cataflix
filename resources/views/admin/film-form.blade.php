@extends('layout.app')

@section('content')
    <style>
        body {
            background-color: #000 !important;
            color: #fff;
            padding-top: 80px;
        }

        .form-control,
        .form-select {
            background-color: #222 !important;
            color: #fff !important;
            border: 1px solid #444;
        }

        .form-label {
            font-weight: bold;
        }

        .form-section {
            background-color: #141414;
            padding: 30px;
            border-radius: 12px;
        }

        .poster-preview {
            max-height: 300px;
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>

    <div class="container mt-5">
        <h2 class="fw-bold mb-4 text-center">{{ isset($film) ? 'Edit' : 'Tambah' }} Film 🎬</h2>

        <div class="form-section mx-auto" style="max-width: 700px;">
            <form action="{{ isset($film) ? route('films.update', $film->id) : route('films.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($film))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="title" class="form-control" required
                        value="{{ old('title', $film->title ?? '') }}">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="year" class="form-control" required
                            value="{{ old('year', $film->year ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Durasi (menit)</label>
                        <input type="number" name="duration" class="form-control"
                            value="{{ old('duration', $film->duration ?? '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sutradara</label>
                    <input type="text" name="director" class="form-control"
                        value="{{ old('director', $film->director ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $film->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poster Film</label>
                    <input type="file" name="poster" class="form-control">
                    @if (isset($film) && $film->poster)
                    <img src="{{ asset($film->poster) }}"
                    alt="Poster Preview" class="poster-preview">
                    @endif
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('films.index') }}" class="btn btn-outline-light">← Kembali</a>
                    <button type="submit" class="btn btn-primary">{{ isset($film) ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection