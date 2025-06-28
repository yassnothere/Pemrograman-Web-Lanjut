<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_code',
        'level_nama',
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class);
    }
}
