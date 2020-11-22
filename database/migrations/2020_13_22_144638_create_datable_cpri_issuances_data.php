<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatableCpriIssuancesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpri_issuances', function (Blueprint $table) {

          $table->increments('id');
          $table->string('fe_name');

          $table->integer('site_id')->unsigned();
          $table->foreign('site_id')->references('id')->on('sites');

          $table->integer('mbu_id')->unsigned();
          $table->foreign('mbu_id')->references('id')->on('mbu');

          $table->integer('region_id')->unsigned();
          $table->foreign('region_id')->references('id')->on('regions');

          $table->text('issued_length')->nullable();
          $table->string('issued_quantity')->nullable();
          $table->date('issuance_date')->nullable();
          $table->string('faulty_returned_length')->nullable();
          $table->string('faulty_returned_quantity')->nullable();
          $table->date('faulty_returned_date')->nullable();
          $table->string('previous_installed')->nullable();
          $table->string('remarks')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cpri_issuances', function (Blueprint $table) {
            //
        });
    }
}
