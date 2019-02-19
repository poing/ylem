<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('href')->nullable();
            $table->string('gender')->nullable();
            $table->string('placeOfBirth')->nullable();
            $table->string('countryOfBirth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->date('birthDate')->nullable();
            $table->date('deathDate')->nullable();
            $table->string('title')->nullable();
            $table->string('givenName')->nullable();
            $table->string('familyName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('fullName')->nullable();
            $table->string('formattedName')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals');
    }
}
