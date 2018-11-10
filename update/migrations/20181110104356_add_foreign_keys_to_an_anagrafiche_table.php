<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnAnagraficheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('an_anagrafiche', function (Blueprint $table) {
            $table->foreign('id_nazione', 'an_anagrafiche_ibfk_1')->references('id')->on('an_nazioni')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('an_anagrafiche', function (Blueprint $table) {
            $table->dropForeign('an_anagrafiche_ibfk_1');
        });
    }
}
