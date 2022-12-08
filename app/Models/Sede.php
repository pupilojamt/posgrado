<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sede';
    protected $primaryKey = 'sede_id';
    public $timestamps = false;
    protected $fillable = [
        'sede_id',
        'sede',
        'sede_estado',
        'plan_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function programa()
    {
        return $this->hasMany(Programa::class, 'sede_id');
    }
}
