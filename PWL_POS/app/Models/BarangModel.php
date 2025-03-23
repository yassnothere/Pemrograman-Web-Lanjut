<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'id'; // Sesuai dengan database

    public $timestamps = true; // Mengaktifkan timestamps

    protected $fillable = [
        'nama_barang', // Sesuai dengan database
        'kategori_id',
        'supplier_id',
        'harga' // Menggunakan satu kolom harga
    ];

    public function kategori(): BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }    

    public function supplier(): BelongsTo {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'id');
    }
}
