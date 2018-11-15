<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInRigheInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('in_righe_interventi', function (Blueprint $table) {
            $table->foreign('idintervento', 'in_righe_interventi_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('in_righe_interventi', function (Blueprint $table) {
            $table->dropForeign('in_righe_interventi_ibfk_1');
        });
    }
}
