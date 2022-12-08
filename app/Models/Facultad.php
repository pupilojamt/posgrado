<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $table = 'facultad';
    protected $primaryKey = 'facultad_id';
    public $timestamps = false;
    protected $fillable = [
        'facultad_id',
        'facultad_codigo',
        'facultad',
        'facultad_estado',
    ];

    public function subprograma()
    {
        return $this->hasMany(Subprograma::class, 'facultad_id');
    }

    public function coordinador()
    {
        return $this->hasOne(Coordinador::class, 'facultad_id');
    }
}
