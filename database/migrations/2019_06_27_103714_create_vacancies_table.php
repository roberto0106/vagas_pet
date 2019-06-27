<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vacancy');
            $table->text('description');
            $table->string('company');

            $table->bigInteger('id_candidate')->unsigned()->nullable();

            $table->foreign('id_candidate')
                ->references('id')->on('candidates')
                ->onDelete('cascade');

            $table->bigInteger('id_company')->unsigned()->nullable();

            $table->foreign('id_company')
                ->references('id')->on('companies')
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
        Schema::dropIfExists('vacancies');
    }
}
