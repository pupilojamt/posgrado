<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincia';
    protected $primaryKey = 'provincia_id';
    public $timestamps = false;
    protected $fillable = [
        'provincia_id',
        'provincia',
        'ubigeo',
        'departamento_id'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function distrito()
    {
        return $this->hasMany(Distrito::class, 'provincia_id');
    }
}
