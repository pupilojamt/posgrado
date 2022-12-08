<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distrito';
    protected $primaryKey = 'distrito_id';
    public $timestamps = false;
    protected $fillable = [
        'distrito_id',
        'distrito',
        'ubigeo',
        'provincia_id'
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }
}
