<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('idProductos');
            $table->string('nombre', 100);
            $table->string('cantidad', 100);
            $table->decimal('precioCompra', 25, 2);
            $table->decimal('precioVenta', 25, 2);
            $table->unsignedBigInteger('fk_idCategoria');
            $table->foreign('fk_idproductos')->references('idCategoria')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};