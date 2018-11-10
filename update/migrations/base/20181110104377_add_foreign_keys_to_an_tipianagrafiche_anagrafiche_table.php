<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnTipianagraficheAnagraficheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('an_tipianagrafiche_anagrafiche', function (Blueprint $table) {
            $table->foreign('idtipoanagrafica', 'an_tipianagrafiche_anagrafiche_ibfk_1')->references('idtipoanagrafica')->on('an_tipianagrafiche')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idanagrafica', 'an_tipianagrafiche_anagrafiche_ibfk_2')->references('idanagrafica')->on('an_anagrafiche')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('an_tipianagrafiche_anagrafiche', function (Blueprint $table) {
            $table->dropForeign('an_tipianagrafiche_anagrafiche_ibfk_1');
            $table->dropForeign('an_tipianagrafiche_anagrafiche_ibfk_2');
        });
    }
}
