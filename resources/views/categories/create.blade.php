<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
</head>

<body>

    <h1>Tambah Kategori</h1>

    <a href="{{ route('categories.index') }}">
        Kembali ke Kategori
    </a>

    <br><br>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <label>Nama Kategori</label>

        <br>

        <input type="text" name="nama">

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

</body>
</html>
