<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMgArticoliInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('mg_articoli_interventi', function (Blueprint $table) {
            $table->foreign('idintervento', 'mg_articoli_interventi_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idimpianto', 'mg_articoli_interventi_ibfk_2')->references('id')->on('my_impianti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('mg_articoli_interventi', function (Blueprint $table) {
            $table->dropForeign('mg_articoli_interventi_ibfk_1');
            $table->dropForeign('mg_articoli_interventi_ibfk_2');
        });
    }
}
