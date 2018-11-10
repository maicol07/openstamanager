<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnAnagraficheAgentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_anagrafiche_agenti', function (Blueprint $table) {
            $table->integer('idanagrafica');
            $table->integer('idagente');
            $table->timestamps();
            $table->primary(['idanagrafica', 'idagente']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_anagrafiche_agenti');
    }
}
