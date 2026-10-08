<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with('product')->latest()->get();
        $products = Product::all();

        return view('stock_outs.index', compact('stockOuts', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah'     => 'required|integer|min:1',
            'alasan'     => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($request->product_id);

            // Validasi stok mencukupi
            if ($product->stock < $request->jumlah) {
                return back()->withErrors(['jumlah' => 'Stok tidak mencukupi! Stok saat ini: ' . $product->stock])->withInput();
            }

            // Kurangi stok produk
            $product->stock -= $request->jumlah;
            $product->save();

            // Simpan data barang keluar (sesuaikan nama kolom dengan migrasi kamu)
            StockOut::create([
                'product_id' => $request->product_id,
                'jumlah'     => $request->jumlah,
                'alasan'     => $request->alasan,
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();

            return redirect()->route('stock-outs.index')->with('success', 'Barang keluar berhasil dicatat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    // <-- TAMBAHKAN METHOD INI UNTUK HALAMAN RIWAYAT STOK -->
    public function history()
    {
        $stockOuts = StockOut::with('product')->latest()->get();
        return view('stock_outs.history', compact('stockOuts'));
    }
}
