<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = 'm_supplier'; // Nama tabel sesuai database
    protected $primaryKey = 'id'; // Primary key di database adalah 'id'

    protected $fillable = [
        'nama_supplier', // Sesuai dengan database
        'kontak', 
        'created_at',
        'updated_at'
    ];
}
