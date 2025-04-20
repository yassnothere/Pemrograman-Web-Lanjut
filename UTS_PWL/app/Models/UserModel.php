<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;
    
    // Menentukan nama tabel yang digunakan
    protected $table = 'm_user';

    // Menentukan primary key dari tabel
    protected $primaryKey = 'user_id';

    // Menonaktifkan timestamps (created_at & updated_at)
    public $timestamps = false;

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    // Relasi ke model LevelModel (Setiap user memiliki satu level)
    public function level(): BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
