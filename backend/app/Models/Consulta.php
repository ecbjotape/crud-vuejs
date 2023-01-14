<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'data',
        "especialidade_id",
        "tipo_de_consulta_id",
        'medico_id',
        'paciente_id'
    ];

    public function especialidade()
    {
        return $this->hasOne(Especialidades::class, foreignKey: "id", localKey: "especialidade_id");
    }

    public function tipoDeConsulta()
    {
        return $this->hasOne(TipoDeConsulta::class, foreignKey: "id", localKey: "tipo_de_consulta_id");
    }

    public function medico()
    {
        return $this->hasOne(Medico::class, foreignKey: "id", localKey: "medico_id");
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, foreignKey: "id", localKey: "paciente_id");
    }
}
