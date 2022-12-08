<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enumerado extends Model
{
    use HasFactory;

    protected $table = 'enumerado';
    protected $primaryKey = 'enumerado_id';
    public $timestamps = false;
    protected $fillable = [
        'enumerado_id',
        'enumerado_entidad',
        'enumerado_estado',
    ];

    public function enumerado_data()
    {
        return $this->hasMany(EnumeradoData::class, 'enumerado_id');
    }
}
