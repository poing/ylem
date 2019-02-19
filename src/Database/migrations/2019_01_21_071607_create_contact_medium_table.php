<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactMediumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_medium', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('preferred')->default(false);
            $table->string('type')->nullable();
            $table->integer('contact_id')->nullable();
            $table->string('contact_type')->nullable();
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
        Schema::dropIfExists('contact_medium');
    }
}
