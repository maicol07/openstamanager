<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnSediTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('an_sedi', function (Blueprint $table) {
            $table->foreign('id_nazione', 'an_sedi_ibfk_1')->references('id')->on('an_nazioni')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('an_sedi', function (Blueprint $table) {
            $table->dropForeign('an_sedi_ibfk_1');
        });
    }
}
