<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmisionDuracion extends Model
{
    use HasFactory;

    protected $table = 'admision_duracion';
    protected $primaryKey = 'duracion_id';
    public $timestamps = false;
    protected $fillable = [
        'duracion_id',
        'duracion_fecha',
        'duracion_estado',
        'admision_id',
    ];
}
