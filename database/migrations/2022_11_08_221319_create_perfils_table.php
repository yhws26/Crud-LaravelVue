<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
        
            $table->String('fotoPerfil');
            $table->String('fotoLicencia');
            $table->String('Nombre');
            $table->String('Apellido');
            $table->integer('Cedula');
            $table->String('fechaNacimiento');
            $table->integer('numeroLicencia');
            $table->date('fechaVencimiento');

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
        Schema::dropIfExists('perfils');
    }
};
