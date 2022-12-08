<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programa';
    protected $primaryKey = 'programa_id';
    public $timestamps = false;
    protected $fillable = [
        'programa_id',
        'programa',
        'programa_estado',
        'sede_id',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function subprograma()
    {
        return $this->hasMany(Subprograma::class, 'programa_id');
    }
}
