<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    use HasFactory;

    protected $table = 'mencion';
    protected $primaryKey = 'mencion';
    public $timestamps = false;
    protected $fillable = [
        'mencion_id',
        'mencion_codigo',
        'mencion',
        'mencion_estado',
        'subprograma_id',
    ];

    public function subprograma()
    {
        return $this->belongsTo(Subprograma::class, 'subprograma_id');
    }

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class, 'mencion_id');
    }
}
