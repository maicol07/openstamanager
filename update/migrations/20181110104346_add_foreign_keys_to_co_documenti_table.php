<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoDocumentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_documenti', function (Blueprint $table) {
            $table->foreign('ref_documento', 'co_documenti_ibfk_1')->references('id')->on('co_documenti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_documenti', function (Blueprint $table) {
            $table->dropForeign('co_documenti_ibfk_1');
        });
    }
}
