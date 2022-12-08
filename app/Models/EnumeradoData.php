<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnumeradoData extends Model
{
    use HasFactory;

    protected $table = 'enumerado_datos';
    protected $primaryKey = 'enumerado_datos_id';
    public $timestamps = false;
    protected $fillable = [
        'enumerado_datos_id',
        'enumerado_datos',
        'enumerado_datos_estado',
        'enumerado_id',
    ];

    public function enumerado()
    {
        return $this->belongsTo(Enumerado::class, 'enumerado_id');
    }
}
