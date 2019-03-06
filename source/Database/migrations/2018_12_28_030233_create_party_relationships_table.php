<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Create the gazsp/baum table to support DAG.
         * This table replaces the following TMF632 organization
         * and individual relationships in the UML model of the API.
         *
         * - IndividualHasRelatedParty
         * - OrganizaionHasRelatedParty
         * - OrganizationHasParentRelationship
         * - OrganizationHasChildRelationship
         */
        Schema::create('party_relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();;
            $table->integer('lft')->nullable();;
            $table->integer('rgt')->nullable();;
            $table->integer('depth')->nullable();;
            /*
            $table->enum(
                'type',
                array(
                    'individual',
                    'organization',
                    'unit'
                )
            );
            */
            $table->integer('party_id')->nullable();;
            $table->string('party_type')->nullable();;

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
        Schema::dropIfExists('party_relationships');
    }
}
