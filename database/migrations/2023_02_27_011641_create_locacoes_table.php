<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('carro_id');

            $table->dateTimeTz('data_inicio_periodo');
            $table->dateTimeTz('data_final_previsto_periodo');
            $table->dateTimeTz('data_final_realizado_periodo');
            $table->float('valor_diaria');
            $table->integer('km_inicial');
            $table->string('km_final', 45);

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes');

            $table->foreign('carro_id')
            ->references('id')
            ->on('carros');

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
        Schema::dropIfExists('locacaos');
    }
}
