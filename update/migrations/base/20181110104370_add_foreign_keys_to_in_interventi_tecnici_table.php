<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInInterventiTecniciTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('in_interventi_tecnici', function (Blueprint $table) {
            $table->foreign('idtecnico', 'in_interventi_tecnici_ibfk_2')->references('idanagrafica')->on('an_anagrafiche')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idintervento', 'in_interventi_tecnici_ibfk_3')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('in_interventi_tecnici', function (Blueprint $table) {
            $table->dropForeign('in_interventi_tecnici_ibfk_2');
            $table->dropForeign('in_interventi_tecnici_ibfk_3');
        });
    }
}
