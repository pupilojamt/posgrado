<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
    use HasFactory;

    protected $table = 'detalle_pago';
    protected $primaryKey = 'detalle_pago_id';
    public $timestamps = false;
    protected $fillable = [
        'detalle_pago_id',
        'detalle_pago_documento',
        'detalle_pago_numero_operacion',
        'detalle_pago_monto',
        'detalle_pago_fecha',
        'detalle_pago_estado',
        'canal_pago_id',
        'pago_id',
    ];

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }
}
