<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';    
            $table->id();

            $table->foreignId('producto_id')->nullable()->constrained('productos');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedores');

            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->string('metodo_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
