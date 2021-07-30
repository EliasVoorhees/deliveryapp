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
            $table->string('nombre_cliente');
            $table->integer('numero_contacto');
            $table->foreignId('repartidor_id')->constrained('users');
            $table->string('estado');
            $table->dateTime('hora_entrega');
            $table->decimal('total_precio');
            $table->string('direccion');
            $table->string('numero_pedido');
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
