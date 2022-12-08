<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pago';
    protected $primaryKey = 'pago_id';
    public $timestamps = false;
    protected $fillable = [
        'pago_id',
        'pago_fecha',
        'concepto_pago_id',
    ];

    public function detalle_pago()
    {
        return $this->hasMany(DetallePago::class, 'pago_id');
    }

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class, 'inscripcion_id');
    }
}
