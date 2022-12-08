<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';
    protected $primaryKey = 'plan_id';
    public $timestamps = false;
    protected $fillable = [
        'plan_id',
        'plan',
        'plan_estado',
    ];

    public function sede()
    {
        return $this->hasMany(Sede::class, 'plan_id');
    }
}
