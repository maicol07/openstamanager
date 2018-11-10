<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnTipianagraficheAnagraficheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_tipianagrafiche_anagrafiche', function (Blueprint $table) {
            $table->integer('idtipoanagrafica');
            $table->integer('idanagrafica')->index('idanagrafica');
            $table->timestamps();
            $table->primary(['idtipoanagrafica', 'idanagrafica'], 'an_tipianagrafiche_anagrafiche_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_tipianagrafiche_anagrafiche');
    }
}
