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
        Schema::create('detalleVenta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('idproducto')->unsigned();
            $table->integer('idventa')->unsigned();
            $table->integer('cantidad');
            $table->decimal('precio', 25,2);
            $table->foreign('idproducto')->references('id')->on('productos');
            $table->foreign('idventa')->references('id')->on('ventas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleVenta');
    }
};
