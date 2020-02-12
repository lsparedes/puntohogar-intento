<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Poseen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('poseen', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('propiedades_id');
          $table->unsignedBigInteger('asesores_id');
          



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poseen');
    }
}
