<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'm_supplier';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'supplier_id';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'supplier_kode',
        'supplier_nama',
        'supplier_alamat'
    ];
}
