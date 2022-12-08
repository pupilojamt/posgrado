<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioInscripcion extends Model
{
    use HasFactory;

    protected $table = 'usuario_inscripcion';
    protected $primaryKey = 'usuario_inscripcion_id';
    public $timestamps = false;
    protected $fillable = [
        'usuario_inscripcion_id',
        'usuario_username',
        'usuario_password',
        'usuario_estado',
        'inscripcion_id',
    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }
}
