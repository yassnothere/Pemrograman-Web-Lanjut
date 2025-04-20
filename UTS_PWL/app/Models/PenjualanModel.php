<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;

class PenjualanModel extends Model
{
    // Menentukan nama tabel yang digunakan
    protected $table = 't_penjualan';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'penjualan_id';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
        'user_id',
    ];

    // Relasi ke model UserModel (Setiap penjualan dilakukan oleh satu user)
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }    

    // Relasi ke model PenjualanDetailModel (Setiap penjualan memiliki banyak detail)
    public function details()
    {
        return $this->hasMany(PenjualanDetailModel::class, 'penjualan_id', 'penjualan_id');
    }
}
