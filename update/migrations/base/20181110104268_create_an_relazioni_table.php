<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnRelazioniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_relazioni', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione', 100);
            $table->string('colore', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_relazioni');
    }
}
