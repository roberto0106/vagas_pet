<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_vacancy')->unsigned()->nullable();

            $table->foreign('id_vacancy')
                ->references('id')->on('vacancies')
                ->onDelete('cascade');

            $table->bigInteger('id_company')->unsigned()->nullable();

            $table->foreign('id_company')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->bigInteger('id_candidate')->unsigned()->nullable();

            $table->foreign('id_candidate')
                ->references('id')->on('candidates')
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
        Schema::dropIfExists('job_applications');
    }
}