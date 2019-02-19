<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('party_relationship_id')->nullable();
            //$table->string('href')->nullable();
            $table->boolean('isLegalEntity')->default(false);
            $table->string('type')->nullable();
            //$table->integer('time_period_id')->nullable();
            $table->string('tradingName');
            $table->string('nameType')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
