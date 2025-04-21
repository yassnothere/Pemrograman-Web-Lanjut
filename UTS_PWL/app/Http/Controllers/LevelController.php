<?php

// Namespace dan import class yang diperlukan
namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

// Deklarasi class controller untuk Level
class LevelController extends Controller
{
    // Menampilkan halaman utama level
    public function index()
    {
        // Menyiapkan data breadcrumb dan judul halaman
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar Level yang terdaftar dalam sistem'
        ];

        // Menandai menu aktif
        $acticeMenu = 'level';

        // Menampilkan view index dengan data breadcrumb, page, dan menu aktif
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $acticeMenu]);
    }

    // Mengambil data level untuk ditampilkan dalam tabel DataTables
    public function list()
    {
        // Mengambil data dari tabel level
        $levels = LevelModel::select('level_id', 'level_code', 'level_nama');

        // Menggunakan DataTables untuk memformat data agar bisa ditampilkan di frontend
        return DataTables::of($levels)
            ->addIndexColumn() // Menambahkan kolom index
            ->addColumn('aksi', function ($level) {
                // Membuat tombol Detail, Edit, dan Hapus
                $btn  = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>'
                    . '</form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu DataTables bahwa kolom aksi berisi HTML
            ->make(true); // Mengembalikan data dalam format JSON
    }

    // Menampilkan form tambah level
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        $activeMenu = 'level';

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data level baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'level_code' => 'required|string|min:3|unique:m_level,level_code',
            'level_nama' => 'required|string|max: 100', 
        ]);

        // Simpan data ke database
        LevelModel::create([
            'level_code' => $request->level_code,
            'level_nama' => $request->level_nama,
        ]);

        // Redirect ke halaman index level
        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    // Menampilkan detail dari satu data level
    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'level', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail level'
        ];

        $activeMenu = 'level';

        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan form edit untuk data level
    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level'
        ];

        $activeMenu = 'level'; 

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data level ke database
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'level_code' => 'required|string|max:100|unique:m_level,level_code,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100',
        ]);

        // Update data level
        LevelModel::find($id)->update([
            'level_code' => $request->level_code,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level')->with('success', 'Data Level berhasil diubah');
    }

    // Menghapus data level dari database
    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id);

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika data terkait dengan tabel lain (foreign key), tampilkan pesan error
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
