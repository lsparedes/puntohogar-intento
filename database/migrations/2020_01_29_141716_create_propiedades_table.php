<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo_propiedad');
            $table->string('tipo_comercio');
            $table->string('direccion');
            $table->string('descripcion_propiedad');
            $table->integer('valor_uf');
            $table->integer('valor_pesos');
            $table->integer('nro_habitaciones');
            $table->integer('nro_banos');
            $table->integer('nro_estacionamientos');
            $table->enum('estado',['nuevo','usado','reacondicionado']);
            $table->enum('estado_publicacion',['espera','aceptada', 'rechazada','vendida']);
            $table->integer('sup_construida');
            $table->integer('sup_terreno');
            $table->unsignedBigInteger('tipopropiedades_id');
            $table->unsignedBigInteger('tipoamoblados_id');
            $table->unsignedBigInteger('tipopisos_id');
            $table->unsignedBigInteger('comunas_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('tipopropiedades_id')->references('id')->on('tipo_propiedades')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
            $table->foreign('tipoamoblados_id')->references('id')->on('tipo_amoblados')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
            $table->foreign('tipopisos_id')->references('id')->on('tipo_pisos')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
            $table->foreign('comunas_id')->references('id')->on('comunas')
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
        Schema::dropIfExists('propiedades');
    }
}
