<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'persona_id';
    public $timestamps = false;
    protected $fillable = [
        'persona_id',
        'persona_documento',
        'persona_apellido_paterno',
        'persona_apellido_materno',
        'persona_nombre',
        'persona_nombre_completo',
        'persona_direccion',
        'persona_sexo',
        'persona_fecha_nacimiento',
        'persona_correo_1',
        'persona_correo_2',
        'persona_celular_1',
        'persona_celular_2',
        'persona_año_egreso',
        'persona_centro_trabajo',
        'discapacidad_id',
        'estado_civil_id',
        'grado_academico_id',
        'persona_especialidad',
        'universidad_id',
        'persona_pais',
        'ubigeo_direccion',
        'ubigeo_nacimiento',
    ];

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class, 'persona_id');
    }
}
