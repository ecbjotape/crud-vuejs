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
    ];

    public function Medico()
    {
        return $this->belongsTo(Medico::class, foreignKey: "especialidade_id", ownerKey: "id");
    }
}
