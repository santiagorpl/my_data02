<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
</head>
<body style="font-family: Arial; margin: 30px;">

    <h2>Data Produk</h2>

    <a href="{{ url('/') }}">Kembali ke Dashboard</a>

    <br><br>

    <a href="{{ route('products.create') }}">+ Tambah Produk</a>

    <br><br>

    @if(session('success'))
        <p style="color: blue;">{{ session('success') }}</p>
    @endif

    <!-- Pakai atribut border dan cellpadding bawaan HTML jadul -->
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr bgcolor="#dddddd">
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @forelse ($products as $product)
        <tr>
            <td align="center">{{ $product->id }}</td>
            <td>{{ $product->name ?? $product->nama ?? '-' }}</td>
            <td>{{ $product->category->nama ?? $product->category->name ?? '-' }}</td>
            <td>Rp {{ number_format($product->price ?? $product->harga ?? 0, 0, ',', '.') }}</td>
            <td align="center">{{ $product->stock ?? $product->stok ?? 0 }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                |
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" align="center">Belum ada data produk.</td>
        </tr>
        @endforelse
    </table>

</body>
</html>
