<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('crm')->unique();
            $table->string('horarios');
            $table->integer('especialidade_id')->unsigned();
            $table->integer('tipo_de_consulta_id')->unsigned();
            $table->foreign('id')->references("especialidade_id")->on('especialidades');
            $table->foreign('id')->references("tipo_de_consulta_id")->on('tipo_de_consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};
