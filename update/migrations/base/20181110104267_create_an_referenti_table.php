<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnReferentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_referenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('mansione');
            $table->string('telefono', 50);
            $table->string('email');
            $table->integer('idanagrafica');
            $table->integer('idsede');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_referenti');
    }
}
