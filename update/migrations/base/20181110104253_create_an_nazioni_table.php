<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnNazioniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_nazioni', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('iso2', 2);
            $table->timestamps();
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_nazioni');
    }
}
