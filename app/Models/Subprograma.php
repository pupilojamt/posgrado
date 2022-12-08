<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subprograma extends Model
{
    use HasFactory;

    protected $table = 'subprograma';
    protected $primaryKey = 'subprograma_id';
    public $timestamps = false;
    protected $fillable = [
        'subprograma_id',
        'subprograma_codigo',
        'subprograma',
        'subprograma_estado',
        'programa_id',
        'facultad_id',
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function mencion()
    {
        return $this->hasMany(Mencion::class, 'subprograma_id');
    }
}
