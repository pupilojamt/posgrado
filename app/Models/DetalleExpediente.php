<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleExpediente extends Model
{
    use HasFactory;

    protected $table = 'detalle_expediente';
    protected $primaryKey = 'detalle_expediente_id';
    public $timestamps = false;
    protected $fillable = [
        'detalle_expediente_id',
        'detalle_expediente_file',
        'detalle_expediente_fecha_creado',
        'detalle_expediente_fecha_actualizado',
        'detalle_expediente_estado',
        'inscripcion_id',
        'expediente_id',
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'expediente_id');
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }
}
