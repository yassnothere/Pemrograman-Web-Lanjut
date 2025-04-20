<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\BarangModel;
use App\Models\SupplierModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = StokModel::with(['barang', 'supplier', 'user'])->get();

        $breadcrumb = (object)[
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar stok barang yang tercatat dalam sistem'
        ];

        $activeMenu = 'stok';

        return view('stok.index', [
            'stok' => $stok,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function create()
    {
        $barangs = BarangModel::all();
        $suppliers = SupplierModel::all();
        $users = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Tambah Data Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Form untuk menambahkan data stok barang'
        ];

        $activeMenu = 'stok';

        return view('stok.create', compact('barangs', 'suppliers', 'users', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'supplier_id' => 'required|exists:m_supplier,supplier_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        StokModel::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan');
    }

    public function edit($id)
    {
        $stok = StokModel::findOrFail($id);
        $barangs = BarangModel::all();
        $suppliers = SupplierModel::all();
        $users = User::all();

        $breadcrumb = (object)[
            'title' => 'Edit Data Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Form untuk mengubah data stok barang'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', compact('stok', 'barangs', 'suppliers', 'users', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $stok = StokModel::findOrFail($id);

        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'supplier_id' => 'required|exists:m_supplier,supplier_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diupdate');
    }

    public function destroy($id)
    {
        $stok = StokModel::findOrFail($id);
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus');
    }
}
