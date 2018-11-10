<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInStatiinterventoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('in_statiintervento', function (Blueprint $table) {
            $table->foreign('id_email', 'in_statiintervento_ibfk_1')->references('id')->on('zz_emails')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('in_statiintervento', function (Blueprint $table) {
            $table->dropForeign('in_statiintervento_ibfk_1');
        });
    }
}
