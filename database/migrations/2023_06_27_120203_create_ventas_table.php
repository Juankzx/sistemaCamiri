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
        Schema::create('ventas', function (Blueprint $table) {
                $table->engine = 'InnoDB';    
                $table->id();

                $table->foreignId('producto_id')->nullable()->constrained('productos');
                $table->foreignId('user_id')->nullable()->constrained('users');

                $table->integer('cantidad');
                $table->decimal('precio', 8, 2);
                $table->string('metodo_pago')->nullable();
                $table->date('fecha');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
