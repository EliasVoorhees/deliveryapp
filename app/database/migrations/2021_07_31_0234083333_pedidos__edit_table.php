<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {


             DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `nombre_cliente` `nombre_cliente` VARCHAR (255) NULL DEFAULT NULL;');
            DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `numero_contacto` `numero_contacto` INTEGER NULL DEFAULT NULL;');
             DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `estado` `estado` VARCHAR (255) NULL DEFAULT  NULL;');
             DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `direccion` `direccion`  VARCHAR (255)  NULL DEFAULT NULL;');
             DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `numero_pedido` `numero_pedido`  VARCHAR (255) NULL DEFAULT  NULL;');
              DB::statement('ALTER TABLE `pedidos` CHANGE COLUMN `hora_entrega`  `hora_entrega` DATETIME NULL DEFAULT NULL;');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            //
        });
    }
}
