<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyImpiantiContrattiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('my_impianti_contratti', function (Blueprint $table) {
            $table->foreign('idimpianto', 'my_impianti_contratti_ibfk_1')->references('id')->on('my_impianti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('my_impianti_contratti', function (Blueprint $table) {
            $table->dropForeign('my_impianti_contratti_ibfk_1');
        });
    }
}
