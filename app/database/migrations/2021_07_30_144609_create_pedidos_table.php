<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_cliente')->nullable();
            $table->integer('numero_contacto')->nullable();
        $table->foreignId('repartidor_id')->nullable()->unsigned()->constrained('users');
            $table->string('estado')->nullable();
            $table->dateTime('hora_entrega')->nullable();
            $table->decimal('total_precio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero_pedido')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
