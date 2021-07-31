<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido__detalles', function (Blueprint $table) {
             DB::statement('ALTER TABLE `pedido__detalles` CHANGE COLUMN `comentarios` `comentarios` VARCHAR (255) NULL DEFAULT NULL;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido__detalles', function (Blueprint $table) {
            //
        });
    }
}
