<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // departamento: id, nombre, localizacion, idempleadojefe
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 100)->required();
            $table->string("localizacion", 100)->required();
            $table->foreignId('idempleadojefe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
