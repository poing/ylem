<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medium', function (Blueprint $table) {
            $table->increments('id');

            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('postcode')->nullable();
            $table->string('stateOrProvince')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();

            $table->integer('medium_id')->nullable();
            //$table->string('medium_type')->nullable();

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
        Schema::dropIfExists('medium');
    }
}
