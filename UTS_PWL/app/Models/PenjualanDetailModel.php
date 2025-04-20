<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    // Menentukan nama tabel yang digunakan
    protected $table = 't_penjualan_detail';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'detail_id';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'harga',
        'jumlah',
        'penjualan_id',
        'barang_id',
    ];

    // Relasi ke model PenjualanModel (Setiap detail penjualan milik satu penjualan)
    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }

    // Relasi ke model BarangModel (Setiap detail penjualan memiliki satu barang)
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
