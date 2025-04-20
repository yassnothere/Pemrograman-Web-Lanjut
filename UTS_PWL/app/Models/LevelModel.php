<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'm_level';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'level_id';

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'level_code',
        'level_nama',
    ];

    // Relasi Many-to-One ke UserModel (setiap level dimiliki oleh satu user)
    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class);
    }
}
