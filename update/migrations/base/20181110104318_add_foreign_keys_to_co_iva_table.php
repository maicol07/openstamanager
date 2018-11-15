<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoIvaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_iva', function (Blueprint $table) {
            $table->foreign('codice_natura_fe', 'co_iva_ibfk_1')->references('codice')->on('fe_natura')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_iva', function (Blueprint $table) {
            $table->dropForeign('co_iva_ibfk_1');
        });
    }
}
