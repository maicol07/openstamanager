<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyImpiantiInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('my_impianti_interventi', function (Blueprint $table) {
            $table->foreign('idintervento', 'my_impianti_interventi_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idimpianto', 'my_impianti_interventi_ibfk_2')->references('id')->on('my_impianti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('my_impianti_interventi', function (Blueprint $table) {
            $table->dropForeign('my_impianti_interventi_ibfk_1');
            $table->dropForeign('my_impianti_interventi_ibfk_2');
        });
    }
}
