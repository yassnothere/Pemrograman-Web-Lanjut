<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar barang',
            'list' => ['Home', 'barang']
        ];

        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];

        $activeMenu = 'barang';

        $kategori = KategoriModel::all();

        return view('barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $barangs = BarangModel::select('id', 'nama_barang', 'harga', 'kategori_id', 'supplier_id')
        ->with(['kategori', 'supplier']);    

        if($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($barang) {
                $btn  = '<a href="' . url('/barang/' . $barang->id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>'
                    . '</form>';

                return $btn;
            })
            ->rawColumns(['aksi']) 
            ->make(true);
    }

    public function create()
    {

        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']

        ];

        $page = (object) [
            'title' => 'Tambah barang baru'

        ];

        $kategori = KategoriModel::all(); // ambil data kategori untuk ditampilkan di form
        $activeMenu = 'barang'; // set menu yang sedang aktif

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|integer',
            'kategori_id' => 'required|integer',
            'supplier_id' => 'required|integer'
        ]);
        
        BarangModel::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id
        ]);
        

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id)
    {
        $barang = BarangModel::with('kategori')->find($id);
    
        if (!$barang) {
            return redirect('/barang')->with('error', 'Data tidak ditemukan');
        }
    
        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];
    
        $page = (object) [
            'title' => 'Detail Barang'
        ];
    
        $activeMenu = 'barang';
    
        return view('barang.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang,
            'activeMenu' => $activeMenu
        ]);
    }    
    public function edit(string $id)
    {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();
        $supplier = SupplierModel::all(); // Ambil data supplier
    
        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];
    
        $page = (object) [
            'title' => 'Edit Barang'
        ];
    
        $activeMenu = 'barang';
    
        return view('barang.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang,
            'kategori' => $kategori,
            'supplier' => $supplier, // Kirim ke view
            'activeMenu' => $activeMenu
        ]);
    }    

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|integer',
            'kategori_id' => 'required|integer',
            'supplier_id' => 'required|integer'
        ]);
        
        BarangModel::find($id)->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id
        ]);              

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($id); // Hapus data level

            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

}
