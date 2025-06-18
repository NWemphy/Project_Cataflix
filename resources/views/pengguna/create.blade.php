<!-- resources/views/create.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title> Tambah Pengguna</title>
</head>

<body>
    <h1>Tambah Pengguna</h1>
    
    <!-- Tampilkan error validasi jika ada -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pengguna.store') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="name"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <label>Role:</label><br>
        <input type="text" name="role"><br><br>

        <label>Avatar (URL):</label><br>
        <input type="text" name="avatar"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br><a href="{{ route('pengguna.index') }}">Kembali </a>
</body>

</html>