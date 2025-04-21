<?php

// Namespace dan import model serta library yang diperlukan
namespace App\Http\Controllers;

use App\Models\BarangModel; // untuk ambil data barang
use App\Models\PenjualanModel; // untuk data utama penjualan
use App\Models\PenjualanDetailModel; // untuk detail transaksi penjualan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // untuk identifikasi user login (belum digunakan di sini)
use Illuminate\Support\Str; // untuk generate kode transaksi acak
use Carbon\Carbon; // untuk ambil tanggal dan waktu saat ini

class PenjualanController extends Controller
{
    // Fungsi untuk menampilkan semua data penjualan
    public function index()
    {
        // Mengambil data penjualan terbaru beserta relasi user dan detail barang
        $penjualans = PenjualanModel::with(['details.barang', 'user'])->latest()->get();
    
        // Menyiapkan data breadcrumb dan informasi halaman
        $breadcrumb = (object) [
            'title' => 'Riwayat Penjualan',
            'list' => ['Home', 'Penjualan']
        ];
    
        $page = (object) [
            'title' => 'Daftar transaksi penjualan yang sudah terjadi'
        ];
    
        $activeMenu = 'penjualan'; // tandai menu yang aktif
    
        // Tampilkan halaman penjualan
        return view('penjualan.index', compact('penjualans', 'breadcrumb', 'page', 'activeMenu'));
    }        

    // Fungsi untuk menyimpan data transaksi penjualan ke database
    public function store(Request $request)
    {
        // Validasi input form penjualan
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id', // pastikan barang ada di database
            'jumlah' => 'required|integer|min:1', // jumlah minimal 1
            'harga' => 'required|integer|min:0', // harga tidak boleh negatif
            'pembeli' => 'required|string|max:50', // nama pembeli maksimal 50 karakter
        ]);

        // Cek stok tersedia dari relasi stok
        $barang = BarangModel::withSum('stok', 'jumlah')->findOrFail($request->barang_id);
        $stokTersedia = $barang->stok_sum_jumlah ?? 0;

        // Jika jumlah melebihi stok, tampilkan error
        if ($request->jumlah > $stokTersedia) {
            return back()->with('error', 'Jumlah melebihi stok tersedia.');
        }

        // Simpan data header penjualan
        $penjualan = PenjualanModel::create([
            'pembeli' => $request->pembeli,
            'penjualan_kode' => 'TRX-' . strtoupper(Str::random(6)), // generate kode transaksi unik
            'penjualan_tanggal' => Carbon::now(), // ambil tanggal saat ini
            'user_id' => 1, // user ID masih statis, idealnya pakai Auth::id()
        ]);

        // Simpan data detail penjualan (barang yang dijual)
        PenjualanDetailModel::create([
            'penjualan_id' => $penjualan->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        // Redirect ke halaman daftar penjualan dengan pesan sukses
        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil dicatat.');
    }

    // Fungsi untuk menampilkan form penjualan dari barang tertentu
    public function jual($barangId)
    {
        $barang = BarangModel::findOrFail($barangId); // cari data barang berdasarkan ID

        // Hitung stok masuk (dari tabel stok) dan stok keluar (dari penjualan detail)
        $stokMasuk = $barang->stok->sum('jumlah');
        $stokKeluar = $barang->penjualanDetail->sum('jumlah');
        $stokSisa = $stokMasuk - $stokKeluar; // sisa stok yang bisa dijual

        // Jika stok habis, tampilkan pesan error
        if ($stokSisa < 1) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk dijual.');
        }

        // Tampilkan form penjualan
        return view('penjualan.form', [
            'barang' => $barang,
            'stokSisa' => $stokSisa, // kirim data stok sisa ke view
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
