<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('tipoOperacion', array_keys(config('enums_Operacion.tipoOperacion')));            
            //$table->foreign('property_tipoOperacion')->references('tipoOperacion')->on('properties');
            $table->date('fecha');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('user_id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
