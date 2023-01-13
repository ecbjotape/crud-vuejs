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

    public function Medico()
    {
        return $this->belongsTo(Medico::class, foreignKey: "tipo_de_consulta_id", ownerKey: "id");
    }
}
