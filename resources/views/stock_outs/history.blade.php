<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Stok Keluar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        .card { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        a.btn { padding: 8px 12px; background: #007bff; color: #fff; text-decoration: none; border-radius: 3px; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h1>RIWAYAT STOK</h1>
    <a href="{{ route('home') }}" class="btn">&larr; Kembali ke Dashboard</a>
    <hr>

    <div class="card">
        <h3>Log Histori Transaksi Barang Keluar</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Keluar</th>
                    <th>Alasan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockOuts as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->product->nama ?? 'Produk Dihapus' }}</td>
                    <td><span style="color: red; font-weight: bold;">-{{ $item->jumlah }}</span></td>
                    <td>{{ $item->alasan }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada catatan riwayat stok.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
