<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 't_stok';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'stok_id';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'stok_tanggal',
        'jumlah',
        'supplier_id',
        'barang_id',
        'user_id'
    ];

    // Relasi ke model BarangModel (Stok berkaitan dengan satu barang)
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    // Relasi ke model SupplierModel (Stok berasal dari satu supplier)
    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    }

    // Relasi ke model User (Stok dicatat oleh satu user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
