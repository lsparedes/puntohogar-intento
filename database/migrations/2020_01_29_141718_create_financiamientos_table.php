<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanciamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financiamientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('propiedades_id');
            $table->unsignedBigInteger('tipofinanciamientos_id');
            $table->foreign('propiedades_id')->references('id')->on('propiedades')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

            $table->foreign('tipofinanciamientos_id')->references('id')->on('tipo_financiamientos')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
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
        Schema::dropIfExists('financiamientos');
    }
}
