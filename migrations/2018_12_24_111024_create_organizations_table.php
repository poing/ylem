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
            $table->integer('group_id');
            $table->string('href')->nullable();
            $table->boolean('isLegalEntity')->default(false);
            $table->string('type')->nullable();
            $table->integer('existsDuring');
            $table->string('tradingName');
            $table->string('nameType')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}

/*
Organization::create(['group_id' => 1, 'existsDuring' => 1, 'tradingName' => 'Invite Communications', 'nameType' => 'Company']);
$org->save;
*/
