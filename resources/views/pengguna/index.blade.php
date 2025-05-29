<!-- resources/views/pengguna/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('pengguna.create') }}">+ Tambah Pengguna</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penggunas as $pengguna)
                <tr>
                    <td>{{ $pengguna->name }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{{ $pengguna->role }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $pengguna->id) }}">Edit</a>
                        <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
