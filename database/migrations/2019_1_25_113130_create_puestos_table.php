<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // puesto: id, nombre, minimo, maximo
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 100)->unique()->required();
            $table->integer("minimo")->length(10)->required();
            $table->integer("maximo")->length(10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos');
    }
}
