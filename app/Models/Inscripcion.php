<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripcion';
    protected $primaryKey = 'inscripcion_id';
    public $timestamps = false;
    protected $fillable = [
        'inscripcion_id',
        'inscripcion_codigo',
        'inscripcion_estado',
        'inscripcion_file',
        'persona_id',
        'admision_id',
        'mencion_id',
        'pago_id',
        'inscripcion_fecha',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function mencion()
    {
        return $this->belongsTo(Mencion::class, 'mencion_id');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    // public function evaluacion()
    // {
    //     return $this->hasMany(Evaluacion::class, 'inscripcion_id');
    // }

    public function detalle_expediente()
    {
        return $this->hasMany(DetalleExpediente::class, 'inscripcion_id');
    }

    public function usuario_inscripcion()
    {
        return $this->hasMany(UsuarioInscripcion::class, 'inscripcion_id');
    }
}
