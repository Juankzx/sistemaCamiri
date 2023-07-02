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
            $table->id();
            
            $table->foreignId('categoria_id')->nullable()->constrained('categorias');
            $table->string('nombre', 100);
            $table->string('cantidad')->default(0);
            $table->decimal('precioCompra', 25, 2);
            $table->decimal('precioVenta', 25, 2);
            $table->boolean('estado')->default(true);
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