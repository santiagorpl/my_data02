<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barang Keluar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        .card { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #f2f3f2; color: #0732f0; border: none; cursor: pointer; border-radius: 3px; }
        button:hover { background: #f2f2f2; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #dddddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        .alert-success { color: rgb(233, 240, 233); margin-bottom: 15px; }
        .alert-danger { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h1>BARANG KELUAR</h1>
    <a href="{{ url('/') }}">&larr; Kembali ke Dashboard</a>
    <hr>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Barang Keluar -->
    <div class="card">
        <h3>Tambah Barang Keluar</h3>
        <form action="{{ route('stock-outs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Pilih Produk:</label>
                <select name="product_id" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name ?? $product->nama }} (Stok: {{ $product->stock ?? $product->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah:</label>
                <input type="number" name="jumlah" min="1" required>
            </div>

            <div class="form-group">
                <label>Alasan:</label>
                <select name="alasan" required>
                    <option value="Rusak">Rusak</option>
                    <option value="Expired">Expired</option>
                    <option value="Diberikan">Diberikan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan (Opsional):</label>
                <textarea name="keterangan" rows="2"></textarea>
            </div>

            <button type="submit">Simpan & Kurangi Stok</button>
        </form>
    </div>

    <!-- Daftar / Riwayat Barang Keluar -->
    <div class="card">
        <h3>Daftar Barang Keluar (Total: {{ $stockOuts->count() }})</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Alasan</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockOuts as $index => $stockOut)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $stockOut->product->name ?? $stockOut->product->nama ?? 'Produk Dihapus' }}</td>
                    <td>-{{ $stockOut->jumlah ?? $stockOut->qty }}</td>
                    <td>{{ $stockOut->alasan ?? $stockOut->reason }}</td>
                    <td>{{ $stockOut->keterangan ?? $stockOut->description ?? '-' }}</td>
                    <td>{{ $stockOut->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data barang keluar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
