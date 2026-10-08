<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>

<body>

    <h1>Tambah Produk</h1>

    <a href="{{ route('products.index') }}">
        Kembali ke Data Produk
    </a>

    <br><br>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <label>Kode Produk</label>
        <br>
        <input type="text" name="kode">

        <br><br>

        <label>Nama Produk</label>
        <br>
        <input type="text" name="nama">

        <br><br>

        <label>Kategori</label>
        <br>

        <select name="category_id">

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach ($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->nama }}
                </option>

            @endforeach

        </select>

        <br><br>

        <label>Harga Beli</label>
        <br>
        <input type="number" name="harga_beli">

        <br><br>

        <label>Harga Jual</label>
        <br>
        <input type="number" name="harga_jual">

        <br><br>

        <label>Stok</label>
        <br>
        <input type="number" name="stok">

        <br><br>

        <button type="submit">
            Simpan Produk
        </button>

    </form>

</body>

</html>
