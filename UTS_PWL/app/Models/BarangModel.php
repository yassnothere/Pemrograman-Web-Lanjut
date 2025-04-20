<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'm_barang';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'barang_id';

    // Menentukan kolom-kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = [
        'barang_kode',     // Kode unik untuk barang
        'barang_nama',     // Nama barang
        'harga_beli',      // Harga beli barang
        'harga_jual',      // Harga jual barang
        'kategori_id'      // ID kategori barang (relasi ke tabel kategori)
    ];

    /**
     * Relasi ke model KategoriModel.
     * Barang termasuk dalam satu kategori.
     */
    public function kategori(): BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    /**
     * Relasi ke model StokModel.
     * Satu barang bisa memiliki banyak data stok.
     */
    public function stok()
    {
        return $this->hasMany(StokModel::class, 'barang_id');
    }

    /**
     * Relasi ke model PenjualanDetailModel.
     * Satu barang bisa muncul di banyak detail penjualan.
     */
    public function penjualanDetail()
    {
        return $this->hasMany(PenjualanDetailModel::class, 'barang_id');
    }
}
