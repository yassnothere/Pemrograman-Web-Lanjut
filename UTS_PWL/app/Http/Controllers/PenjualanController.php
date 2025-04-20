<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = PenjualanModel::with(['details.barang', 'user'])->latest()->get();
    
        $breadcrumb = (object) [
            'title' => 'Riwayat Penjualan',
            'list' => ['Home', 'Penjualan']
        ];
    
        $page = (object) [
            'title' => 'Daftar transaksi penjualan yang sudah terjadi'
        ];
    
        $activeMenu = 'penjualan';
    
        return view('penjualan.index', compact('penjualans', 'breadcrumb', 'page', 'activeMenu'));
    }        

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'pembeli' => 'required|string|max:50',
        ]);

        $barang = BarangModel::withSum('stok', 'jumlah')->findOrFail($request->barang_id);
        $stokTersedia = $barang->stok_sum_jumlah ?? 0;

        if ($request->jumlah > $stokTersedia) {
            return back()->with('error', 'Jumlah melebihi stok tersedia.');
        }

        // Buat header penjualan
        $penjualan = PenjualanModel::create([
            'pembeli' => $request->pembeli,
            'penjualan_kode' => 'TRX-' . strtoupper(Str::random(6)),
            'penjualan_tanggal' => Carbon::now(),
            'user_id' => 1,
        ]);

        // Buat detail penjualan
        PenjualanDetailModel::create([
            'penjualan_id' => $penjualan->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil dicatat.');
    }

    public function jual($barangId)
    {
        $barang = BarangModel::findOrFail($barangId);

        $stokMasuk = $barang->stok->sum('jumlah');
        $stokKeluar = $barang->penjualanDetail->sum('jumlah');
        $stokSisa = $stokMasuk - $stokKeluar;

        if ($stokSisa < 1) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk dijual.');
        }

        return view('penjualan.form', [
            'barang' => $barang,
            'stokSisa' => $stokSisa,
            'breadcrumb' => (object)[
                'title' => 'Form Penjualan',
                'list' => ['Home', 'Penjualan', 'Form']
            ],
            'page' => (object)[
                'title' => 'Input data transaksi penjualan'
            ],
            'activeMenu' => 'penjualan'
        ]);
    }
}
