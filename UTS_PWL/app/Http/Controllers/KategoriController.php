<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    // Menampilkan halaman daftar kategori
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar kategori',
            'list' => ['Home', 'kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];

        $acticeMenu = 'kategori';

        // Tampilkan view kategori.index
        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $acticeMenu]);
    }

    // Mengambil data kategori dalam format DataTables
    public function list()
    {
        $kategories = KategoriModel::select('kategori_id', 'kategori_buku', 'kategori_nama');

        return DataTables::of($kategories)
            ->addIndexColumn() // Menambahkan kolom nomor
            ->addColumn('aksi', function ($kategori) {
                // Tombol aksi: Detail, Edit, Hapus
                $btn  = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>'
                    . '</form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // Biarkan kolom 'aksi' menampilkan HTML
            ->make(true);
    }

    // Menampilkan form untuk tambah kategori
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah kategori',
            'list' => ['Home', 'kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori baru'
        ];

        $activeMenu = 'kategori';

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_buku' => 'required|string|min:3|unique:m_kategori,kategori_buku',
            'kategori_nama' => 'required|string|max: 100', 
        ]);

        // Simpan data ke database
        KategoriModel::create([
            'kategori_buku' => $request->kategori_buku,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
    }

    // Menampilkan detail kategori berdasarkan ID
    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail kategori',
            'list' => ['Home', 'kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan form edit kategori
    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit kategori',
            'list' => ['Home', 'kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data kategori
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_buku' => 'required|string|max:100|unique:m_kategori,kategori_buku,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        KategoriModel::find($id)->update([
            'kategori_buku' => $request->kategori_buku,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data Level berhasil diubah');
    }

    // Menghapus data kategori
    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id);

            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
