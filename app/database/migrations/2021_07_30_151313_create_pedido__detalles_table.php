<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido__detalles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('producto_id')->constrained();
            $table->foreignId('pedido_id')->constrained();
            $table->integer('cantidad')->nullable();
            $table->decimal('precio')->nullable();
            $table->string('comentarios')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido__detalles');
    }
}
