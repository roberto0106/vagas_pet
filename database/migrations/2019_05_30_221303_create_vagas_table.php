<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('vagas');

        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vaga');
            $table->text('descricao');
            $table->string('empresa');
            
            $table->unsignedBigInteger('id_candidato')->nullable();

            $table->foreign('id_candidato')
            ->references('id')->on('candidato')
            ->onDelete('cascade');


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
        Schema::dropIfExists('vagas');
    }
}
