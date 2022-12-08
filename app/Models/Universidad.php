<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $table = 'universidad';
    protected $primaryKey = 'universidad_id';
    public $timestamps = false;
    protected $fillable = [
        'universidad_id',
        'universidad',
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class, 'universidad_id');
    }
}
