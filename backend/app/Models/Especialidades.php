<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'especialidades',
        "medico_id",

    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
