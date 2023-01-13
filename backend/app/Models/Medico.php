<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        "crm",
        "horarios",
        "tipos",
        "especialidade_id",
        "tipo_de_consulta_id"

    ];

    public function especialidade()
    {
        return $this->hasOne(Especialidades::class, foreignKey: "id", localKey: "especialidade_id");
    }

    public function tipoDeConsulta()
    {
        return $this->hasOne(TipoDeConsulta::class, foreignKey: "id", localKey: "tipo_de_consulta_id");
    }
}
