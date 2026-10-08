<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Keuangan</title>
</head>

<body>

    <h1>Sistem Informasi Keuangan</h1>

    <h2>Dashboard</h2>

    <p>Selamat datang di Sistem Informasi Keuangan.</p>

    <hr>

    <h3>Manajemen Stok</h3>

    <ul>
        <li>
            <a href="/categories">Data Kategori</a>
        </li>

    <li>
    <a href="{{ route('products.index') }}">
        Data Produk
    </a>
</li>

        <li>
            <a href="{{ route('stock-outs.index') }}">
            Barang Keluar
            </a>
        </li>
        <li>
            <a href="{{ route('stock.history') }}">Riwayat Stok</a></li>
        </li>
    </ul>

</body>
</html>
