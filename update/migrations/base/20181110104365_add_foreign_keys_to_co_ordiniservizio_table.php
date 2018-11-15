<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoOrdiniservizioTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_ordiniservizio', function (Blueprint $table) {
            $table->foreign('idintervento', 'co_ordiniservizio_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idimpianto', 'co_ordiniservizio_ibfk_2')->references('id')->on('my_impianti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_ordiniservizio', function (Blueprint $table) {
            $table->dropForeign('co_ordiniservizio_ibfk_1');
            $table->dropForeign('co_ordiniservizio_ibfk_2');
        });
    }
}
