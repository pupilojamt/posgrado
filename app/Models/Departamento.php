<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'departamento_id';
    public $timestamps = false;
    protected $fillable = [
        'departamento_id',
        'departamento',
        'ubigeo'
    ];

    public function provincia()
    {
        return $this->hasMany(Provincia::class, 'departamento_id');
    }
}
