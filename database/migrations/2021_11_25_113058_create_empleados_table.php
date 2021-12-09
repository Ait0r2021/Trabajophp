<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // empleado: id, nombre, apellidos, email, telefono, fechacontrato, idpuesto, iddepartamento
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 70)->required();
            $table->string("apellidos", 80)->required();
            $table->string("email", 100)->required()->unique();
            $table->string("telefono", 9)->required();
            $table->date("fechacontrato")->useCurrent()->required();
            
            $table->bigInteger("idpuesto")->unsigned()->nullable();
            $table->bigInteger("iddepartamento")->unsigned()->nullable();
            
            $table->foreign('idpuesto')->references('id')->on('puestos');
            $table->foreign('iddepartamento')->references('id')->on('departamentos');
        });
        
        Schema::table('departamentos', function(Blueprint $table) {
        $table->foreign('idempleadojefe')->references('id')->on('empleados');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
