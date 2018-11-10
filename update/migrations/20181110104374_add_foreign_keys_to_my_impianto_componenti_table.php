<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyImpiantoComponentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('my_impianto_componenti', function (Blueprint $table) {
            $table->foreign('idintervento', 'my_impianto_componenti_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idimpianto', 'my_impianto_componenti_ibfk_2')->references('id')->on('my_impianti')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idsostituto', 'my_impianto_componenti_ibfk_3')->references('id')->on('my_impianto_componenti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('my_impianto_componenti', function (Blueprint $table) {
            $table->dropForeign('my_impianto_componenti_ibfk_1');
            $table->dropForeign('my_impianto_componenti_ibfk_2');
            $table->dropForeign('my_impianto_componenti_ibfk_3');
        });
    }
}
