<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expediente';
    protected $primaryKey = 'expediente_id';
    public $timestamps = false;
    protected $fillable = [
        'expediente_id',
        'expediente',
        'expediente_complemento',
        'expediente_estado',
    ];

    public function detalle_expediente()
    {
        return $this->hasMany(DetalleExpediente::class, 'expediente_id');
    }
}
