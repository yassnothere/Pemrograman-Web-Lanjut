<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'level_id'; 
    public $timestamps = false; // Jika tabel tidak memiliki created_at & updated_at

    protected $fillable = ['nama_level'];

    // Relasi ke UserModel (One-to-Many)
    public function users()
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
