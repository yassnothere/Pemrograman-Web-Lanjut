<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'm_kategori';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'kategori_id';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'kategori_buku',   // Kode unik kategori
        'kategori_nama',   // Nama kategori
    ];

    /**
     * Relasi one-to-many ke model BarangModel
     * Satu kategori bisa memiliki banyak barang
     */
    public function barang(): HasMany {
        return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
    }
}
