<?php

namespace App\Http\Controllers;

use App\Models\StokModel; // Model untuk tabel stok
use App\Models\BarangModel; // Model untuk data barang
use App\Models\SupplierModel; // Model untuk data supplier
use App\Models\User; // Model user default bawaan Laravel
use App\Models\UserModel; // Model user custom (m_user)
use Illuminate\Http\Request;

class StokController extends Controller
{
    // Menampilkan daftar seluruh stok barang
    public function index()
    {
        // Ambil semua data stok beserta relasi barang, supplier, dan user
        $stok = StokModel::with(['barang', 'supplier', 'user'])->get();

        // Data breadcrumb untuk navigasi di halaman
        $breadcrumb = (object)[
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok']
        ];

        // Judul halaman
        $page = (object)[
            'title' => 'Daftar stok barang yang tercatat dalam sistem'
        ];

        $activeMenu = 'stok'; // tandai menu stok sebagai aktif

        // Tampilkan view stok.index dengan data stok dan tampilan halaman
        return view('stok.index', [
            'stok' => $stok,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan form untuk menambahkan stok baru
    public function create()
    {
        $barangs = BarangModel::all(); // Ambil semua barang
        $suppliers = SupplierModel::all(); // Ambil semua supplier
        $users = UserModel::all(); // Ambil semua user dari tabel m_user

        $breadcrumb = (object)[
            'title' => 'Tambah Data Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Form untuk menambahkan data stok barang'
        ];

        $activeMenu = 'stok';

        // Tampilkan form create stok
        return view('stok.create', compact('barangs', 'suppliers', 'users', 'breadcrumb', 'page', 'activeMenu'));
    }

    // Menyimpan data stok baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'supplier_id' => 'required|exists:m_supplier,supplier_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        // Simpan data stok
        StokModel::create($request->all());

        // Kembali ke halaman index stok dengan pesan sukses
        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data stok yang sudah ada
    public function edit($id)
    {
        $stok = StokModel::findOrFail($id); // Cari stok berdasarkan ID
        $barangs = BarangModel::all(); // Data barang
        $suppliers = SupplierModel::all(); // Data supplier
        $users = User::all(); // Ambil user dari model bawaan Laravel

        $breadcrumb = (object)[
            'title' => 'Edit Data Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Form untuk mengubah data stok barang'
        ];

        $activeMenu = 'stok';

        // Tampilkan view edit stok
        return view('stok.edit', compact('stok', 'barangs', 'suppliers', 'users', 'breadcrumb', 'page', 'activeMenu'));
    }

    // Update data stok yang diedit
    public function update(Request $request, $id)
    {
        $stok = StokModel::findOrFail($id); // Ambil data stok lama

        // Validasi input form edit
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'supplier_id' => 'required|exists:m_supplier,supplier_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        // Update data stok
        $stok->update($request->all());

        // Kembali ke index dengan pesan sukses
        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diupdate');
    }

    // Hapus data stok berdasarkan ID
    public function destroy($id)
    {
        $stok = StokModel::findOrFail($id); // Cari data stok
        $stok->delete(); // Hapus data

        // Kembali ke index stok
        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus');
    }
}
