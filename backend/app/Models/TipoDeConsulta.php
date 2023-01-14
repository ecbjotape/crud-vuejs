<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeConsulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
