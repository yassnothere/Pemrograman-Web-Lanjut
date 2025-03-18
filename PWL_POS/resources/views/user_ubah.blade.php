<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Form Ubah Data User</h1>

    <form method="post" action="{{ url('/user/ubah_simpan/' . $user->user_id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Level ID</label>
            <input type="number" name="level_id" class="form-control" value="{{ $user->level_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url('/user') }}" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>
