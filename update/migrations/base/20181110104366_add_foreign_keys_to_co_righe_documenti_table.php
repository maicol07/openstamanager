<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoRigheDocumentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_righe_documenti', function (Blueprint $table) {
            $table->foreign('ref_riga_documento', 'co_righe_documenti_ibfk_1')->references('id')->on('co_righe_documenti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_righe_documenti', function (Blueprint $table) {
            $table->dropForeign('co_righe_documenti_ibfk_1');
        });
    }
}
