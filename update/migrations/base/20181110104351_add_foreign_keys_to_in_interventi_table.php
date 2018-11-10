<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('in_interventi', function (Blueprint $table) {
            $table->foreign('idanagrafica', 'in_interventi_ibfk_1')->references('idanagrafica')->on('an_anagrafiche')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idtipointervento', 'in_interventi_ibfk_2')->references('idtipointervento')->on('in_tipiintervento')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_preventivo', 'in_interventi_ibfk_3')->references('id')->on('co_preventivi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_contratto', 'in_interventi_ibfk_4')->references('id')->on('co_contratti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('in_interventi', function (Blueprint $table) {
            $table->dropForeign('in_interventi_ibfk_1');
            $table->dropForeign('in_interventi_ibfk_2');
            $table->dropForeign('in_interventi_ibfk_3');
            $table->dropForeign('in_interventi_ibfk_4');
        });
    }
}
