<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('precio');
            $table->string('desc', '500');
            $table->integer('dormitorios');
            $table->integer('banyos');
            $table->float('m2');
            $table->enum('tipoPropiedad', array_keys(config('enums_Propiedad.tipoPropiedad')));
            $table->enum('tipoOperacion', array_keys(config('enums_Operacion.tipoOperacion')));
            $table->enum('ciudad', array_keys(config('enums_Ciudad.ciudad')));
            $table->string('cp');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
