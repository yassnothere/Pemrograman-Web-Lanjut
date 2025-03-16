<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::findOrFail($id);
        return view('user_ubah', ['user' => $user]);
    }

    public function ubah_simpan(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', 'Data user berhasil dihapus!');
    }

}