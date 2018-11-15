<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMgMovimentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('mg_movimenti', function (Blueprint $table) {
            $table->foreign('idintervento', 'mg_movimenti_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('mg_movimenti', function (Blueprint $table) {
            $table->dropForeign('mg_movimenti_ibfk_1');
        });
    }
}
