<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupo_usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('idGrupo_usuarios');
            $table->string('grupoNombre', 200);
            $table->integer('grupoNivel');
            $table->integer('grupoEstado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_usuarios');
    }
};
