<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoRighePreventiviTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_righe_preventivi', function (Blueprint $table) {
            $table->foreign('idpreventivo', 'co_righe_preventivi_ibfk_1')->references('id')->on('co_preventivi')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_righe_preventivi', function (Blueprint $table) {
            $table->dropForeign('co_righe_preventivi_ibfk_1');
        });
    }
}
