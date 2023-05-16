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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            
            $table->integer('idgrupoUsuario')->unsigned();
            $table->string('nombre', 100);
            $table->string('nombreUsuario', 100);
            $table->string('contraseña', 100);
            $table->integer('nivelUsuario');
            $table->integer('estado')->default(1);
            $table->foreign('idgrupoUsuario')->references('id')->on('grupoUsuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
